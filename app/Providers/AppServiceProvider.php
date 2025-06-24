<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SomeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Mendaftarkan binding untuk SomeService
        $this->app->singleton(SomeService::class, function ($app) {
            return new SomeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    public const HOME = '/redirect-after-login';

}