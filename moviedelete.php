<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
    $signup=signupp();

    $no=$_GET[no];
    $id=$_GET[id];
    $title = $_POST[title];
    $text = $_POST[text];

    $query="delete from movie where no='$no' and id='$id' and name='$_SESSION[name]' ";
    mysqli_query($connect,$query);
?>
<script>
    alert('삭제 완료');
    location.href='./movie.php';
</script>