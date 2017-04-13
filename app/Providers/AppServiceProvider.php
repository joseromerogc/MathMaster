<?php

namespace mathmaster\Providers;
//use View;
//use Laratrust;
//use Auth;
use Illuminate\Support\ServiceProvider;
//use mathmaster\Mensaje;
//use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        //View::share('user',Auth::user());
        //View::share('msgs',NULL);        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
