<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showalltweets</title>
</head>
<body>
    
 @foreach($all_Post as $post)
 {{$post->tweet}}
 <img src="storage\{{$post->file}}" alt="" srcset="">
 @endforeach
</body>
</html>