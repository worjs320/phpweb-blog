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


    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="./css/navbar.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

</head>

<body>

    <?php
    include("./lib/dbcon.php");
    include("./modal.php");
    $connect = dbconn();
    $signup=signupp();
    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    $no=$_GET[no];
    $id=$_GET[id];
    ?>

        <div class="container">
            <div style="text-align:center;"><a href="index.php"><img src="./images/�ΰ�3.PNG" style="width:100%;max-width:400px;"></a></div>
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
                            echo $_SESSION[name]."(".$_SESSION[id].") �� ȯ���մϴ�";
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
            <?php
            $connect = mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
            $query = "select * from textpage where no='$no' and id='$id' ";
            $result = mysqli_query($connect,$query);
            $data = mysqli_fetch_array($result);
            if($id!=$_SESSION[id])Error("게시물 주인이 아닙니다");
            ?>
            <div class="jumbotron" style="padding-bottom:10px; max-width:800px; margin-right:auto; margin-left:auto;">
                <div style="padding : 30px;">
                    <form method="POST" action="./edit_post.php">
                        <input type="hidden" name="id" class="form-control" value='<?=$data[id]?>'>
                        <input type="hidden" name="no" class="form-control" value='<?=$data[no]?>'>
                        <div class="form-group">
                            <label>작성자</label>
                            <input type="text" name="name" class="form-control" value='<?=$data[name]?>' readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>제목</label>
                            <input type="text" name="title" value="<?=$data[title]?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>내용</label>
                            <textarea name="text" class="form-control" rows="5"><?=$data[text]?></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary btn-block">수정</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>