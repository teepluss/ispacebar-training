<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'permisssions'
    ];

    /**
     * Relation many-to-may between user and role.
     *
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'role_user');
    }
}
