<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index']);


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/get-started', [PageController::class, 'getStarted']);

// Laravel 8 & 9
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');



Route::post('/initiate-pay', [PaymentController::class, 'initiatePay'])->name('initPay');


Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);

