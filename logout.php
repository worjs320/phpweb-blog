<?php
session_start();
session_destroy();
?>
<script>
    window.alert('로그아웃 되었습니다');
    location = './index.php';
</script>
