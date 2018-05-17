<?php
function dbconn(){
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    if(mysqli_connect_errno($connect)){
        echo "db연결 실패".mysqli_connect_error();
    }
}

function Error($msg){
    echo"
    <script>
        window.alert('$msg');
        history.back(1);
    </script>
    ";
    exit;
};

function signupp(){
    $connect = mysqli_connect("localhost","root","111111","phpweb");
    $temps=$_COOKIE["COOKIES"];
    $cookise =explode("//","$temps");

$query = "select * from signup where id='$cookise[0]'";
$result = mysqli_query($connect,$query);
$signupp = mysqli_fetch_array($result);
return $signupp;
}

?>