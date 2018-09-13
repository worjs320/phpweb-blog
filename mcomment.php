<div class="jumbotron" style="padding-bottom:0px; padding-top:10px; max-width:800px; margin-right:auto; margin-left:auto;">
<hr width="100%">
                <div style="margin-left:auto; margin-right:auto; max-width:720px;"><h2>댓글</h2></div>
                <form action="./mcomment_post.php" method="post" style="text-align:center; margin-top:20px;">
                    <input type="hidden" name="listnumber" value="<?=$number?>">
                    <input type="hidden" name="id" value="<?=$_SESSION[id]?>">

                    <div style="margin-bottom: 30px;">
                    <span><input style =" max-width:720px; margin-left:auto; margin-right:auto;" class="form-control" type="text" name="name" value="<?=$_SESSION[name]?>" readonly="readonly"></span>
                        <div class="input-group" style="max-width:720px; margin:auto;">
                        <textarea type="text" class="form-control" name="mcomtext" style="resize: none;"></textarea>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" style="height:54px">작성</button>
                        </span>
                        </div><!-- /input-group -->
                    </div>
                </form>

                <?php
                $query2 = "select * from mcomment where listnumber='$number' order by no desc";
                $result2 = mysqli_query($connect,$query2);

                while($data2 = mysqli_fetch_array($result2)){
                    echo "<div class=\"panel panel-info\" style=\"max-width:720px; width:100%; margin-left:auto; margin-right:auto; margin-bottom:10px;\">";
                    echo "<div class=\"panel-heading\"><span class=\"glyphicon glyphicon-user\"></span><span style=\"margin-right:8px\"> $data2[name]</span>";
                    if($_SESSION[name] == $data2[name]){
                        echo "<div style=\"width: auto; display: inline-block; margin-right:2px;\"><a class=\"btn btn-danger btn-xs text-center\" href = \"./mcommentdelete_post.php?no=$data2[no]&listnumber=$data2[listnumber]&id=$id\" onclick=\"return confirm('정말 삭제하시겠습니까?');\">글 삭제</a></div>";
                        }
                    echo "<span style=\"float:right;\">$data2[date]</span></div>";
                    echo "<div class=\"panel-body\">";
                    echo nl2br($data2[mcomtext]);
                    echo "</div>";
                    echo "</div>";
                    } ?>
            </div>
