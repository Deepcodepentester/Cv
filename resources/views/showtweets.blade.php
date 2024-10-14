
    <?php
    //$postuserid = $owners->user->id;
    $userid = $user->id;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo csrf_token() ?>" id="meta-token"> 
    <title>Showtweets</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         html, body {
                /* background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh; */
                margin: 0;
               /*  background-color:   rgb(21, 34, 51); */
            }
        .main-content{
            display: flex;
        }
        .main-content-nav{
            width: 300px;
            background-color: skyblue;
        }
        .profile-pic{
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background-color:gray;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }
        .each-tweet{
            display: flex;
          /*   justify-content: ; */
          border-bottom: 1px solid gray;
          margin-top: 10px;
        }
        .each-tweet-itm{
            margin-bottom: 20px;

        }
        .like{
            width: 30px;
            height: 30px;
            /* background-color: red; */
            border-radius: 100%;
        }
        .tweet-header{
            display: flex;
            justify-content: flex-start;
            align-items: flex-end;
        }
        .tweet-header p{
            /* margin-left: 10px; */
        }
        .tweet-footer{
            display: flex;
            align-items: flex-end;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .tweet-footer-itm{
            margin-right: 20px;

        }
        .follow-stat{
            display: flex;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .follow-stat p{
            margin-right: 10px;
        }
        .main-content-nav-container{
            margin: 20px;
        }
        .nav-header{
            border: 5px solid gray;
            margin-bottom: 15px;
        }
        .nav-options{
            border-bottom: 2px solid gray;
        }
        .nav-options-item{
            margin-bottom:40px ;
        }
        .bookmark-ntfcns{
            position: fixed;
            /* position: absolute; */
            top:90vh ;
            width: 100%;
          /*   height: 100vh; */
            background-color: orangered;
        }
        .bookmark-display{
            display: none;
        }
        /* make a tweet styking */
        .tweet-btn{
                width: 100px;
                height: 100px;
                display: flex;
                position: fixed;
                bottom: 0px;
                right: 0px;
                justify-content: center;
                align-content: center;
                background-color: skyblue;
                border-radius: 100%;
            }
            .tweet-btn-txt{
                width: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 30px;
            }
            .tweet-link{
                display: block;
            }
        /* make a tweet styling */

        .follow-btn{
            margin-left:150px;
        }
        .modal{
            position:absolute;
            top:0px;
            /* margin:20px auto; */
            width:100%;
            height:100em;
            opacity:0.5;
            background-color:black;
            /* z-index:100; */
            display:flex;
            justify-content:center;
        }
        .modal-content{
            position:absolute;
            z-index:100;
            top:0px;
            width:500px;
            height:500px;
            background-color:black;
        }
    </style>
</head>
<body>
    <div class="bookmark-ntfcns-con">
        <p></p>
        <h1 class="bookmark-ntfcns bookmark-display">already bookmarked</h1>
    </div>
    <div class="main-content">
    
                                
        <div class="main-content-nav" >
           <div class="main-content-nav-container">
                <div class="nav-header">
                        <div class="profile-pic">
                                    <img src="{{ asset('storage/tweetmedia/fjNWdivsubv0EWx1ONYe0RUiM5gf1KJIg74z2QI6.jpg') }}" alt="" srcset="" width="25px" height="25px">
                    
                        </div>
                        <div>
                            <h2>{{$user->name}}</h2>
                            <p>{{$user->email}}</p>
                        </div>
                        <div class="follow-stat">
                            <p>
                                <span class="figure">{{$following->count()}}</span>
                                <span>Following</span>
                            </p>
                            <p>
                                <span class="figure">{{$followers->count()}}</span>
                                <span>Followers</span>
                            </p>
                        </div>
                    </div>
                    <div class="nav-options">
                        <div class="nav-options-item" >Profile</div>
                        <div class="nav-options-item" >Lists</div>
                        <div  class="nav-options-item">Topics</div>
                        <div  class="nav-options-item" id="bookmarknav">
                        <a href="/bookmarks">Bookmarks</a>
                        
                        </div>
                        <div  class="nav-options-item">Moments</div>
                        <div  class="nav-options-item"
                        ><form  action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button type="submit">logout</button>
                                    </form></div>

                    </div>
                    <div class="nav-others">
                        <a href="">Settings and privacy</a>
                        <a href="">Help Center</a>
                    </div>

           </div>
            

        </div>

        <div class=" tweet-container">
            @foreach($owner as $owners)
            <?php $postuserid = $owners->user->id ?>
            <!-- {{$postuserid = $owners->user->id}}
            {{$userid = $user->id}} -->
                <div class="each-tweet" id="postid-{{$owners->id}}-reply-btn-parent">
                    
                    
                    <div class="each-tweet-content">
                    <div class="tweet-header each-tweet-itm">
                    
                        @if($owners->file)
                                <div class="profile-pic">
                                    <img src="{{ asset('storage/'.$owners->file) }}" alt="" srcset="" width="25px" height="25px">
                    
                                </div>
                                @else 
                                <div class="profile-pic">
                                <img src="{{ asset('storage/'.$owners->file) }}" alt="" srcset="" width="25px" height="25px">
                    
                                </div> 
                                
                                
                        
                        @endif 
                        
                    <!-- profile-pic -->
                    <div>
                        <h2> {{$owners->user->name}} </h2>
                        <p> {{$owners->user->email}} </p>
                    </div>
                    <!--  -->
                    @if(!($userid == $postuserid))
                    @if($owners->user->followering->contains($userid))
                    <div class="follow-btn" >
                        <button><a href="http://" style="display:block;width:150px">unfollow</a></button>
                    </div>
                    @endif
                    @if(!($owners->user->followering->contains($userid)))
                    <div class="follow-btn" >
                        <button><a href="http://" style="display:block;width:150px">follow</a></button>
                    </div>
                    @endif
                    

                        

                    @endif
                   
                        
                        

                    </div>
                    <div class="each-tweet-itm">
                        <h1>{{'POST ID '.$owners->id}}</h1>
                    </div>
                    <div class="each-tweet-itm">
                        <p>{{$owners->tweet}}</p>
                    </div>
                    
                        
                        
                        @if($owners->file)
                                <div class="tweet-media each-tweet-itm">
                                    <img src="{{ asset('storage/'.$owners->file) }}" alt="" srcset="" width="200px" height="200px">
                    
                                </div>
                                
                        
                        @endif
                        
                        <div class="tweet-footer each-tweet-itm">
                                <p> {{$owners->user->created_at}} </p>
                            
                        </div>
                        <div id="postid-{{$owners->id}}">
                        <div class="tweet-footer each-tweet-itm" >
                            <p id="postid-{{$owners->id}}-likes">Likes {{$owners->likes->count()}}</p> 
                            
                        </div>

                        </div>
                        
                        <div class="tweet-footer each-tweet-itm">
                            <div style="display:none"><input type='text' >
                            <button>send reply<button>

                            </div>
                        
                            
                        </div>
                        

                        <div class="tweet-footer each-tweet-itm">
                            <div class="tweet-footer-itm">
                                <form action="/app" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$userid}}">
                                <input type="hidden" name="post_id" value="{{$owners->id}}">
                                <button type="submit" class="reply-btn"  id="postid-{{$owners->id}}-reply-btn">Reply</button>
    
                                </form>

                            </div>
                            <div class="tweet-footer-itm">
                                <form action="" method="post">
                                <button>Retweet</button>
                                </form>
                            </div>
                            <div class="tweet-footer-itm">
                                <form action="/like" method="post">
                                    @csrf
                                    <input type="hidden" name="Post_id" value={{$owners->id}}>
                                    <div >
                                        @if($owners->likes()->where('user_id', '=', $userid)->get()->count())
                                        <button type="submit" id="postid-{{$owners->id}}-likebtn" class="like" style="background-color:red;">Like</button>
                                        @else
                                        <button type="submit" id="postid-{{$owners->id}}-likebtn" class="like">Like</button>
                                        @endif
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="tweet-footer-itm">
                                <form action="/bookmark" method="post" class="form-others">
                                    @csrf
                                    <input type="hidden" name="Post_id" value={{$owners->id}}>
                                    <div>
                                        
                                        <button type="submit" class="bookmark-sbt-btn">Bookmark</button>
                                    </div>
                                </form>
                            </div>
                            
                            
                        </div>
                        
                    </div>
                            

                </div><!-- each tweet  -->
                
                        
            @endforeach
            
        </div><!-- tweet container -->

    </div> <!-- main content -->
   
    <a href="/posts/create" class="tweet-link">
            <div class="tweet-btn">
                <p class="tweet-btn-txt">
                    tweet
                </p>

            </div>
        </a>
    
    <!-- <script src="{{ asset('js/myscript/like.js') }}" defer></script> -->
    <script src="{{ asset('js/myscript/bookmark.js') }}" defer></script>
    <script src="{{ asset('js/myscript/asynclike.js') }}" defer></script>
    <script src="{{ asset('js/myscript/reply.js') }}" defer></script>
</body>
</html>


