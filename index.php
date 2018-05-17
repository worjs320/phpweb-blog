<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bal-ag Community</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/파비콘.PNG">

    <link href="./css/bootstrap.css" rel="stylesheet">


    <link href="./css/navbar.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <style>
        .jumbotron {
            background-image: url(images/에펠탑.jpg);
            background-size: cover;
            background-position: center;
            padding-bottom:10px; 
            max-width:800px;
            margin-right:auto; 
            margin-left:auto;"
        }
    </style>
</head>

<body>

    <?php
    include("./lib/dbcon.php");
    include("./modal.php");
    $connect = dbconn();
    $signup=signupp();
    
    session_start();
    ?>

        <div class="container">
            <div style="text-align:center;">
                <a href="index.php">
                    <img src="./images/로고3.PNG" style="width:100%;max-width:400px;">
                </a>
            </div>

            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                            aria-controls="navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">PHP Web Blog</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="board.php">게시판</a>
                            </li>
                            <li>
                                <a href="movie.php">Youtube 게시판</a>
                            </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">
                                    <?php
                            if($_SESSION[id]){
                            echo $_SESSION[name]."(".$_SESSION[id].")님 환영합니다";
                            }
                            else echo "";
                            ?>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">회원 메뉴
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                        if(!$_SESSION[id]){
                                            echo "<li><a href=\"#\" data-toggle=\"modal\" data-target=\"#loginModal\">Login</a></li>";
                                        }
                                        
                                        if($_SESSION[id]){
                                            echo "<li><a href=\"./logout.php\">Logout</a></li>";
                                        }
                                        
                                        if(!$_SESSION[id]){
                                            echo "<li><a href=\"#\" data-toggle=\"modal\" data-target=\"#signupModal\">Sign up</a></li>";
                                        }
                                        ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="jumbotron" style="width: auto; height: 700px;">
            </div>
        </div>

        <div style="font-size: small; color:#8d8d8d; border-top:1.5px solid #aad1ea; text-align:center; margin:auto; padding-top:23px; width:97%; position:relative;">
            <p>전화 : 010-5826-4054
                <br> email : worjs320@naver.com
                <br> Copyright 2017. 김재건 All Rights Reserved.
            </p>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>