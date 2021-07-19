<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TicketServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\TicketServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(TicketServices::class, [$request]);
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
