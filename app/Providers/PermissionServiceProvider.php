<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\Core\Services\PermissionServices;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\PermissionServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(PermissionServices::class, [$request]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
