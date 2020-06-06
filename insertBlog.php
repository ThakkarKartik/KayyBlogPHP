<?php
    require_once('config.php');
    $Title = $_REQUEST['txtTitle'];
    //$Content =addslashes($_REQUEST['txtContent']);
    //$Tags = $_REQUEST['txtTags'];
    $userID = $_SESSION['loginID'];
    $sql = "insert into tblBlog(Title,UserID,CreatedOn, ModifiedOn,TotalViews,Published) values('$Title',$userID,now(),now(),0,0)";
    //echo($sql);
    mysqli_query($link,$sql) or die(mysqli_error($link));
    $last_id = mysqli_insert_id($link);
    //echo($last_id);
    header("location:BlogEdit.php?id=".$last_id);
?>