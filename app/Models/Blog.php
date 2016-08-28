<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'approved_at'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body', 'hashed'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'teaser'
    ];

    /**
     * Hidden some fields.
     *
     * @var array
     */
    protected $hidden = [
        'body'
    ];

    /**
     * Get a teaser of body.
     *
     * @return string
     */
    public function getTeaserAttribute()
    {
        return str_limit($this->attributes['body'], 144);
    }

    /**
     * Set hashed attribute.
     *
     * @param void
     */
    public function setHashedAttribute($hashed)
    {
        $this->attributes['hashed'] = md5($hashed.$this->attributes['title'].$this->attributes['body']);
    }

    /**
     * Scope approved.
     *
     * @param  Eloquent $query `
     * @return Eloquent        `
     */
    public function scopeApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }

    /**
     * The post belongs to a user.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
