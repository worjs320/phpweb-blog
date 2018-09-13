<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();

    $no=$_GET[no];
    $id=$_GET[id];
    $listnumber=$_GET[listnumber];
    $title = $_POST[title];
    $text = $_POST[text];

    $query="delete from movie where no='$no' and id='$id' and name='$_SESSION[name]' ";
    mysqli_query($connect,$query);
    
    $query2="delete from mcomment where listnumber='$listnumber' ";
    mysqli_query($connect,$query2);
?>
<script>
    alert('삭제 완료');
    location.href='./movie.php';
</script>
