<head>
<link href="css/bootstrap.css" rel="stylesheet">
<head>

<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();
    date_default_timezone_set('Asia/Seoul');
    
    $listid = $_POST[listid];
    $listnumber = $_POST[no];
    $id = $_POST[id];
    $name = $_POST[name];
    $comtext = htmlentities($_POST[comtext]);
    $date = date("Y-m-d H:i", time());

    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    if(!$comtext)Error("내용을 입력해 주세요");

    $query = "insert into comment(listnumber,id,name,comtext,date)
        values('$listnumber','$id','$name','$comtext','$date')";
    mysqli_query($connect,$query);
?>
<script>
    alert('댓글 작성 완료');
    location.href='./boardview.php?id=<?=$listid?>&no=<?=$listnumber?>';
</script>