<?php

use App\Post;
use App\User;
use App\Bookmark;
use App\Like;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
//use Illuminate\Foundation\Auth\User;

//use Illuminate\Foundation\Auth\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Route::get('/showtweets', function () {
    $user = User::find(1);
    return view('showtweets',compact('user'));
}); */

Route::get('/showalltweets', function ()
{
    # code...
    $all_Post = Post::all();
    //var_dump($all_Post);
    return view('showalltweets',compact('all_Post'));
});
 
Auth::routes();
[/* 'middleware'=>'auth', */'prefix'=>'dash'];

Route::prefix('dash')->middleware([/* 'auth', */'test'])->group(function()
    {
        # code...//
        Route::get('/follower', 'FollowerController@follow');
        Route::get('/follows', 'FollowerController@follow');
    
    });

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/like', 'LikeController@like');
Route::post('/like', 'LikeController@async_like');
//Route::post('/bookmark', 'BookmarkController@bookmark');
Route::post('/bookmark', 'BookmarkController@async_bookmark');
Route::get('/bookmarks', 'BookmarkController@showuserbookmarks');
//Route::get('/bookmarks', 'BookmarkController@bookmarks');
//Route::get('/follows', 'FollowerController@follower');
Route::get('/follows', 'FollowerController@follow');
Route::get('/following', 'FollowerController@following');

Route::get('/like', 'LikeController@async_like');
Route::resource('posts','TweetController');

Route::get('/reply', 'ReplyController@create');
Route::post('/reply', 'ReplyController@async_create');
Route::post('/morereply', 'ReplyController@moreReplies');
//Route::get('/morereply', 'ReplyController@moreReplies');

Route::post('/polling', function (){
    return $bookmarks = user::find(1)->bookmarks;

});

Route::post('/polllike', 'LikeController@pollLike');

Route::get('/dd', function ()
{
    $bookmarks = user::find(1)->bookmarks;
    
    dd(app(Illuminate\Config\Repository::class));
    //dd(app('auth'));
    /* if (Post::find(1)->likes()->where('user_id', '=', 16)->get()->count()) {
        # code...
        return Post::find(1)->likes()->where('user_id', '=', 16)->get();
    } */
    //return Post::find(1)->likes()->where('user_id', '=', Auth::user()->id);//->count();
    //return User::where('post_id', '=', 1)->get()->count();
    //return Post::find(1)->likes->count();
    //return user::find(1)->likes->contains(1);
    //return $this->app['config']["auth.guards.{$name}"];
    //$r = user::find(1)->bookmarks->toArray();
    //$bookmarks = Auth::user()->bookmarks;
        //$user = auth()->user();
        //$user = User::find(1);
        //return view('showalluserbookmarks',compact('bookmarks','user'));
        //return view('test',compact('bookmarks','user'));
    //var_dump($r);
   ;
       /*  foreach ($r as $key=>$ ) {
            # code...
            //echo $value;
        } */
        # code...
        //echo $key;
    
    
    //return $r;
    //Gate::tt();
    //return User::findorfail(1);
    
    /* if (Gate::forUser(Post::find(1))->allows('update-book')) {
        # code...
     return User::findorfail(1);
    } */
});//->middleware('can:update-post');



Route::get('/ddd', function ()
{
    $bookmarks = user::find(1)->bookmarks;
    //dd(app('config'));
    return user::find(1)->likes->contains(1);
    
});

 function async_like(Request $request)
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
                return response()->json(['liked'=>0,'posts'=>$posts,'likes'=>$liked]);
            }
            else {
                # code...
                //echo "already liked";
                //return;
                return response()->json(['liked'=>1,'posts'=>$posts,'likes'=>$liked]);
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