<?php

namespace App\Providers;

use App\Http\Controllers\Core\Services\PostServices;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Core\Services\PostServices', function ($app) {
            $request = app(\Illuminate\Http\Request::class);
            return app(PostServices::class, [$request]);
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
