<?php
include("config.php");
$blogid = $_POST['BlogID'];
$name = $_POST['Name'];
if($name != ''){
    $sql = "insert into tblTag values(null,'$name',$blogid,now())";
    mysqli_query($link,$sql) or die(mysqli_error($link)); 
}
$sql2 = "select * from tbltag where BlogID = $blogid";
$result = mysqli_query($link,$sql2) or die(mysqli_error($link));
    if(mysqli_num_rows($result) != 0){
        while($tags = mysqli_fetch_array($result))
        {
            ?>
<div class="col-2 mt-2">
    <div class="input-group">
        <?php 
        $txtTagName = "txtTagName".$tags['TagID'];
        $btnDel = "btnDelTag".$tags['TagID'];
         ?>
        <input type="text" disabled name="<?=$txtTagName?>" id="<?=$txtTagName?>" class="form-control" value="<?php echo $tags['TagName'];?>" />
        <div class="input-group-append">
            <input type="button"  name="<?=$btnDel?>" id="<?=$btnDel?>" value="X" class="btn btn-danger" onclick="DelTag(<?php echo $tags['TagID'];?>)" />
        </div>
    </div>
</div>
<?php
        }
    }
    else
    {
        echo null;
    }
?>