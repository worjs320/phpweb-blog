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
    <style>
    </style>
</head>

<body>

    <?php
    include("./modal.php");
    include("./lib/dbcon.php");
    $connect = dbconn();
    $signup=signupp();
    $no = $_GET[no];
    $id = $_GET[id];
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
                </div>
            </nav>
            
            <?php
            $connect = mysqli_connect("localhost","root","111111","phpweb");
            $query = "select * from textpage where no='$no' and id='$id' ";
            $result = mysqli_query($connect,$query);
            $data = mysqli_fetch_array($result);
            ?>

            <div class="jumbotron" style="padding-bottom:10px; max-width:800px; margin-right:auto; margin-left:auto;">
                <div class="panel panel-primary" style="max-width:720px; width:100%; margin-left:auto; margin-right:auto;">
                    <div class="panel-head" style = "background-color:#337AB8; color:white; padding:13px;">
                        <b class="panel-title" id="panel-title" style="font-size: 25px;"><?=$data[title]?></b>
                    </div>
                    <div class="panel-body" style="width: auto;">
                        <?php echo "<span class=\"glyphicon glyphicon-user\" style=\"font-size:17px;\"></span><b style=\"font-size:20px;\"> $data[name]</b>"; 
                        echo "<b style=\"float:right; font-size:20px;\">$data[date]</b>";?><br><br><?=nl2br($data[text])?>
                        <?php if($data[file]){echo "<div><img src=\"./imagedata/$data[file]\"; style=\"width:100%; height:auto;\"></div>";}?>
                    </div>
                </div>
                
                <div class="col-md-12 text-center">
                <?php
                     if($_SESSION[id] == $data[id]){
                        echo "<a class=\"btn btn-danger text-center\" href = \"./delete.php?no=$data[no]&id=$data[id]\" onclick=\"return confirm('정말 삭제하시겠습니까??');\">삭제</a>";
                        echo "<a class=\"btn btn-primary text-center\" href = \"./edit.php?no=$data[no]&id=$data[id]\">수정</a>";
                    }                 
                ?>
                </div>
                <br><br>
                
                <hr width="100%">
                <div style="margin-left:auto; margin-right:auto; max-width:720px;"><h2>댓글</h2></div>
                <form action="./comment_post.php" method="post" style="text-align:center; margin-top:20px;">
                    <input type="hidden" name="listid" value="<?=$id?>">
                    <input type="hidden" name="no" value="<?=$no?>">
                    <input type="hidden" name="id" value="<?=$_SESSION[id]?>">

                    <div style="margin-bottom: 30px;">
                    <span><input style =" max-width:720px; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="name" value="<?=$_SESSION[name]?>" readonly="readonly"></span>
                        <div class="input-group" style="max-width:720px; margin:auto;">
                        <textarea type="text" class="form-control" name="comtext" style="resize: none;"></textarea>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" style="height:54px">작성</button>
                        </span>
                        </div><!-- /input-group -->
                    </div>
                </form>

                <?php
                $query2 = "select * from comment where listnumber='$no' order by no desc";
                $result2 = mysqli_query($connect,$query2);

                while($data2 = mysqli_fetch_array($result2)){
                    echo "<div class=\"panel panel-info\" style=\"max-width:720px; width:100%; margin-left:auto; margin-right:auto; margin-bottom:10px;\">";
                    echo "<div class=\"panel-heading\"><span class=\"glyphicon glyphicon-user\"></span><span style=\"margin-right:8px\"> $data2[name]</span>";
                    if($_SESSION[name] == $data2[name]){
                        echo "<div style=\"width: auto; display: inline-block; margin-right:2px;\"><a class=\"btn btn-danger btn-xs text-center\" href = \"./comdelete_post.php?no=$data2[no]&listnumber=$data2[listnumber]&id=$id\" onclick=\"return confirm('정말 삭제하시겠습니까?');\">삭제</a></div>";
                        }
                    echo "<span style=\"float:right;\">$data2[date]</span></div>";
                    echo "<div class=\"panel-body\">";
                    echo nl2br($data2[comtext]);
                    echo "</div>";      
                    echo "</div>";       
                    } ?>
            </div>

            
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>