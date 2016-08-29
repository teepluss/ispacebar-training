<?php

namespace App\Models\Traits;

trait UserPermissions
{
    /**
     * Check the permission is superadmin?
     *
     * @return boolean
     */
    public function isSuperAdmin()
    {
        return $this->hasPermission('superadmin');
    }

    /**
     * Get merged roles permissions.
     *
     * @return collecttion
     */
    public function getMergedPermissions()
    {
        $permissions = [];
        $roles = $this->roles;
        foreach ($roles as $role) {
            $perms = $role->permissions;
            if (! is_array($perms)) continue;

            $permissions = array_merge($permissions, $perms);
        }
        return collect($permissions);
    }

    /**
     * Check the permissions.
     *
     * @param  string  $requestPermission
     * @return boolean
     */
    public function hasPermission($requestPermission)
    {
        $mergedPermisisons = $this->getMergedPermissions();
        $mergedPermisisons = $mergedPermisisons->filter(function($item) {
            return $item == 1;
        });

        return $mergedPermisisons->has($requestPermission);
    }
}