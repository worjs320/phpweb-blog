<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();
    if(!$_SESSION[id])Error("로그인 후 이용해 주세요");
    
    $id=$_GET[id];
    $no=$_GET[no];
    $listnumber=$_GET[listnumber];
    $title = $_POST[title];
    $text = $_POST[text];
    
    $query="delete from mcomment where no='$no' and listnumber='$listnumber' and name='$_SESSION[name]' ";
    mysqli_query($connect,$query);
?>
<script>
    alert('삭제 완료');
    location.href='./movie.php';
</script>
