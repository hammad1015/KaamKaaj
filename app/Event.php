<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = [
        'name', 'budget', 'email', 'location', 'details'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('authorization_level');
    }
    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
