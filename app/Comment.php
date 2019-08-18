<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function inner_comments()
    {
        return $this->hasMany('App\InnerComment');
    }
}
