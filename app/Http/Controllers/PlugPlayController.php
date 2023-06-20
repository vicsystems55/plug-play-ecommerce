<?php

namespace App\Http\Controllers;

use App\Models\PlugPlaySubscription;
use Illuminate\Http\Request;

class PlugPlayController extends Controller
{
    //

    public function index(Request $request)
    {

        if ($request->has('storeUrl')) {

            $subscriptions = PlugPlaySubscription::where('store_url', $request->storeUrl)->first();


            return $subscriptions;

        }else{
            $subscriptions = PlugPlaySubscription::get();


            return $subscriptions;
        }



    }
}
