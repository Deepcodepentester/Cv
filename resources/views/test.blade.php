<?php  use Illuminate\Support\Facades\Auth;
$userid = Auth::user()->id;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
@foreach ($bookmarks as $key ) {
    {{$postuserid = $key->post->user->id}}
    @if($key->post)
    {{$key->post->tweet}};
        
        {{ $key->post->tweet}}
        {{ $key->post->user->followering->count()}}
        @if($key->post->user->followering->contains(1) )
        <img src="storage/{{$key->post->file}}" alt="" srcset="" width="200px" height="200px">

        @endif

        @if($userid == $postuserid)
        <img src="storage/{{$key->post->file}}" alt="" srcset="" width="200px" height="200px">

        @endif

        <img src="storage/{{$key->post->file}}" alt="" srcset="" width="200px" height="200px">
        {{Auth::user()->id}}
                                
                        @endif
                        
        

    


      
    }

    @endforeach
</body>
</html>


