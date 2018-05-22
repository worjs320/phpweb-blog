<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $signup=signupp();

    date_default_timezone_set('Asia/Seoul');

    $id = $_POST[id];
    $name = $_POST[name];
    $title = htmlentities($_POST[title]);
    $title = trim($title);
    $text = htmlentities($_POST[text]);
    $date = date("Y-m-d H:i", time());

    if($_FILES[file01][name]){
        $file_name = strtolower($_FILES['file01']['name']);
        $file_split = explode(".",$file_name);
        
        $filename = $file_split[count($file_split)-2];
        $filetype = $file_split[count($file_split)-1];

        $tates = date("ymdhis",time());
        echo $newfilename = $tates.".".$filetype;
        $dir = "./imagedata/";
        $uploadFile = $dir.$newfilename;
        if(move_uploaded_file($_FILES['file01']['tmp_name'],$uploadFile);
        chmod($dir.$newfilename,777);
        
    }

    if(!$_SESSION[name])Error("로그인 후 이용해 주세요");
    if(!$title)Error("제목을 입력해 주세요");
    if(!$text)Error("내용을 입력해 주세요");
    

    $query = "insert into textpage(id,name,title,text,date,file)
        values('$id','$name','$title','$text','$date','$newfilename')";
    mysqli_query($connect,$query);
?>
<script>
    alert("게시물 등록 완료");
    location='./board.php';
</script>