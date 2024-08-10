<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // 191 is the default length for MySQL and MariaDB
        \Illuminate\Support\Facades\Schema::defaultStringLength(191); 
    }
}
