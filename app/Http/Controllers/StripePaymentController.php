<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use DB;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('checkout');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 10 * 10,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Got Dem Beatz." 
        ]);

        $user_id = Auth::id();

        $carts = session()->get('cart');

        foreach($carts as $cart)
        {
          DB::table('user_songs')->insert([
            'user_id' => $user_id,
            'song_id' => $cart['id'],
        ]);

        }
  
        return redirect()->route('my-songs')->with('success', 'Purchase Successfull ! Song has been added to your list!');
          
    }
}
