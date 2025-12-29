<?php

namespace App\Providers;

use App\Helpers\ExoHelper;
use App\Helpers\ExoHelperFacade;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('EH', function ($app) {
            return new ExoHelper();
        });

        // Optionally, add a global alias for your facade
        if (!class_exists('EH')) {
            class_alias(ExoHelperFacade::class, 'EH');
        }
    }

    public function boot()
    {
        // If you want to use the facade as 'Helpers' you can register it here
        // \Illuminate\Support\Facades\Facade::class_alias('GourmetGlobalHelperFacade', 'GourmetGlobalHelper');
    }
}
