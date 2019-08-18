<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InnerComment extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image', 'inner_comment_id');
    }

    public function videos()
    {
        return $this->hasMany('App\Video', 'inner_comment_id');
    }
}
