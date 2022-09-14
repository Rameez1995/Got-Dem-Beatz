<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\Models\Album;
use App\Models\WebSetting;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use DB;
use Auth;


class CheckoutController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function index()
    {
      // Get checkout pages
        $banner=WebSetting::value('banner');
        $logo=WebSetting::value('logo');
      return view('pages.checkout1',compact('banner','logo'));
    }

    public function checkout_drum_kits_loops(Request $request)
    {
      // Get checkout pages
      $album=Album::findorfail($request->album_id);
      $banner=WebSetting::value('banner');
      return view('pages.checkout_drum_kits_loops',compact('album','banner'));
    }

    
    public function postPaymentWithpaypal(Request $request)
    {
        if (Auth::check()) {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
    
            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($request->get('amount'));
    
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setDescription('This is the payment of beats purchased');
    
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('songstatus'))
                ->setCancelUrl(URL::route('songstatus'));
    
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));            
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    return redirect()->route('user.my-songs')->with('error', 'Connection timeout');
                } else {
                    return redirect()->route('user.my-songs')->with('error', 'Some error occur, sorry for inconvenient');
                }
            }
    
            foreach($payment->getLinks() as $link) {
                if($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }
            
            Session::put('paypal_payment_id', $payment->getId());
    
            if(isset($redirect_url)) {            
                return Redirect::away($redirect_url);
            }
            
        }
        
        return redirect()->route('login')->with('warning','Please login first in order to proceed!');
    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        $user_id = Auth::id(); 
        
        if ($result->getState() == 'approved') {         
            
            $user_id = Auth::id();

            $carts = session()->get('cart');

            foreach($carts as $cart)
            {
                DB::table('user_songs')->insert([
                'user_id' => $user_id,
                'song_id' => $cart['id'],
            ]);

            }
            return redirect()->route('user.my-songs')->with('success', 'Purchase Successfull ! Song has been added to your list!');
        }

		 return redirect()->route('user.my-songs')->with('error', 'Payment failed !!');
    }

}