<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;

Route::controller(adminController::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    Route::get('/addproduct', 'addproduct');
    Route::post('addpro', 'addpro');
    Route::post('/addcategory', 'addcategory' );
    Route::get('/admin_addcategory', 'admin_addcategory');
    Route::get('/viewproduct', 'viewproduct');
    Route::get('viewcategory', 'viewcategory');
    Route::get('viewusers', 'viewusers');
    Route::get('neworder', 'neworder');
    Route::get('updateorder/{id}', 'updateorder');
    Route::post('oredrlocation/{id}', 'oredrlocation');
    Route::get('orderontheway', 'orderontheway');
    Route::get('orderdelayed', 'orderdelayed');
    Route::get('deletepro/{id}', 'deletepro');
    Route::get('editpro/{id}', 'editpro');
    Route::get('adminhome', 'adminhome');
    Route::put('uodatenow/{id}', 'uodatenow');
    Route::get('addaboutus', 'addaboutus');
    Route::get('viewaboutus', 'viewaboutus');
    Route::post('insertabout', 'insertabout');
    Route::get('deleteabout/{id}', 'deleteabout');
    Route::get('commpletedorder', 'commpletedorder');

});
