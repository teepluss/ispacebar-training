<?php

namespace App\Providers;

use App\Models\Blog;
use App\Observers\BlogObserver;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blog::observe(BlogObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * DI with 2 classes
         * eg. resolve('SMSService')
         */
        $this->app->singleton('SMSService', function() {
            $sms = new \App\Support\SMS\sender(
                new \App\Support\SMS\Adapters\Ais('12345-xyz')
            );
            return $sms;
        });

        /**
         * DI with variable.
         */
        $this->app->when('App\Http\Controllers\Demo\DemoController')
                  ->needs('$variableName')
                  ->give('iSpacebar');

    }
}
