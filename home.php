<?php
  session_start();
  $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <title>Memories</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./libraries/jquery-ui.css">
        <link rel="stylesheet" href="./libraries/bootstrap.css">
        <link async href="http://fonts.googleapis.com/css?family=Passero%20One" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="./libraries/jquery-3.2.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
        <style>
        .bg-1{
            background-color : #A7C6DA;
        }
        .bg-2{
            background-color :#EEFCCE;
        }
        .bg-3{
            background-color : #9EB25D;
        }
        .bg-4{
            background-color : #FE5F55;
        }
        .bg-5{
            background-color : #F0B67F;
        }
        .mar-1{
            margin-top : 8.33333%;
            margin-bottom : 8.33333%;
            border-radius: 0.5rem;
        }

        .font-icsl{
            font-family: 'Inconsolata', monospace;
        }
        .container-fluid{
            height : 100vh;
        }
        .H_100{
            height : 100%;
        }
        .H_10{
            height : 10%;
        }
        #profile_img{
            border-radius: 50%;
        }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="col-1"></div>
                <div class="collapse navbar-collapse">
                    <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/device-camera-icon.png" alt="" width="30" height="30">
                    <ul class="navbar-nav mr-auto" id="navbarText">
                        <li class="nav-item large">
                        <a class="nav-link active" href="home.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item large">
                        <a class="nav-link" href="mymemories.php">My Memories</a>
                        </li>
                        <li class="nav-item large">
                        <a class="nav-link" href="writing.php">Writing</a>
                        </li>
                       </ul>
                    <span class="navbar-text">
                    </span>
                </div>

            <div class="col-2">

                        <ul class="navbar-nav mr-auto">
                            <img id="profile_img" width="45" height="45" src="http://www.vogue.co.kr/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt="">
                            <li class="nav-item large">
                                <a class="nav-link active" href=""><?=$name?></a>
                            </li>
                        </ul>
            </div>


            <div class="col-1" >
            <a href="logout.php"><span class="fa fa-sign-out fa-2x" style="color : white"></span></a>
            </div>
        </nav>
        <div class="container-fluid">

            <div class="row h_100 bg-1"></div>
            <div class="row h_100 bg-2"></div>
            <div class="row h_100 bg-3"></div>
            <div class="row h_100 bg-4"></div>
            <div class="row h_100 bg-5"></div>

        </div>
    </body>
</html>
