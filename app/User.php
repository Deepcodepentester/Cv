<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     public function posts()
    {
        # code...
        return $this->hasMany(Post::class);
    }
    public function likes()
    {
        # code...
        return $this->hasMany(Like::class);
    }
    public function bookmarks()
    {
        # code...
        return $this->hasMany(Bookmark::class);
    }
    public function followers()
    {
        # code...
        return $this->hasMany(follower::class);
    }
    public function followering()
    {
        # code... get users followers
        return $this->belongsToMany(User::class,'followers','user_id','follower');
    }
    public function followerings()
    {
        # code... get users this particular user is following
        return $this->belongsToMany(User::class,'followers','follower','user_id');
    }
    public function replies()
    {
        # code...
        return $this->hasMany(Reply::class);
    }
    
    
}
