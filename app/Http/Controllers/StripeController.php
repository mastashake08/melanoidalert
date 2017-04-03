<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //

    public function charge(Request $request){
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      // Token is created using Stripe.js or Checkout!
      // Get the payment token submitted by the form:
      $token = $request->stripeToken;

      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
        "amount" => 1000,
        "currency" => "usd",
        "description" => "Donation To Melanoid Alert",
        "source" => $token,
      ));
    }
    return view('success');
}
