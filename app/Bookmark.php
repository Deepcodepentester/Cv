<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    //
    protected $fillable = [
        'user_id',
            'post_id'
    ];
    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        # code...
        return $this->belongsTo(Post::class);
    }
}
