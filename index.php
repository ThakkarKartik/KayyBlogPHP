<html>

<head>
    <?php include('links.php');?>
</head>

<body>
    <?php include('header.php'); ?>
    <?php include('config.php'); ?>
    <div class='container'>
        <form method="POST">
            <br/>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
      <span class="input-group-text">Search :</span>
    </div>
  <input type="text" class="form-control" placeholder="Search Blogs">
  <div class="input-group-append">
    <input class="btn btn-success" type="submit" value="Search" />
  </div>
</div>
        </form>
        <section class="latest-posts">
        <!-- <div class="container"> -->
             <header>
                    <h2>Latest from the blogs</h2>
                </header>
                <div class="row">
                    <?php
                    $sql = "select * from tblBlog where Published = 1";
                    if ($result = mysqli_query($link, $sql)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                    <div class="post col-md-4">
                        <div class="post-thumbnail"><a href="ViewBlog.php?BlogID=<?php echo($row['BlogID']); ?>">
                        <img src="UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>" alt="..."
                                    class="img-fluid"></a></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date"><?php echo($row['CreatedON']); ?></div>
                            </div><a href="ViewBlog.php?BlogID=<?php echo($row['BlogID']); ?>">
                                <h3 class="h4"><?php echo($row['Title']); ?></h3>
                            </a>
                        </div>
                    </div>
                    <?php
                        }
                    }
          ?>
                </div>
            <!-- </div> -->
        </section>
    </div>
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>

</html>