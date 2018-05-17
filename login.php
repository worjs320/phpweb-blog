<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bal-ag Community</title>
        <link rel="shortcut icon" type="image?x-icon" href="./images/파비콘.PNG">

        <link href="css/bootstrap.css" rel="stylesheet">

        <link href="./css/navbar.css" rel="stylesheet">

        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    </head>

    <body>
        <?php
        include("./modal.php");
        include("./lib/dbcon.php");
        $connect = dbconn();
        session_start();
        $signup=signupp();
        ?>
        <div class="container">
            <div style="text-align:center;"><a href="index.php"><img src="./images/로고3.PNG" style="width:100%;max-width:400px;"></a></div>
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button
                            type="button"
                            class="navbar-toggle collapsed"
                            data-toggle="collapse"
                            data-target="#navbar"
                            aria-expanded="false"
                            aria-controls="navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">PHP Web Blog</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li>
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
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </nav>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron" style="padding-bottom:30px; padding-top:20px; max-width:800px; margin-right:auto; margin-left:auto;">
                <div class="container" style="max-width:400px;">
                    <form class="form-signin" action='./login_post.php' method="post">
                        <h2 class="form-signin-heading">Please sign in</h2><br>
                        <input type="text" name="id" class="form-control" placeholder="Id"><br>
                        <input type="password" name="pw" class="form-control" placeholder="Password"><br>
                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="로그인">
                    </form>
                </div>
            </div>
        </div>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>

</html>
