<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'budget', 'email', 'location', 'details'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('authorization_level');
    }
}
