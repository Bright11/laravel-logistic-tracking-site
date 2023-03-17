<?php

use App\Http\Controllers\frontend\frontendController;
use Illuminate\Support\Facades\Route;


Route::controller(frontendController::class)->group(function () {
   // Route::get('/orders/{id}', 'show');
    Route::get('/', 'index');

    Route::get('/cartpage','cartpage');
    Route::get('removecart/{id}', 'removecart');
    // Route::post('/addtocartnow/{id}', 'addtocartnow');
    Route::post('/addtocartnow/{id}', 'addtocartnow');
    Route::get('checkoutpage', 'checkoutpage');
    Route::post('placorder', 'placorder');
    Route::get('searchdata', 'searchdata');
    Route::get('usercommletedorder', 'usercommletedorder');
    Route::get('procategory/{slug}', 'procategory');
    Route::get('viewdetails/{product}', 'viewdetails');
    Route::put('updatecart/{id}', 'updatecart');
    Route::get('contact', 'contact');
    Route::post('sendmessage', 'sendmessage');
    Route::get('about', 'about');
});
// Route::post('/addtocartnow/{id}',[frontendController::class, 'addtocartnow'])->name('addtocartnow');
