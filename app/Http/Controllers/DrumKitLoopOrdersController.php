<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\Models\DrumKitLoop;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use App\Models\WebSetting;
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

class DrumKitLoopOrdersController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }


    public function checkout_drum_kits_loops(Request $request)
    {
      // Get checkout pages
      $drum_kit_loop=DrumKitLoop::findorfail($request->drum_kit_loop_id);
      $banner=WebSetting::value('banner');
      $logo=WebSetting::value('logo');
      return view('pages.checkout_drum_kits_loops',compact('drum_kit_loop','banner','logo'));
    }

    
    public function pay_drum_kits_loops(Request $request)
    {

        if (Auth::check()) {
            $user_id = Auth::id();

            DB::table('user_drum_kits_loops')->insert([
                'user_id' => $user_id,
                'drum_kits_loops_id' => $request->drum_kit_loop_id,
            ]);
            
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');
    
            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($request->get('amount'));
    
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setDescription('This is the payment of Drum Kit / Loop Purchased');
    
            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('status_drum_kits_loops'))
                ->setCancelUrl(URL::route('status_drum_kits_loops'));
    
            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));            
            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    return redirect()->route('user.my-drum-kits-loops')->with('error', 'Connection timeout');

                } else {
                    return redirect()->route('user.my-drum-kits-loops')->with('error', 'Some error occur, sorry for inconvenient');
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

    public function status_drum_kits_loops(Request $request)
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
            
            return redirect()->route('user.my-drum-kits-loops')->with('success', 'Order Placed Successfully');
        }

		return redirect()->route('user.my-drum-kits-loops')->with('error', 'Payment failed !!');

    }

}