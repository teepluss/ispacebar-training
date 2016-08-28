<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 3;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // /protected $dates = ['approved_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
