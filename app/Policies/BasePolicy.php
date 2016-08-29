<?php

namespace App\Policies;

abstract class BasePolicy
{
    /**
     * Ingore any rule for super admin.
     *
     * @param  App\User $user
     * @param  [type] $ability
     * @return boolean
     */
    public function before($user, $ability)
    {
        return $user->isSuperadmin();
    }
}