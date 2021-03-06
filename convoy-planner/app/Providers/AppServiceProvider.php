<?php

namespace App\Providers;

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
        $this->app->bind('App\Contracts\UserContract', 'App\Services\UserService');
        $this->app->bind('App\Contracts\DispatcherContract', 'App\Services\DispatcherService');
        $this->app->bind('App\Contracts\DriverContract', 'App\Services\DriverService');
        $this->app->bind('App\Contracts\RestStopContract', 'App\Services\RestStopService');
        $this->app->bind('App\Contracts\RouteContract', 'App\Services\RouteService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
