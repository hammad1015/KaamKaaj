<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    
    protected $fillable = [
        'name', 'authorization_level',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
