<?php

namespace App\Http\Controllers;

use Paystack;

use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function initiatePay(Request $request)
    {
        # code...

        $data = array(
            "amount" => $request->amount * 100,
            "reference" =>  Str::random(10),
            "email" => $request->email,
            "currency" => "NGN",
            "orderID" => Carbon::now()->timestamp,
            "callback_url" => '/success'

        );

    return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
}
