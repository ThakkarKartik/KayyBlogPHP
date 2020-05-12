<html>
<head>
<?php include('links.php');?>
<?php include('config.php'); ?>
</head>
<?php 
    $UserID = $_GET["id"];
    $sql = "select * from tblUser where UserID = $UserID";
    if($result = mysqli_query($link,$sql))
    {
        $user = mysqli_fetch_array($result);
    }
?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <?php include('header.php'); ?>
    <div class="site-section">
    <div class='container'>
        <div class="row">
            <div class="col-md-2">
                <img src="UploadedFiles/Users/<?php echo($user['ProfPic']) ?>" class="img img-thumbnail" />
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

                        $sql = "select * from tblblog where UserID = $UserID";
                    if ($result = mysqli_query($link, $sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
              <div class="post-entry-2 d-flex">
              <div class="thumbnail" style="background-image: url('images/img_v_1.jpg')"></div>
              <div class="contents">
                <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi temporibus praesentium neque, voluptatum quam quibusdam.</p>
                <div class="post-meta">
                  <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                  <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                </div>
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