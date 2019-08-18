<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function inner_comment()
    {
        return $this->belongsTo('App\InnerComment', 'inner_comment_id');
    }
}
