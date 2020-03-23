<?php
    require_once('config.php');
    $Title = $_REQUEST['txtTitle'];
    $Content = $_REQUEST['txtContent'];
    $Tags = $_REQUEST['txtTags'];
    $sql = "insert into tblBlog(BlogID,Title,Content,UseID,CreatedOn, ModifiedOn,TotalViews) values(null,'$Title','$Content',1,'now()','now()',0)";
    echo($sql);
    if(mysqli_query($link,$sql))
    {
        header("location:index.php");
    }
    else
    {
        echo("No Data Inserted ");
    }
?>