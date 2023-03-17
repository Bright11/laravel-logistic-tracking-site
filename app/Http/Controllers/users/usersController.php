<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class usersController extends Controller
{
    //
    public function buyerdashboard()
    {
        return view('frontend.buyerdashboard');
    }

   
}
