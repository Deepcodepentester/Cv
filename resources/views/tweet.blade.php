<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: black;
            color: white;
        }
        .header-container{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: 50px;
            margin-right: 50px;
        }
        .page-wrap{
            min-height: 150px;
            background-color:   rgb(77, 81, 83);
            font-size: 64px;
            display: flex;
            justify-content: center;
        }
        .form-container-wrap{
        display: flex;
        justify-content: center;
        margin-top: 50px;
        /* background-color: rgb(21, 34, 51); */
    }
    .form-container{
        background-color: white;
        color: black;
        width: 70%;
        /* height: 100vh; */
        display: flex;
        justify-content: center;
        padding: 50px
    }
    
    .form-container input{
        width: 450px;
        height: 35px;
        border-radius: 5px;
    }
    .form-container select{
        width: 450px;
        height: 35px;
        border-radius: 5px;
    }
    .form-container-input{
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }
    .form-container-input-submit{
        display: flex;
        justify-content: center;
        padding: 10px;
        width: 100%;
        background-color: rgb(235, 0, 79);
        color: white;
        border-radius: 25px;
        font-size: 30px;
    }
    .form-container-input-para{
        display: flex;
        align-items: center;
        margin-right: 35px;
        font-family: Nunito, Helvetica, Arial, sans-serif;
    }
    </style>
</head>
<body>
<div class="">
        <header class="header-container">
            <h4><a href="/posts">Home</a></h4>
            <nav>
                
            </nav>
        </header>
    </div>
    <div class="page-wrap">
        <h1>what's  on your mind</h1>
    </div>
    <div class="form-container-wrap">
            <div class="form-container">

                <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="form-container-input">
                            <div class="form-container-input-para"><h2  >tweet: </h2></div>
                            <p><input type="text" name="tweet"></p>
                        </div>
                        <div class="form-container-input">
                                <div class="form-container-input-para"><h2  >attach file:</h2></div>
                                <p> <input type="file" name="file"></p>
                            
                                
                        </div>
                        
                              
                             <h2><button type="submit" name="submit"value="Signin" class="form-container-input-submit">Tweet</button></h2>
                         </div>
            
                            
                                      
            
                        
                    </form>
                    
                          
                             
                             
                           
                           
                </div>

    </div>
</body>
</html>












<!-- <form action="/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-input">
        <p>tweet: <input type="text" name="tweet"></p>
    </div>
    
    <p>attach file: <input type="file" name="file"></p> -->
    <!-- <p>image<input type="file" name="profile_picture" value="{{old('image')}}"></p> -->
  <!--   <input type="submit" value="tweet">
</form> -->







