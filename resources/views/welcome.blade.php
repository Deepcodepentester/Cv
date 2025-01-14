<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
        <a href="posts/create" class="tweet-link">
            <div class="tweet-btn">
                <p class="tweet-btn-txt">
                    tweet
                </p>

            </div>
        </a>
        
        <div>
            <ul>
                <li>
                    {{\App\user::find(1)->email}}
                </li>
                <li>
                    {{\App\user::find(1)->name}}
                </li>
                <li>
                    {{\App\user::find(1)->id}}
                </li>
                @if(\App\user::find(1)->image)
                    <li>
                        <h1>image available</h1>
                    </li>
                       
                @endif
                
            </ul>
            
            
           

           
        </div>
    </body>
</html>
