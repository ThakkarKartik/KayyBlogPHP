<html>
<head>
<?php include('links.php');?>
<?php include('config.php'); ?>
</head>
<?php 
    $UserID = $_GET["id"];
    $sql = "select * from tbluser where UserID = $UserID";
    if ($result = mysqli_query($link, $sql)) {
        $user = mysqli_fetch_array($result);
    }
?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <?php include('header.php'); ?>
    <div class="site-section">
    <div class='container'>
        <div class="row">
            <div class="col-md-2">
                <img src="UploadedFiles/Users/<?php echo($user['ProfPic']) ?>" class="img img-thumbnail" oncontextmenu="return false" />
            </div>
            <div class="col-md-4">
            <h3> <?=$user['FullName'] ?>'s Profile</h3>
            <h6> <?=$user['Email'] ?></h6>
                <br/>
                <P> <?=$user['AboutUser'] ?></P>
                
            </div>
        </div>
        <div class="container mt-5">
        <div class="latest-posts mt-2">
            <!-- <div class="container"> -->
            <div class="col-md-12">
              <?php

                        $sql = "select * from tblblog where UserID = $UserID and IsActive=1";
                    if ($result = mysqli_query($link, $sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                  <div class="post-entry-2 d-flex">
              <div class="thumbnail" style="background-image: url('UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>')"></div>
              <div class="contents">
                <h2><a href="BlogEdit.php?id=<?php echo($row['BlogID']); ?>"><?=$row["Title"]?></a></h2>
                <p class="mb-3"><?=$row["AboutBlog"]?></p>
                <div class="post-meta">
                  <span class="date-read"><?=$row["CreatedON"]?> </span> <?=$row["TotalViews"]?> <span class="icon-star2"></span></span>
                </div>
                <!-- <a href="EditBlog.php?BlogID=<?php echo($row['BlogID']); ?>">Edit Blog</a> -->
              </div>
              </div>
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
</body>
<?php include('scripts.php'); ?>
</html>