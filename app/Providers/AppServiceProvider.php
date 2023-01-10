<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

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
        if (!$this->app->isProduction()) {
            Mail::alwaysTo('florian.ratz@supsign.ch');
        }
        
        view()->composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}
