<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'content',
    ];
    
    public function channel()
    {
        $this->belongsTo(Channel::class);
    }
}
