<?php

namespace App\Providers;

use App\Models\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class __AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //Blog::class => BlogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // By pass all permit for super admin.
        Gate::before(function ($user, $ability) {
            if ($user->isSuperAdmin()) {
                return true;
            }
        });

        // Define the gates.
        $permissions = config('permissions');
        foreach ($permissions as $group => $actions) {
            foreach($actions as $action) {
                $requestPermission = $group.".".$action;
                Gate::define($requestPermission, function ($user) use ($requestPermission) {
                    return $user->hasPermission($requestPermission);
                });
            }
        }
    }
}
