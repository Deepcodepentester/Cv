
    
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
            width: 25px;
            height: 25px;
            background-color: red;
            border-radius: 100%;
        }
        .tweet-header{
            display: flex;
            justify-content: flex-end;
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
                                <span class="figure">{{$user->followerings->count()}}</span>
                                <span>Following</span>
                            </p>
                            <p>
                                <span class="figure">{{$user->followering->count()}}</span>
                                <span>Followers</span>
                            </p>
                        </div>
                    </div>
                    <div class="nav-options">
                        <div class="nav-options-item" >Profile</div>
                        <div class="nav-options-item" >Lists</div>
                        <div  class="nav-options-item">Topics</div>
                        <div  class="nav-options-item" id="bookmarknav">
                        
                        <form  action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button type="submit">Bookmarks</button>
                                    </form></div>
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
            @foreach($bookmarks as $bookmark)
            
                <div class="each-tweet">
                    
                    
                    <div class="each-tweet-content">
                    <div class="tweet-header each-tweet-itm">
                    <div class="profile-pic">
                        @if($bookmark->post->file)
                                <div class="profile-pic">
                                    <img src="{{ asset('storage/'.$bookmark->post->file) }}" alt="" srcset="" width="25px" height="25px">
                    
                                </div>
                                @else  <img src="{{ asset('storage/'.$bookmark->post->file) }}" alt="" srcset="" width="25px" height="25px">
                        
                        @endif 
                        
                    </div><!-- profile-pic -->
                    <div>
                        <h2> {{$bookmark->post->user->name}} </h2>
                        <p> {{$bookmark->post->user->email}} </p>
                    </div>
                        
                        

                    </div>
                    <div class="each-tweet-itm">
                        <h1>{{'POST ID '.$bookmark->post->id}}</h1>
                    </div>
                    <div class="each-tweet-itm">
                        <p>{{$bookmark->post->tweet}}</p>
                    </div>
                        
                        
                        @if($bookmark->post->file)
                                <div class="tweet-media each-tweet-itm">
                                    <img src="{{ asset('storage/'.$bookmark->post->file) }}" alt="" srcset="" width="200px" height="200px">
                    
                                </div>
                                
                        
                        @endif
                        
                        <div class="tweet-footer each-tweet-itm">
                                <p> {{$bookmark->post->user->created_at}} </p>
                            
                        </div>
                        <div class="tweet-footer each-tweet-itm">
                            <p>No of likes {{$bookmark->post->likes->count()}}</p> 
                            
                        </div>

                        <div class="tweet-footer each-tweet-itm">
                            <div class="tweet-footer-itm">
                                <form action="/app" method="post">
                                
                                <button type="submit">Reply</button>
    
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
                                    <input type="hidden" name="Post_id" value={{$bookmark->post->id}}>
                                    <div >
                                        <button type="submit" id="like" class="like">Like</button>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="tweet-footer-itm">
                                <form action="/bookmark" method="post" class="form-others">
                                    @csrf
                                    <input type="hidden" name="Post_id" value={{$bookmark->post->id}}>
                                    <div>
                                        
                                        <button type="submit" class="bookmark-sbt-btn">Others</button>
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
    
    <script src="{{ asset('js/myscript/like.js') }}" defer></script>
    <script src="{{ asset('js/myscript/bookmark.js') }}" defer></script>
</body>
</html>


