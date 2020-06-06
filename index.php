<html>
<head>
    <?php include('links.php');?>
    <?php include('config.php'); ?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <?php include('header.php'); ?>
        <div class="site-section py-0">
            <div class="owl-carousel hero-slide owl-style">
                <?php
                        $sql = "SELECT * FROM tblblog b, tbluser u where b.UserID = u.UserID and b.Published = 1 and b.IsActive = 1 order by b.CreatedOn desc limit 5";
                    if ($result = mysqli_query($link, $sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                <div class="site-section">
                    <div class="container">
                        <div class="half-post-entry d-block d-lg-flex bg-light">
                            <div class="img-bg" style="background-image: url('UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>')"></div>
                            <div class="contents">
                                <span class="caption">Editor's Pick</span>
                                <h2><a href="ViewBlog.php?BlogID=<?php echo($row['BlogID']); ?>"><?php echo($row['Title']); ?></a></h2>
                                <p class="mb-3"><?php echo($row['AboutBlog']); ?>
                                </p>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#"><?php echo($row['FullName']); ?></a> in <a href="#">Area of <?=$row["Area"]?></a></span>
                                    <span class="date-read"><?php echo($row['CreatedOn']); ?><span class="mx-1">&bullet;</span> <?php echo($row['TotalViews']); ?> <span
                                            class="icon-star2"></span></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
          ?>


            </div>
        </div>

        <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-12">
                <div class="section-title">
                  <h3 class="color-black-opacity-5">Latest Uploaded</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
              <?php
                        $sql = "select * from tblblog b, tbluser u where b.UserID = u.UserID and BlogID = (select Max(BlogID) from tblblog where Published = 1)";
                    if ($result = mysqli_query($link, $sql)) {
                        $row = mysqli_fetch_array($result);
                        ?>
                <div class="post-entry-1">
                  <a href="ViewBlog.php?BlogID=<?php echo($row['BlogID']); ?>"><img src="UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>" alt="Image" class="img-fluid"></a>
                  <h2><a href="ViewBlog.php?BlogID=<?php echo($row['BlogID']); ?>"><?php echo($row['Title']); ?></a></h2>
                  <p><?php echo($row['AboutBlog']); ?></p>
                  <div class="post-meta">
                  <span class="d-block"><a href="#"><?php echo($row['FullName']); ?></a> in <a href="#">Area of Writer</a></span>
                                    <span class="date-read"><?php echo($row['CreatedOn']); ?><span class="mx-1">&bullet;</span> <?php echo($row['TotalViews']); ?> <span
                                            class="icon-star2"></span></span>
                  </div>
                </div>
                    <?php }
                    ?>
              </div>
              <div class="col-md-6">
              <?php
                        $sql = "select * from tblblog b, tbluser u where b.UserID = u.UserID and Published = 1 and b.IsEditorChoice = 0 limit 4";
                    if ($result = mysqli_query($link, $sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
              <div class="post-entry-2 d-flex bg-light">
                  <div class="thumbnail" style="background-image: url('UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>')"></div>
                  <div class="contents">
                    <h2><a href="ViewBlog.php?BlogID=<?php echo($row['BlogID']); ?>"><?php echo($row['Title']); ?> </a></h2>
                    <div class="post-meta">
                    <span class="d-block"><a href="#"><?php echo($row['FullName']); ?></a> in <a href="#">Area of Writer</a></span>
                                    <span class="date-read"><?php echo($row['CreatedOn']); ?><span class="mx-1">&bullet;</span> <?php echo($row['TotalViews']); ?> <span
                                            class="icon-star2"></span></span>
                    </div>
                  </div>
                </div>
                <?php
                        }
                    }
                    ?>
                    
            </div>
            <a href="AllBlogs.php" class="btn btn-primary align-center col-md-12"> View More </a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="section-title">
              <h2>  </h2>
            </div>
            
          </div>
        </div>
      </div>
    </div>


        <?php include('footer.php'); ?>
    </div>
</body>
<?php include('scripts.php'); ?>

</html>