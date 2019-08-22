<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function shares()
    {
        return $this->hasMany('App\Share');
    }

    public function saves()
    {
        return $this->hasMany('App\Save');
    }
}
