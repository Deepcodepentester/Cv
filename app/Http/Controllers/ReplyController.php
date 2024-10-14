<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use function GuzzleHttp\json_encode;
use App\Post;

class ReplyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function create()
    {
        # code...
        //$reply = new Reply(['user_id'=>1,'post_id'=>1,'reply'=>"qwertyuiop"]);
        $reply = new Reply();
        $reply->user_id = 1;
        $reply->post_id=2;
        $reply->reply= "qwertyuiophkbiluilljhbjhbjh;hvccfgxflcfylfcly";
        $reply->save();
       

    }
    public function async_create(){
        //echo 'hi';
        //return  response()->json(['liked'=>0,'posts'=>"posts",'likes'=>"liked"]);
        return json_encode(['liked'=>0,'posts'=>"posts",'likes'=>"liked"]);

    }
    public function moreReplies(Request $request)
    {
        # code...
        //$reply = new Reply(['user_id'=>1,'post_id'=>1,'reply'=>"qwertyuiop"]);
        $limit = 2;
        $offset = $request->input('offset');
        $chunk = $offset * $limit;
        $replies =Post::findorfail($request->input('post_id'))->replies->skip($chunk)->take($limit);  //Reply::all()->skip(0)->take(5);
        //$replies =Post::findorfail(16)->replies->skip(0)->take(2);
        //dd($replies);
        $all_replies =  Array();
        foreach ($replies as $reply) {
            # code...
            $arr = Array();
            $replyUser = $reply->user;
            array_push($arr,$replyUser->id);
            array_push($arr,$replyUser->email);
            array_push($arr,$reply->reply);
            array_push($arr,$reply->created_at);
            array_push($all_replies,$arr);
        }
        return json_encode(['replies'=>$all_replies]);
       

    }
}
