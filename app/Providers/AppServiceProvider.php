<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
    public function boot(): void
    {
        //Carbon::setUtf8(true);
        setlocale(LC_TIME, 'french');
        setlocale(LC_ALL, 'fr_FR.UTF-8');
        Carbon::setLocale(config('app.locale'));
          
    }
}
