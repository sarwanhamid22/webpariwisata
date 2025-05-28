<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        if (config('app.env') === 'local' && str_contains(config('app.url'), 'ngrok-free.app')) {
            URL::forceScheme('https');
            URL::forceRootUrl(config('app.url'));
        }

        View::composer('*', function ($view) {
            $view->with('authUser', Auth::user());
        });
    }
}
