<head>
<link href="css/bootstrap.css" rel="stylesheet">
<head>

<?php
  

    $rr=ceil($num/$view_total);
        
    if($_page%10){$goto=$_page-$_page%10 +1;}
    elseif($goto=$_page);
    $last = $goto+10;

    echo "<ul class=\"pagination\" style=\"display: table; margin-left: auto; margin-right:auto;\">";
    
    for($e=$goto; $e<$last; $e++){
        if($e>$rr) break;
        if($e==$_page) {
            echo "<li class=\"active\"><a href=\"#\">$e</a></li>";
        }
        else {
            echo "<li><a href=$PHP_SELF?_page=$e$href>$e</a></li>";
            
        }
    }
    echo "</ul>";
?>