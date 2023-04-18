<?php

namespace App\Http\Controllers;

use Paystack;

use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PlugPlaySubscription;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlugPlaySubscriptionMail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\PlugPlaySubscriptionAdminMail;

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

        $doc = $request->file('store_logo');


        $new_name = rand().".".$doc->getClientOriginalExtension();

        $file1 = $doc->move(public_path('business_logos'), $new_name);


        $subscription = PlugPlaySubscription::updateOrCreate([
            'email' => $request->email,
            'name' => $request->firstname. ' '. $request->lastname,
            'store_name' => $request->store_name,
        ],[
            'email' => $request->email,
            'name' => $request->firstname. ' '. $request->lastname,
            'phone' => $request->phone,
            'store_name' => $request->store_name,
            'store_desc' => $request->store_desc,
            'store_address' => $request->store_address,
            'store_logo' => config('app.url').'business_logos/'.$new_name,

            'subscription_name' => $request->subscription_name,

            'amount' => $request->amount,

            'start_date' => Carbon::now()->toDateTimeString(),

            'end_date' => Carbon::now()->addDays(30)->toDateTimeString(),


        ]);

        $datax = [

            'name' => $subscription->name,
            'email' => $subscription->email,
            'store_name' => $subscription->store_name,
            'store_logo' => $subscription->store_logo,
            'end_date' => $subscription->end_date,
            'subscription_name' => $request->subscription_name,
            'store_desc' => $request->store_desc,



        ];

        Mail::to($subscription->email)->send(new PlugPlaySubscriptionMail($datax));

        Mail::to('victorasuquob@gmail.com')->send(new PlugPlaySubscriptionAdminMail($datax));

        $data= [


                "SMS" => [
                    "auth" => [
                        "username"=> "edypraize@gmail.com",
                        "apikey" => "7b58b1a575f80d21577d8969706ef2f6d5aae932"
                    ],
                    "message" => [
                        "sender" => "Plug&Play",
                        "messagetext" => "Congratulations. Your store has been setup.",
                        "flash" => "0"
                    ],
                    "recipients"=>
                    [
                        "gsm"=> [
                            [
                                "msidn"=> $request->phone,
                                "msgid"=>  Str::random(10)
                            ],

                        ]
                    ]
                ]


        ];
        Http::withBody(json_encode($data), 'application/json')

            ->post('https://api.ebulksms.com:8080/sendsms.json');

        $data = array(
            "amount" => $request->amount * 100,
            "reference" =>  Str::random(10),
            "email" => $request->email,
            "currency" => "NGN",
            "orderID" => Carbon::now()->timestamp,
            "callback_url" => config('app.url').'success'

        );

    return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
}
