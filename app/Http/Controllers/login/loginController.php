<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login()
    {
        return view('frontend.login.login');
    }

    public function register()
    {
        return view('frontend.login.register');
    }

    public function registeruser(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'name' => 'required',
            'cpassword' => 'required_with:password|same:password|min:6'
        ]);
        $myemail = strtolower($req->email);
        $register = new User();
        $register->name = $req->name;
        $register->email = $myemail;
        //$register->password=Hash::make("password");
        $register->password = Hash::make($req->password);
        $register->save();
        if($register){
            $user=User::where('email',$req->email)->first();
            $shipping=new Shipping;
            $shipping->user_id=$user->id;
            $shipping->email=$user->email;
            $shipping->save();
            return redirect('login');
        }
    }

    public function loginuser(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $myemail = strtolower($req->email);
        $user = Auth::attempt(['email' => $myemail, 'password' => $req->password, 'isAdmin' => 0]);
        $admin = Auth::attempt(['email' => $myemail, 'password' => $req->password, 'isAdmin' => 1]);

        if ($user) {
            $req->session()->put('user', $user);
            $req->session()->regenerateToken();
            return redirect('/');

            // The user is active, not suspended, and exists.
        }

        if ($admin) {
            $req->session()->put('admin', $user);
            return redirect('adminhome');
        }
        return redirect()->back()->with('status', "Invalid Username or password");
    }


    public function tracking()
    {
        return view('frontend.tracking');
    }
    public function tracknow(Request $req)
    {
        //htrtpgVfldk[UyQj

        //khglHopmdeVYgthH
        $track=Shipping::where('user_id',Auth::user()->id)->where('tracking_code',$req->track)->first();
        $trackall = Order::where('user_id', Auth::user()->id)->where('order_status','new')->get();
       if($track){
            return view('frontend.trackingorder', ['track' => $track, 'trackall'=> $trackall]);
       }else{
        return redirect()->back();
       }
    }

    public function logout(Request $req)
    {


        Auth::logout();
        $req->session()->invalidate();
        return redirect('/');

        // $req->session()->regenerateToken();

    }
}
