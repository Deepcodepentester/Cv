<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'user_id',
            'tweet_id'
    ];
    public function post ()
    {
        # code...
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
