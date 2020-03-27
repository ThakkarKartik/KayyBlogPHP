<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KayyBlog Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<body class="bg-dark">
<?php 
include_once "config.php";

if(isset($btnLogin))
{
  $str = "select * from tbluser where IsAdmin=1 and Email='$txtEmail' and Password ='$txtPwd'";
  $rs = mysqli_query($link,$str) or die(mysqli_error($link));
  if(mysqli_num_rows($rs)>0)
  {
    $res = mysqli_fetch_array($rs);
    if($res["IsActive"]==1)
    {
      $_SESSION["UserID"] = $res["UserID"];
      $_SESSION["PersonName"] = $res["FullName"];
      $_SESSION["IsAdmin"] = $res["IsAdmin"];
      //echo " Welcome ".$_SESSION["PersonName"];
      header("location:Users.php");
    }
    else
    {
      $Msg = "You are blocked user. Please contact administator.";
    }
  }
  else
  {
    $Msg= "Invalid Email or Password. ";
  }
}
?>
<form method="post">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div><label class="text-red offset-1" id="lblMsg"><?php if(isset($Msg)) echo $Msg; ?></label></div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="txtEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email Address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="txtPwd" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="btnLogin" value="Login"/>
         </form>
        <div class="text-center">
         <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
        </div>
      </div>
    </div>
  </div>
  </form>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
