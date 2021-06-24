<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Core\Services\AuthenticationServices;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\AuthenticationServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(AuthenticationServices::class, [$request]);
          });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
