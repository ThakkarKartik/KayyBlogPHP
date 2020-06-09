<?php
    require_once('config.php');
    $OldPass = $_REQUEST['txtOldPassword'];
    $NewPass = $_REQUEST['txtNewPassword'];

    $userID = $_SESSION['loginID'];
    $sql = "select * from tbluser where UserID = $userID";
    $record = mysqli_query($link, $sql) or die(mysqli_error($link."->".$sql));
    $row = mysqli_fetch_array($record);
    if ($row["Password"] == $OldPass) {
        
            $sql = "update tbluser set password = '$NewPass' where UserID = $userID";
            mysqli_query($link, $sql) or die(mysqli_error($link."->".$sql));
            header("location:login.php?change=true");
    }
    else
    {
        header("location:login.php?change=false");
    }

?>