<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
    $signup=signupp();

    date_default_timezone_set('Asia/Seoul');

    $id = $_POST[id];
    $name = $_POST[name];
    $title = htmlentities($_POST[title]);
    $title = trim($title);
    $text = htmlentities($_POST[text]);
    $date = date("Y-m-d H:i", time());

    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    if(!$title)Error("제목을 입력해 주세요");
    if(!$text)Error("내용을 입력해 주세요");
    

    $query = "insert into textpage(id,name,title,text,date)
        values('$id','$name','$title','$text','$date')";
    mysqli_query($connect,$query);
?>
<script>
    alert("제목을 이용해 주세요");
    location='./board.php';
</script>