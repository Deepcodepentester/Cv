<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bookmark(Request $request)
    {
        # code...
        
        $id = $request->input('Post_id');
        $checkLike = Bookmark::where('user_id', '=', auth()->id())
        ->where('post_id', '=', $id)->first();
        //dd($checkLike);
        /* 
        * check if the post has already been liked by the user before by checking
        * the user id and post_id combination exits on the table
        */
        if (!$checkLike) {
            # code...
            $p = Post::findorfail($id);
            $post = new Bookmark([
            'user_id'=>auth()->id()/* ,
            'post_id'=>$id */
            ]);
            $p->bookmarks()->save($post);
            echo " bookmarked successfully";
        }
        else {
            # code...
            echo "already bookmarked";
            //return;
        }
       
        
    }
    public function async_bookmark(Request $request)
    {
        # code...
        $id = $request->input('Post_id');
        $checkLike = Bookmark::where('user_id', '=', auth()->id())
        ->where('post_id', '=', $id)->first();
        //dd($checkLike);
        /* 
        * check if the post has already been liked by the user before by checking
        * the user id and post_id combination exits on the table
        */
        if (!$checkLike) {
            # code...
            $p = Post::findorfail($id);
            $post = new Bookmark([
            'user_id'=>auth()->id()/* ,
            'post_id'=>$id */
            ]);
            $p->bookmarks()->save($post);
            return response()->json(['bookmarked'=>0]);
        }
        else {
            # code...
            return response()->json(['bookmarked'=>1]);
            //return;
        }
    }
    public function bookmarks(Request $request)
    {
        # code...
        $r= app(Request::class);
        //dd($r);
        //$user = auth()->user()->with('bookmarks')->get();
        $user = User::with('posts.likes')->where('id','=',1)->get();
        foreach ($user as  $value) {
            # code...
            echo 'hi';
        }
        $db = DB::select("select email,tweet from users inner join
        posts on users.id = posts.user_id");
        dd($db);
        //return response()->json($user);
        return response()->json($user);
        //$books = \App\Book::with('author')->take(100)->get();
        //$user = auth()->user();
/* foreach($user as $book)
{
$author = $book->author;
echo $author->first_name . ' ' . $author->last_name;
} */
        //dd($user);
        foreach ($user->bookmarks as  $value) {
            # code...
            echo $value->user_id;
            echo "</br>";
            echo $value->post->tweet;
            echo "</br>";
           
        }
        return;
        //return view('bookmarks',compact('user'));
    }
    
    public function showuserbookmarks()
    {
        # code...
        $bookmarks = Auth::user()->bookmarks;
        $user = auth()->user();
        return view('showalluserbookmarks',compact('bookmarks','user'));
        //return view('test',compact('bookmarks','user'));
        //dd($user);
    }
}





