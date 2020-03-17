
<?php
    require_once('config.php');
    if($_REQUEST == null)
    {
        die("Cannot Insert Data");
    }
    $Name = $_REQUEST['txtName'];
    $Email = $_REQUEST['txtEmail'];
    $ContactNo = $_REQUEST['txtContactNo'];
    $Password = $_REQUEST['txtPassword'];
    $CreatedOn = OCI_SYSDATE;

    $sql = "insert into tblUser values(null,'$Name','$Email','$ContactNo','$Password','$CreatedOn',1)";
    
?>