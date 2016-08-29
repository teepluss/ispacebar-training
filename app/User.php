<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Traits\UserPermissions;

class User extends Authenticatable
{
    use Notifiable, UserPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'fullname'
    ];

    /**
     * Hash password wnen saving...
     *
     * @param string $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Fullname accessor.
     *
     * @return string concat firstname and lastname.
     */
    public function getFullnameAttribute()
    {
        return $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }

    /**
     * User has many posts.
     *
     * @return object
     */
    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class);
    }

    /**
     * User has many roles.
     *
     * @return object
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_user');
    }
}
