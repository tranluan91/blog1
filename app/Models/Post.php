<?php

namespace App\Models;

use App\Models\Tag;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const show = 1;
    const hide = 0;
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','tags_posts');
    }

}
