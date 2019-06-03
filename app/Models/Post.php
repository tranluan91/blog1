<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function tags()
    {
        return $this->belongToMany('App\Tag');
    }

}
