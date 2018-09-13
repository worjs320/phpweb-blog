<head>
<link href="css/bootstrap.css" rel="stylesheet">
<head>

<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();
    date_default_timezone_set('Asia/Seoul');
    
    $listnumber = $_POST[listnumber];
    $id = $_POST[id];
    $name = $_POST[name];
    $mcomtext = htmlentities($_POST[mcomtext]);
    $date = date("Y-m-d H:i", time());

    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    if(!$mcomtext)Error("내용을 입력하세요");

    $query = "insert into mcomment(listnumber,id,name,mcomtext,date)
        values('$listnumber','$id','$name','$mcomtext','$date')";
    mysqli_query($connect,$query);
?>
<script>
    alert('댓글 작성 완료.');
    location.href='./movie.php';
</script>
