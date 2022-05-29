<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if (Request::server('HTTP_X_FORWARDED_PROTO') == 'https') {
            URL::forceScheme('https');
        }
        Gate::before(function ($user) {
            return $user->hasRole('admin') ? true : null;
        });
        Gate::after(function ($user) {
            return $user->hasRole('admin');
        });

        Blade::stringable(function(\Illuminate\Support\Carbon $dateTime) {
            if ($dateTime->hour === 0 && $dateTime->minute === 0 && $dateTime->second === 0) {
                return $dateTime->format('d/m/Y');
            }
            return $dateTime->format('d/m/Y H:i:s');
        });
    }

}
