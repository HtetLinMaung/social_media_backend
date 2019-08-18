<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function friends()
    {
        return $this->belongsToMany('User', 'friends', 'user_id', 'friend_id');
    }

    public function theFriends()
    {
        return $this->belongsToMany('User', 'friends', 'friend_id', 'user_id');
    }

    public function follows()
    {
        return $this->belongsToMany('User', 'follows', 'user_id', 'friend_id');
    }

    public function theFollows()
    {
        return $this->belongsToMany('User', 'follows', 'friend_id', 'user_id');
    }

    public function blocks()
    {
        return $this->belongsToMany('User', 'blocks', 'user_id', 'friend_id');
    }

    public function theBlocks()
    {
        return $this->belongsToMany('User', 'blocks', 'friend_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function inner_comments()
    {
        return $this->hasMany('App\InnerComment');
    }

    public function messages()
    {
        return $this->belongsToMany('App\Message');
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
