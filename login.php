<html>
<head>
<?php include('links.php');?>
<?php include('config.php');?>
</head>
<?php 
    if(isset($btnSignin)){
        $sql = "select * from tbluser where (Email = '$txtUserName' or ContactNo = '$txtUserName') and Password = '$txtPassword' and IsActive = 1";
        $Result = mysqli_query($link,$sql) or die(mysqli_error($link)."->".$sql);
        if($Row = mysqli_fetch_array($Result))
        {
            $_SESSION["loginID"] = $Row['UserID'];
            header("location:loginProfile.php");
        }
    }
?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
    <?php include('header.php'); ?>
    <div class="site-section">
        <div class="container">
        <div class="row">
            <div class="bg-dark p-5 m-2 col-md-5 col-sm-12">
            <form action="" method="post">
            <div class="form-group">
                <label for="txtUserName" class="col-form-label ml-3" style="color:white">Email Address or Contact Number </label>
                <input id="txtUserName" name="txtUserName" class="form-control" type="text" name="txtUserName">
            </div>
            <div class="form-group">
                <label for="txtPassword" class="col-form-label ml-3" style="color:white">Password </label>
                <input id="txtPassword" name="txtPassword" class="form-control" type="password" name="txtPassword">
            </div>
            <button type="submit" name="btnSignin" id="btnSignin" class="btn btn-success mt-5">Sign-In</button>
            <br/><br/><a href="forgetpassword.php" class="ml-2" style="color:white"> I Forgot my Password </a>
            </form>
            </div>
            <div class="m-2 p-5 col-md-5 col-sm-12">
            <h4 class="card-title"> Not a Member ? </h4>
            <p> You can be a renown Blogger by start Blogging on our Website and share it to your Friends and Family.
            </p> 
            <p>
                Just Provide us you Simple Information by clicking Here
            </p>
            <br/>
            <button type="submit" class="btn btn-primary">Become a Blogger</button> 
            
            </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
</body>
<?php include('scripts.php'); ?>
</html>