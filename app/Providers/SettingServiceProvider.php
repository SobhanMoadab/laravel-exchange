<?php

namespace App\Providers;

use App\Http\Controllers\Core\SettingServices;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\SettingServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(SettingServices::class, [$request]);
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
