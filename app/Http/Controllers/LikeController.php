<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Auth

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        //
        $id = $request->input('Post_id');
        $checkLike = Like::where('user_id', '=', auth()->id())
        ->where('post_id', '=', $id)->first();
        //dd($checkLike);
        /* 
        * check if the post has already been liked by the user before by checking
        * the user id and post_id combination exits on the table
        */
        if (!$checkLike) {
            # code...
            $p = Post::findorfail($id);
            $post = new Like([
            'user_id'=>auth()->id(),
            'post_id'=>$id
            ]);
            $p->likes()->save($post);
        }
        else {
            # code...
            echo "already liked";
            //return;
        }
        $fresh = Post::findorfail(2)->tweet = 'refreshing a model ';
        Post::findorfail(2)->save();
        $hp = Post::all();
        /* $hp = Post::where('user_id','=',1)->get();
        dd(auth()->id()); */
        /* $up = Post::find(4)->likes->where('user_id','=',auth()->id());
        if ($up->count() > 0) {
            # code...
            echo 'yes';
        }
        dd($up); */
        echo "</br>";
        echo 'logged in user id  '. auth()->id();
                echo "</br>";
        foreach ($hp as  $value) {
            # code...
            echo $value->tweet;
            echo "</br>";
            echo 'no of likes for this post  '. $value->likes->count();
            echo "</br>";
            
            if ($value->likes->where('user_id','=',auth()->id())->count() > 0) {
                # code...
                echo 'user liked this post';
                echo "</br>";
            }
            foreach ($value->likes as $val) {
                # code...
                /*
                * why this code is not working
                 $value->likes->where('user_id','=',1)->get(); */
                echo $val->user_id;
                echo "</br>";
            }
            echo "</br>";
        } 
        

        
    }
    public function async_like(Request $request)
    {
        # code...
        $posts= [];
        $liked = [];
        $allPost =  Post::all();
        $owner =  Like::where('user_id', '=', auth()->id())->get();
        
        foreach ($allPost as   $val) {
            # code...
            array_push($posts,$val->id);
        }
       
        foreach ($owner as  $value) {
            # code...
            array_push($liked,$value->post_id);
        }
        /* 
        *********
         */
        $id = $request->input('Post_id');
         if ($id) {
            # code...
            /* 
            * check if the post has already been liked by the user before by checking
            * the user_id and post_id combination exits on the table
            */
            $allusers= User::all();
            $checkLike = Like::where('user_id', '=', auth()->id())
            ->where('post_id', '=', $id)->first();
            if (!$checkLike) {
                # code...
                $p = Post::findorfail($id);
                $post = new Like([
                'user_id'=>auth()->id(),
                'post_id'=>$id
                ]);
                $p->likes()->save($post);
                $likecount =$p->likes->count();
                
                return response()->json(['liked'=>0,'posts'=>$posts,'likes'=>$liked,'likecount'=>$likecount,'allusers'=>$allusers]);
            }
            else {
                # code...
                //echo "already liked";
                //return;
                $p = Post::findorfail($id);
                $likecount =$p->likes->count();
                return response()->json(['liked'=>1,'posts'=>$posts,'likes'=>$liked,'likecount'=>$likecount,'allusers'=>$allusers]);
            }
            
        }
        /* if ($request->input('db')) {
            # code...
            //return response()->json(['apple','orange']);
            return response()->json([$request->all()]);
        }
        //else return response()->json(User::all());
        //else return response()->json([$request->header()]);
        else return response()->json([$request->all()]); */
    }
    public function FunctionName(Request $request)
    {
        # code...
        $id = $request->input('Post_id');
        $checkLike = Like::where('user_id', '=', auth()->id())
        ->where('post_id', '=', $id)->first();
        //dd($checkLike);
        /* 
        * check if the post has already been liked by the user before by checking
        * the user id and post_id combination exits on the table
        */
        if (!$checkLike) {
            # code...
            $p = Post::findorfail($id);
            $post = new Like([
            'user_id'=>auth()->id(),
            'post_id'=>$id
            ]);
            $p->likes()->save($post);
        }
        else {
            # code...
            //echo "already liked";
            //return;
        }
    }
    public function async_checkLike()
    {
        # code...
        $posts= [];
        $liked = [];
        $owner =  Post::all();
        $owner =  Like::where('user_id', '=', auth()->id())->get();
        
        foreach ($posts as   $value) {
            # code...
            array_push($posts,$value->id);
        }
       
        foreach ($owner as  $value) {
            # code...
            array_push($liked,$value->post_id);
        }
        dd($liked);
    }


    public function pollLike(){
        $posts= [];
        $liked = [];
        $owner =  Post::all();
        $p = Post::findorfail(16);
        foreach ($owner as  $value) {
            # code...
            $liked["postid"."$value->id"]=$value->likes->count();
            //array_push($liked,$value->id);
        }
        //echo $p->likes()-Count();
        //dd(User::findorfail(1)->followers->count());
        //dd($p->likes->count());
        //return $p->likes-count();
        //dd($liked);
        return response()->json($liked);

    }
}
