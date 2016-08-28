<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Blog' => 'App\Policies\BlogPolict',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $gates = [
            'blogs.write',
            'blogs.delete',
            'blogs.approve'
        ];

        foreach ($gates as $gate) {
            Gate::define($gate, function ($user) use ($gate) {
                return $user->hasPermission($gate);
            });
        }
    }
}
