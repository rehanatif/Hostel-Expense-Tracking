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
        // Translations auto save to files
        $this->app->extend('translator', function ($original) {
            $loader = $original->getLoader();
            $locale = $original->getLocale();
            $fallback = $original->getFallback();
            return new \App\Services\CustomTranslator($loader, $locale, $fallback);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
