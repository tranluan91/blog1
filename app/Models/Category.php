<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const show = 1;
    protected $fillable = [
        'name', 'status'
    ];

    public function posts() 
    {
        return $this->hasMany('App\Models\Post');
    }

}
