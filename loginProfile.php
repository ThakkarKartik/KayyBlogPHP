<html>
<head>
<?php include('links.php');?>
<?php include('config.php'); ?>
</head>
<?php 
    SessionCheck();
    $UserID = $_SESSION["loginID"];
    $sql = "select * from tblUser where UserID = $UserID";
    if($result = mysqli_query($link,$sql))
    {
        $user = mysqli_fetch_array($result);
    }
?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<div class="site-wrap">
<?php include('header.php'); ?>
    <div class="site-section">
    <div class='container'>
        <div class="row">
            <div class="col-md-2 mb-5">
                <img src="UploadedFiles/Users/<?php echo($user['ProfPic']) ?>" class="img img-thumbnail" />
            </div>
            <div class="col-md-4">
            <h3> <?=$user['FullName'] ?>'s Profile</h3>
            <p> Works on <?=$user['Area'] ?></p>
            <h6> <?=$user['Email'] ?></h6>
                
                <P> <?=$user['AboutUser'] ?></P>
                <br/>
                <a href="EditProfile.php" class="alert-link mr-5"> Edit Profile</a>
                <a href="ChangePassword.php" class="alert-link mr-5" href="#myModalCP" data-toggle="modal" data-target="#myModalCP"> Change Password</a>
            </div>
            <div class="col-md-6 text-right">
                <p class="text"> Feel to write today ?</p>
                    <!-- <input type="button" class="btn btn-light" value=" Create New Post "/> -->
                    <a class="btn btn-success" href="#myModal" data-toggle="modal" data-target="#myModal">
                        Add New Blog
                    </a>
            </div>
</div>
<hr/>
<h4 class="mt-5"> Your Blogs </h4>    
        <div class="container">
            
        <div class="latest-posts mt-2">
        
        <!-- <div class="container"> -->
            <div class="col-md-12">
            
              <?php
                        $sql = "select * from tblblog where UserID = $UserID and IsActive=1";
                    if ($result = mysqli_query($link, $sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                    <a href="BlogEdit.php?id=<?php echo($row['BlogID']); ?>">
                    <div class="row">
                            <div class="col-md-8 col-sm-12 border m-1 p-2" >
              <div class="post-entry-2 d-flex">
              <div class="thumbnail" style="background-image: url('UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>')"></div>
              <div class="contents">
                <h4><?=$row["Title"]?></h4>
                <p class="mb-3"><?=$row["AboutBlog"]?></p>
                <div class="post-meta">
                  <span class="date-read"><?=$row["CreatedON"]?> </span> <?=$row["TotalViews"]?> <span class="icon-star2"></span></span>
                </div>
                <br/>
                <!-- <a href="EditBlog.php?BlogID=<?php echo($row['BlogID']); ?>">Edit Blog</a> -->
                <?php 
                if ($row["Published"] == 1) {
                    ?>
                  <span class="btn-danger p-2"> Not Published </span>        
                  <?php
                }
                else
                {
                  ?>
                  <span class="btn-success p-2"> Published </span>
                <?php }?>  
              </div>
              </div>
              </div>
              </div>
              </a>
            </>
                <?php
                        }
                    }
                    ?>
            </div>
            <!-- </div> -->
        </div>
        </div>
    </div>
    </div>

    <?php include('footer.php'); ?>
    <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Blog</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="insertBlog.php" method="POST">
        <!-- Modal body -->
        <div class="modal-body">
            <input type="text" name="txtTitle" id="txtTitle" class="form-control"/>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success"> Continue </button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal" id="myModalCP">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="insertBlog.php" method="POST">
        <!-- Modal body -->
        <div class="modal-body">
            <input type="password" placeholder="OLD PASSWORD" name="txtOldPassword" id="txtOldPassword" class="form-control mt-1"/>
            <input type="password" placeholder="NEW PASSWORD" name="txtNewPassword" id="txtNewPassword" class="form-control mt-1"/>
            <input type="password" placeholder="CONFIRM PASSWORD" name="txtConPassword" id="txtConPassword" class="form-control mt-1"/>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success"> Change Password </button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>    
</body>
<?php include('scripts.php'); ?>
</html>
