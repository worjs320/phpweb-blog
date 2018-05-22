<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();

    date_default_timezone_set('Asia/Seoul');

    $id = $_POST[id];
    $name = $_POST[name];
    $title = htmlentities($_POST[title]);
    $title = trim($title);
    $address = htmlentities($_POST[address]);
    $date = date("Y-m-d.H:i", time());

    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    if(!$title)Error("제목을 입력해 주세요");
    if(!$address)Error("주소를 입력해 주세요");
    

    $query = "insert into movie(id,name,title,address,date)
        values('$id','$name','$title','$address','$date')";
    mysqli_query($connect,$query);
?>
<script>
    alert("게시글 작성 완료");
    location='./movie.php';
</script>
