<?php
    require_once('config.php');
    $Name = $_REQUEST['txtName'];
    $Email = $_REQUEST['txtEmail'];
    $ContactNo = $_REQUEST['txtContactNo'];
    $Password = $_REQUEST['txtPassword'];
    $CreatedOn = new DateTime();
    $sql = "insert into tblUser values(null,'$Name','$Email','$ContactNo','$Password',now(),1)";
    // echo($sql);
    if(mysqli_query($link,$sql))
    {
        header("location:index.php");
    }
    else
    {
        echo("No Data Inserted ");
    }
?>