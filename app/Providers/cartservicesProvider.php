<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Commpletedorder;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class cartservicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {



        view()->composer('*', function ($view) {

              if(Auth::user()){
                $total = Cart::where('user_id', Auth::user()->id)->sum('total_price');
                return $view->with('total', $total);
              }else{
                $total=0;
                return $view->with('total', $total);
              }

        });
        view()->composer('*',function($view){
           if(Auth::user()){
                $usercount = User::count();
                return $view->with('usercount', $usercount);
           }
        });
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $procount = Product::count();
                return $view->with('procount', $procount);
            }
        });
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $ordercounts = Order::where('order_status','new')->count();
                return $view->with('ordercounts', $ordercounts);
            }
        });

        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $orderontheway = Order::where('user_id')->count();
                return $view->with('ordercount', $orderontheway);
            }
        });

        // frontend users
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $countcart = Cart::where('user_id', Auth::user()->id)->count();
                return $view->with('countcart', $countcart);
            } else {
                $countcart = 0;
                return $view->with('countcart', $countcart);
            }
        });
        // number of order
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $oderusernumber = Order::where('user_id', Auth::user()->id)->count();
                return $view->with('oderusernumber', $oderusernumber);
            } else {
                $oderusernumber = 0;
                return $view->with('oderusernumber', $oderusernumber);
            }
        });

        // number of order on the way
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $orderonthewaysuser = Order::where('user_id', Auth::user()->id)->where('order_status', 'On the way')->count();
                return $view->with('orderonthewaysuser', $orderonthewaysuser);
            } else {
                $orderonthewaysuser = 0;
                return $view->with('orderonthewaysuser', $orderonthewaysuser);
            }
        });

        // the end
        // number of order delayed
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $delayesuser = Order::where('user_id', Auth::user()->id)->where('order_status','Order delayed')->count();
                return $view->with('delayesuser', $delayesuser);
            } else {
                $delayesuser = 0;
                return $view->with('delayesuser', $delayesuser);
            }
        });

        // the end
        // number of order commpleted
        view()->composer('*', function ($view) {
            if (Auth::user()) {
                $commpletedsuser = Commpletedorder::where('user_id', Auth::user()->id)->count();
                return $view->with('commpletedsuser', $commpletedsuser);
            } else {
                $commpletedsuser = 0;
                return $view->with('commpletedsuser', $commpletedsuser);
            }
        });

        // the end
        //getting categories
        view()->composer('*', function ($view) {
                $getallcat = Category::all();
                return $view->with('getallcat', $getallcat);

        });
        //the end
        // the end
    }
}
