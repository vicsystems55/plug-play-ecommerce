<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;



use Artesaos\SEOTools\Facades\SEOTools;

class PageController extends Controller
{
    //

    public function getStarted(Request $request)
    {
        # code...

        if ($request->plan ==1) {

            $packageName = 'Basic Package';
            $price = 5000;
            $message = "As you start your journey with us, the basic package offers essential features at an affordable price. However, our premium packages provide advanced support and exclusive content that you won't want to miss out on. Upgrade now for more benefits!";

        }if ($request->plan ==2) {

            $packageName = 'Premium Package';
            $price = 12000;
            $message = "Congratulations on choosing our Premium Package! You'll enjoy exclusive features and benefits. Upgrade to Enterprise for access to our mobile app, ensuring seamless access to all services anytime, anywhere. Don't miss out on the full experience!";



        }if ($request->plan ==3) {

            $packageName = 'Enterprice Package';
            $price = 20000;
            $message = "Thank you for choosing our Enterprise package! Our full suite of premium features is now available to you. You can expect top-notch customer service and priority support from our team. We appreciate your trust in us!";



        }else{

            $packageName = 'Basic Package';
            $price = 5000;
            $message = "As you start your journey with us, the basic package offers essential features at an affordable price. However, our premium packages provide advanced support and exclusive content that you won't want to miss out on. Upgrade now for more benefits!";

        }

        return view('register', compact('packageName', 'price', 'message'));
    }



    public function index() {

        SEOTools::setTitle('Plug & Play Ecommerce');
        SEOTools::setDescription('Sell fast, sell smart, defeat the competition.');
        SEOTools::opengraph()->setUrl('https://ecomm.vicsystems.com.ng');
        SEOTools::setCanonical('https://ecomm.vicsystems.com.ng');
        SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage(config('app.url').'assets/images/resource/testimonial.jpg');


        return view('welcome');
    }
}
