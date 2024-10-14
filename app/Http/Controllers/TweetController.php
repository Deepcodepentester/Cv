<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Like;
use App\Post;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
//use Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\each;
use App\Reply;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $owner =  Post::all();
        $followers = $this->follower();
        $following = $this->following();
       
       
      
        $user = auth()->user();
        //dd($user);
        
        return view('showtweets',compact('owner','user','following','followers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tweet');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request/* ,TweetRequest $tweet */)
    {
        //
        $this->validate($request,[
            ///'tweet'=>'required',
            //'file'=>'sometimes|image'
            /* 'file'=>'image' */
        ]);
        
       /*  if ($request->hasfile('file')) {
            # code...
            dd($request->all());
        } */
       
        /* $messages = [
            'required' => 'the :attribute is needed',
            'tweet.required' => ' we need to know your mind',
            'image' => 'the :attribute should be an image'
        ];
        $v = Validator::make($request->all(),[
            'tweet'=>'required',
            'file'=>'image'

        ],$messages);
        if ($v->fails()) {
            # code...
            return redirect('posts/create')->withErrors($v)->withInput();
        } */
       $path = $request->file('file')->store('tweetmedia','public');
       $data = ['user_id'=>auth()->id(),'file'=>$path];       
        $post = \App\Post::create(array_merge($request->all(),$data));
       //dd($post);
       return redirect()->to('/posts');

       


       /* $rightAuthor = User::where('email', '=',
       'johndepp@gmail.com')->first();
        $post = Post::find(1);
        //auth()->user()->posts->associate($post);
        //$rightAuthor->posts->associate($post);
        //$post->first()->$rightAuthor->associate($post);
        //dd(User::find(1)->posts);
        $post->user()->associate( $rightAuthor);
        $post->save();
        
        dd( $post->user()->associate( $rightAuthor)); */
        //return $request->file('file');



        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$owner =  auth()->user()->posts->all();//->find(1)->tweet;
        //$owner =  auth()->user()->posts->all();//->find(1)->tweet;
        //$user = User::with('posts.likes')->where('id','=',1)->get();
        //dd($user);
        //$owner =  Post::all();
        $owners =  Post::findorfail($id);
        $followers = $this->follower();
        $following = $this->following();
        //$replies =  Reply::all()->skip(0)->take(1);
        $replies =Post::findorfail($id)->replies->take(1); 
        //$replies =  Reply::all()->take(1);
       
       
      
        $user = auth()->user();
        
        return view('showatweet',compact('owners','user','following','followers','replies'));
    }

    public function showall()
    {
        //
        //$owner =  auth()->user()->posts->all();//->find(1)->tweet;
        //$owner =  auth()->user()->posts->all();//->find(1)->tweet;
        //$user = User::with('posts.likes')->where('id','=',1)->get();
        //dd($user);
        $owner =  Post::all();
        $followers = $this->follower();
        $following = $this->following();
       
       
      
        $user = auth()->user();
        
        return view('showtweets',compact('owner','user','following','followers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function follower()
    {
        # code...
       $follow = Auth::User()->followers;
       return $follow;
       //dd($follow);
    }
    public function following()
    {
        # code...
       
       $follow = Auth::User()->followerings;
       return $follow;
       //dd($follow);
    }

    

}
