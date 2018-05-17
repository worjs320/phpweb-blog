<?php
    include("./lib/dbcon.php");
    $connect = mysqli_connect("localhost","id5424089_root","111111","id5424089_phpweb");
    $signup=signupp();
    if(!$_SESSION[id])Error("�α��� �� �̿��� �ּ���");
    
    $id=$_GET[id];
    $no=$_GET[no];
    $listnumber=$_GET[listnumber];
    $title = $_POST[title];
    $text = $_POST[text];
    
    $query="delete from comment where no='$no' and listnumber='$listnumber' and name='$_SESSION[name]' ";
    mysqli_query($connect,$query);
?>
<script>
    alert('댓글 삭제 완료');
    location.href='./boardview.php?id=<?=$id?>&no=<?=$listnumber?>';
</script>