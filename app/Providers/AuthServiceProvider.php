<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\BlogPolicy;
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
        App\Models\Blog::class => App\Policies\BlogPolicy::class,
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
