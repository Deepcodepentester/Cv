<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'file', 'tweet', 'user_id'
    ];
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
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
    public function replies()
    {
        # code...
        return $this->hasMany(Reply::class);
    }
}
