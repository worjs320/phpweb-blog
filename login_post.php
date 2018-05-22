<?php 
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    session_start();

    $id = $_POST[id];
    $pw = $_POST[pw];

    $query = "select * from signup where id='$id'";
    mysqli_query("set names utf8");
    $result = mysqli_query($connect,$query);
    $signup = mysqli_fetch_array($result);

    if(!$id)Error("등록되지 않은 ID입니다");
    if(!$signup[id])Error("ID를 입력해 주세요");
    if(!$pw)Error("비밀번호를 입력해 주세요");
    if($signup[pw]!=$pw)Error("비밀번호가 일치하지 않습니다");

    if($signup[id] and $signup[pw] == $pw){
    $tmp=$signup[id]."//".$signup[pw];
    $_SESSION[id] = $id;
    $_SESSION[pw] = $pw;
    $_SESSION[name] = $signup[name];
    }
?>

<script>
    window.alert('로그인 되었습니다.');
    location.href='./index.php';
</script>
