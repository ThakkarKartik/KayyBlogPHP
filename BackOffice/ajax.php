<?php 
include_once "config.php";
$user_id=$id;
$status=$status;
$sql=mysqli_query($link,"UPDATE tbluser SET IsActive='$status' WHERE UserID='$user_id'");
echo $sql;
//echo 1;
?>
