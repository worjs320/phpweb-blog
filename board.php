<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bal-ag Community</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/파비콘.PNG">


    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="./css/navbar.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script> 
    <style>
        .numbervar{
            text-align:center;
        }
        .footter {
            font-size: small;
            color:#8d8d8d; 
            border-top:1.5px solid #aad1ea; 
            text-align:center; 
            margin:auto; 
            padding-top:23px; 
            width:97%; 
            position:relative;
        }
    </style>
</head>

<body>
    <?php
    include("./modal.php");
    include("./lib/dbcon.php");
    mysqli_connect("localhost","root","111111","phpweb");
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
                        <li class="active">
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
                            echo $_SESSION[name]."(".$_SESSION[id].")님 ";
                            }
                            else echo "";
                            ?>
                            </a>
                            </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">회원메뉴
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
        <a class="btn btn-primary btn-lg pull-right"  href="./inputboard.php">게시글 작성</a>
        <div class="bs-example" data-example-id="hoverable-table">
    <table class="table table-hover">
      <colgroup>
        <col width = "7%">
        <col width = "*%">
        <col width = "20%">
        <col width = "30%">
      </colgroup>
      <thead>
        <tr>
          <th>#</th>
          <th>제목</th>
          <th>글쓴이</th>
          <th>날짜</th>
        </tr>
      </thead>
        
        <?php
        $_page=$_GET[_page];
        $connect = mysqli_connect("localhost","root","111111","phpweb");
        
        $view_total = 10;
        if(!$_page)($_page=1);
        $page = ($_page-1)*$view_total;
        $query2 ="select * from textpage order by no desc";
        $totalpage = mysqli_query($connect,$query2);
        $num = mysqli_num_rows($totalpage);
        $num;
        
        $query = "select * from textpage order by no desc limit $page,$view_total";
        $result = mysqli_query($connect,$query);
        
        $number=$num-($_page-1)*10;

        ?>
      <tbody>
      <?php
        
        while($data = mysqli_fetch_array($result)){
        $query3 = "select * from comment where listnumber='$data[no]' ";
        $nn = mysqli_query($connect,$query3);
        $comnum = mysqli_num_rows($nn);
        
        
        echo "<tr>";
        echo "<td>".$number."</td>";
        echo "<td><a href=\"./boardview.php?no=$data[no]&id=$data[id]\">".$data[title];
        if($comnum!=0) echo " [".$comnum."]</a></td>";
        echo "<td>".$data[name]."</td>";
        echo "<td>".$data[date]."</td>";
        echo "</tr>";
        $number--;
       
        } ?>
      </tbody> 
    </table><?php include("./board_page.php");?>
    </div>
    </div>

    </div>
    
    <div class="footter">
            <p>전화 : 010-5826-4054<br>
            email : worjs320@naver.com<br>
            Copyright 2017. 김재건 All Rights Reserved.
            </p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
</body>

</html>
