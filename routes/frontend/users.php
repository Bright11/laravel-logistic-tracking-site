<?php

use App\Http\Controllers\login\loginController;
use App\Http\Controllers\users\usersController;
use Illuminate\Support\Facades\Route;
//

Route::controller(usersController::class)->group(function (){
    Route::get('buyerdashboard', 'buyerdashboard');
    // login


});

Route::controller(loginController::class)->group(function () {
    // login
    Route::get('login', 'login');
    Route::get('register', 'register');

    Route::post('registeruser', 'registeruser');
    Route::post('loginuser', 'loginuser');
    Route::get('tracking', 'tracking');
    Route::get('tracknow', 'tracknow');
    Route::get('logout', 'logout');
});
