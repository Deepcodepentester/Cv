<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

    protected $fillable = ['user_id','post_id','reply'];
    //protected $table  = 'replies';

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
