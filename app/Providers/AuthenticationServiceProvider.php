<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\Core\Services\AuthenticationServices;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\AuthenticationServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(AuthenticationServices::class, [$request]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
