<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();
    if(!$_SESSION[id])Error("로그인 후 이용해 주세요");

    $no=$_GET[no];
    $id=$_GET[id];
    $title = $_POST[title];
    $text = $_POST[text];
    
    if($id!=$_SESSION[id])Error("게시글 주인이 아닙니다");

    $query3 = "select * from textpage where no='$no'";
    $result = mysqli_query($connect,$query3);
    $data=mysqli_fetch_array($result);
    $dir = './imagedata/180521115104.png';
    unlink($dir);
    
    $query="delete from textpage where no='$no' and id='$id' and name='$_SESSION[name]' ";
    mysqli_query($connect,$query);
    
    $query2="delete from comment where listnumber='$no'";
    mysqli_query($connect,$query2);
    
    
?>
<script>
    alert('삭제 완료');
    location.href='./board.php';
</script>