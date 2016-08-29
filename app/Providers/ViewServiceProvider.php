<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.partials.app.navbar', function($view) {
            $navigations = config('navigation.admin');
            $navigations = array_map(function($item) {
                // There's no link to map.
                if ($item == '#') {
                    return $item;
                }
                return route($item);
            }, $navigations);

            $view->with('navigations', $navigations);
        });
    }
}
