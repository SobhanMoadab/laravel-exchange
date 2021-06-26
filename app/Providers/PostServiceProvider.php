<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\Core\Services\PostServices;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Core\Services\PostServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(PostServices::class, [$request]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
