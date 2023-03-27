<?php

namespace Crthiago\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class LaravelHelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes(
            [
                __DIR__ . '/../config/laravel-helpers.php' => config_path('laravel-helpers.php')
            ],
            'laravel-helpers-config'
        );
    }
}