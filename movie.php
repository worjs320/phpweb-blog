<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bal-ag Community</title>
    <link rel="shortcut icon" type="image⁄x-icon" href="./images/파비콘.PNG">


    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="./css/navbar.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <style>
        .numbervar {
            text-align: center;
        }

        .videoo {
        position: relative;
        padding-bottom: 53%; /* 16:9 비율인 경우 */
        /* padding-bottom값은 4:3 비율인 경우 75%로 설정합니다 */
        padding-top: 25px;
        height: 0;
        }
        
        .videoo iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }
        
        @media screen and (max-width: 450px){
        .mcomment {
         left: 300px;
        top: -25px;
            }
        }
        
        @media screen and (min-width: 450px){
        .titlefontsize {
        font-size : 25px;
            }
        }
        
        @media screen and (max-width: 450px){
        .titlefontsize {
        font-size: 13px;
        width: 90px;
            }
        }
  
       
    </style>
</head>

<body>
    <?php
    include("./lib/dbcon.php");
    include("./modal.php");
    include("./lib/asd.js");
    include("./lib/asdd.js");
    mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
    $signup=signupp();
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
                            <li class="active">
                                <a href="movie.php">Youtube 게시판</a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">
                                    <?php
                            if($_SESSION[id]){
                            echo $_SESSION[name]."(".$_SESSION[id].") 님 환영합니다";
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
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </nav>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron" style="padding-bottom:10px; max-width:800px; margin-right:auto; margin-left:auto;">
                <a class="btn btn-primary btn-lg pull-right" href="./inputmovie.php" style="margin-bottom: 20px;">동영상 등록</a>
                <br><br><br><div>
                <div class="bs-example" data-example-id="hoverable-table">
                    <div>
                        <?php
                        $_page=$_GET[_page];
                        $connect = mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
                        
                        $view_total = 5;
                        if(!$_page)($_page=1);
                        $page = ($_page-1)*$view_total;
                        $query2 ="select * from movie order by no desc";
                        $totalpage = mysqli_query($connect,$query2);
                        $num = mysqli_num_rows($totalpage);
                        $num;

                        $query = "select * from movie order by no desc limit $page,$view_total";
                        $result = mysqli_query($connect,$query);
        
                        $number=$num-($_page-1)*5;
                        
                        
                        ?>
                        <?php

                        while($data = mysqli_fetch_array($result)){
                        $address = $data[address];
                        $title = $data[title];
                        $name = $data[name];
                        $date = $data[date];
                        
                        $query3 = "select * from mcomment where listnumber='$number' order by no desc";
                        $result3 = mysqli_query($connect,$query3);
                        $total_rows = mysqli_num_rows($result3);
                        
                        echo "<div class=\"panel-body\" style = \"background-color:#ccc; position: relative; max-width:726px;\"><a class=\"titlefontsize\"href=\"javascript:doDisplay($number);\" style=\" position:absolute; top:17px; left:140px; text-decoration:none;\">$title</a>";
                        echo "<div class=\"mcomment\"style=\"position:absolute;right:310px;\"><a class=\"btn btn-primary text-center;\" style = \"background-color:#bce8f1; color:#333; border-color:#bce8f1; position:absolute; right:-35px; top:39px;\" href=\"javascript:doDisplay($number$number);\">댓글 보기"; 
                        echo " [".$total_rows."]";
                        echo "</a></div>";
                        echo "<span style=\"position:absolute; top:50px; left: 140px;\">글쓴이 : $name</span>";
                        echo "<span style=\"position:absolute; top:71px; left: 140px;\">날짜 : $date</span>";
                        if($_SESSION[id] == $data[id]){
                        echo "<div style=\"width: auto; display: inline-block; position: absolute; right: 15px; top: 20%;\"><a class=\"btn btn-danger btn-xs text-center\" href = \"./moviedelete.php?no=$data[no]&id=$data[id]\" onclick=\"return confirm('정말 삭제하시겠습니까?');\">글 삭제</a></div>";
                        echo "<div style=\"width: auto; display: inline-block; position: absolute; right: 15px; top: 60%;\"><a class=\"btn btn-primary btn-xs text-center\" href = \"./movieedit.php?no=$data[no]&id=$data[id]\">글 수정</a></div>";
                        }
                        echo "<img src=\"http://img.youtube.com/vi/$address/0.jpg\" style=\"width:120px; height:80px; float: left;\">";
                        echo "</div>";
                        
                        echo "<div id=\"$number\" class=\"videoo\" style=\"text-align:center; display:none; margin-left: auto; margin-right: auto; max-width: 726px; max-height: 406px;\"><iframe id=\"player-$number\" style =\"max-width: 726px; max-height: 408px; text-align:center;\" src=\"https://www.youtube.com/embed/$address?enablejsapi=1&version=3&playerapiid=ytplayer&rel=0&showinfo=0&autohide=1&hd=1&wmode=opaque\" allowfullscreen></iframe>";
                       
                        echo "</div>";
                        echo "<div class=\"container\"></div>";
                        
                         echo "<div id=\"$number$number\" style=\"display:none\";>"; 
                    include("./mcomment.php"); 
                    echo "</div>";
                        $number--;               
                        }?>
                    </div>
                </div><?php include("./movie_page.php");?>
            </div>
       </div>
    </div>
        <div style="font-size: small; color:#8d8d8d; border-top:1.5px solid #aad1ea; text-align:center; margin:auto; padding-top:23px; width:97%; position:relative;">
            <p>
            email : worjs320@naver.com<br>
            Copyright 2017. 김재건 All Rights Reserved.
            </p>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
</body>

</html>
