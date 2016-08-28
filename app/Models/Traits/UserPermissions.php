<?php

namespace App\Models\Traits;

trait UserPermissions
{
    public function isSuperAdmin()
    {
        return $this->user->name == "Prayuth";
    }

    public function getPermissions()
    {
        $permissions = [];
        $roles = $this->roles;
        foreach ($roles as $role) {
            $perms = $role->permissions;
            if (! is_array($perms)) continue;

            $permissions = array_merge($permissions, $perms);
        }

        return $permissions;
    }

    public function hasPermission($requestPermission)
    {
        $mergedPermisisons = $this->getPermissions();
        return array_key_exists($requestPermission, $mergedPermisisons);
    }
}