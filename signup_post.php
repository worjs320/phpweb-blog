<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","root","111111","phpweb");

    $id=$_POST[id];
    $pw=$_POST[pw];
    $name=$_POST[name];
    $sex=$_POST[sex];
    $email=$_POST[email];

    $query1 = "select * from signup where id='$id'";
    $result = mysqli_query($connect,$query1);
    $data = mysqli_fetch_array($result);

    $query2 = "select * from signup where name='$name'";
    $result2 = mysqli_query($connect,$query2);
    $data2 = mysqli_fetch_array($result2);

    if(!$id)Error("id를 입력하세요");
    if($data)Error("중복되는 id 입니다");
    if($data2)Error("중복되는 닉네임 입니다");
    if(!$pw)Error("비밀번호를 입력하세요");
    if(!$name)Error("이름을 입력하세요");
    if(!$sex)Error("성별을 선택하세요");
    if(!$email)Error("이메일을 입력하세요");
    
    $query = "insert into signup(id,pw,name,sex,email)
    values('$id','$pw','$name','$sex','$email')";
    mysqli_query($connect,$query);

?>
<script>
    alert("회원가입 완료");
    location='./index.php';
</script>
