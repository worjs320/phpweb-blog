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

</head>

<body>

    <?php
    include("./lib/dbcon.php");
    include("./modal.php");
    $connect = dbconn();
    $signup=signupp();
    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    ?>

        <div class="container">
            <div style="text-align:center;"><a href="index.php"><img src="./images/로고3.PNG" style="width:100%;max-width:400px;"></a></div>
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
            <div class="jumbotron" style="padding-bottom:10px; max-width:800px; margin-right:auto; margin-left:auto;">
                <div style="padding : 30px;">
                    <form method="POST" action="./inputboard_post.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" class="form-control" value='<?=$_SESSION[id]?>'>
                        <div class="form-group">
                            <label>작성자</label>
                            <input type="text" name="name" class="form-control" value='<?=$_SESSION[name]?>' readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>제목</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>사진</label>
                            <input type="file" name="file01">
                        </div>
                        <div class="form-group">
                            <label>내용</label>
                            <textarea type="text "name="text" class="form-control" rows="5" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">작성</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>

</html>