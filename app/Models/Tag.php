<?php

namespace App\Models;


use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const show = 1;
    protected $fillable = [
        'name', 'status'
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','tags_posts');
    }

}
