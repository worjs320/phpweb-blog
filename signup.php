<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bal-ag Community</title>
    <link rel="shortcut icon" type="image⁄x-icon" href="./images/파비콘.PNG">


    <link href="css/bootstrap.css" rel="stylesheet">


    <link href="./css/navbar.css" rel="stylesheet">


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <style>
        .textcenter{
            text-align : center;
        }
    </style>
</head>

<body>
    <?php
    include("./modal.php")
    include("./lib/dbcon.php");
    $connect = dbconn();
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
            </div>
        </nav>

        <div class="jumbotron" style="padding-bottom:65px; max-width:800px; margin-right:auto; margin-left:auto; padding-top:10px;">
		<div class="textcenter"><h2>Sign Up</h2></div>
        <form method="post" action="./signup_post.php" class="form-horizontal" >
			<div class="form-group">
				<label class="col-md-3 control-label">Id</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="id" placeholder="아이디를 입력하세요" > 
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="pw" placeholder="비밀번호를 입력하세요" style="ime-mode:inactive">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="name" placeholder="이름을 입력하세요">
				</div>
			</div>
			<div class="form-group" style="text-align: center">
				<div class="btn-group">
				    <label class="btn btn-primary">
					    <input type="radio" name="sex" autocomplete="off" value="M">남자
				    </label>
				    <label class="btn btn-danger">
					    <input type="radio" name="sex" autocomplete="off" value="F">여자
				    </label>
				</div>
			</div>				
			<div class="form-group">
				<label class="col-md-3 control-label">이메일</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="email"  placeholder="Email을 입력하세요"> 
				</div>
			</div>	
			<div class="col-md-12 text-center">
				<input class="btn btn-primary" type="submit" value="회원가입">
			</div>
		</form>
	</div>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>