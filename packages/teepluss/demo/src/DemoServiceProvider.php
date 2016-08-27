<?php

namespace Teepluss\Demo;

use Illuminate\Support\ServiceProvider;

class DemoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/demo.php' => config_path('demo.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DR', function() {
            return new Request();
        });

        $this->app->alias('DR', 'Teepluss\Demo\Contracts\Request');
    }
}
