<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
    $signup=signupp();
    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    
    $no = $_POST[no];    
    $id = $_POST[id];
    $title = htmlentities($_POST[title]);
    $title = trim($title);
    $address = htmlentities($_POST[address]);
    if(!$title)Error("제목을 입력해 주세요");
    if(!$address)Error("주소를 입력해 주세요");

    $query="update movie set title='$title',address='$address' where id='$id' and no='$no'";
    mysqli_query($connect,$query);
?>
<script>
    alert('수정 완료');
    location.href='./movie.php';
</script>