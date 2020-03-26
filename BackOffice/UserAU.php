<?php require_once("config.php"); ?>
<html>
<head>
        <?php include('links.php'); ?>
        <title> Blank Page </title>
    </head>
<body>
<?php 
if(isset($btnSave))
{
    $FileName="";
    if(!empty($_FILES["txtFile"]["name"]))
    {
        $FileName=Date('Ymds').$_FILES["txtFile"]["name"];
        move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../UploadedFiles/Users/$FileName");
    }
    $str = "insert into tbluser values (null,'$txtFName','$txtEmail','$txtContactNo','$FileName','$txtPassword',now(),1,'',1)";
    mysqli_query($link,$str) or die(mysqli_error($link));
    header("location:Users.php");
}
?>
    <?php include('header.php'); ?>
<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"> Home </a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <!-- Page Content -->

        <form id="frmAdmin" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtFName"> Full Name :</label>
                        <input type="text" class="form-control col-10" name="txtFName" placeholder="Enter User Name" />
                    </div>

                    <div class="form-group">
                        <label for="txtEmail"> E-Mail :</label>
                        <input type="text" class="form-control col-10" name="txtEmail" placeholder="E-Mail Address" />
                    </div>
                    <div class="form-group">
                        <label for="txtContactNo"> Contact No :</label>
                        <input type="text" class="form-control col-10" name="txtContactNo" placeholder="Contact Number" />
                    </div>
                    <div class="form-group">
                        <label for="txtPassword"> Password :</label>
                        <input type="text" class="form-control col-10" name="txtPassword" placeholder="Password" />
                    </div>
                    <input type="submit" name="btnSave" class="btn btn-success" value="Insert User" />
                </div>
                <div class="col-6">
                        <img src="images/NoImg.png" class="rounded-circle" height="100px" width="100px" />
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="txtFile" name="txtFile" />
                        </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
<?php include('footer.php');?>
</body>
<?php include('scripts.php');?>
</html>
