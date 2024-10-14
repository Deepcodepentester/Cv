<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follower extends Model
{
    //
    protected $fillable = ['user_id','follower'];
    public function users()
    {
        # code...
        $this->belongsToMany(User::class);
    }
    public function posts()
    {
        # code...
        $this->belongsToMany(Post::class);
    }
    

}
