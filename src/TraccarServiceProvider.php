<?php

namespace Harrometer\TraccarLaravelApi;

use Illuminate\Support\ServiceProvider;
use Harrometer\TraccarLaravelApi\Api\Client;

class TraccarServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php'); //Test

        $this->publishes(
            [
                __DIR__ . '/../config/traccar.php' => config_path('traccar.php'),
            ],
            'traccar-config'
        );
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            // getBaseDir('config/traccar.php'),
            __DIR__ . '/../config/traccar.php',
            'traccar'
        );

        $this->app->singleton('traccar-client', function () {
            return new Client(
                config('traccar.base_url'),
                config('traccar.auth.username'),
                config('traccar.auth.password')
            );
        });
    }
}
