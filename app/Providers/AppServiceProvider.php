<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// my code
use Illuminate\Pagination\Paginator;
// the end
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       // Paginator::useBootstrap();
    }
}
