<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    const show = 1;
    public $timestamps = true;

    public function user() 
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function posts() 
    {
        return $this->belongsTo('App\Models\Post');
    }
    
}
