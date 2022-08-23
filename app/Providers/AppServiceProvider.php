<?php

namespace App\Providers;

use App\Services\EventCreatingService;
use App\Services\FriendsCreatingService;
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
        $this->app->singleton('Event', function($app) { return new EventCreatingService(auth()->user()->id); });

        $this->app->singleton('Friend', function($app) { return new FriendsCreatingService(auth()->user()->id); });
    }
}
