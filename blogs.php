<html>

<head>
    <?php include('links.php');?>
    <?php include('config.php');?>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <?php include('header.php'); 
        $subject = null;
        $tag = null;
        $sqlBlog = "select * from tblblog where IsActive=1 and Published=1 order by TotalViews desc";
        if(isset($_GET["subject"]))
        {
                $subject = $_GET["subject"];
                $sqlBlog = "select * from tblblog where Subject = '$subject' and IsActive=1 and Published=1 order by TotalViews desc";
                
        }
        else if(isset($_GET["tag"]))
        {
            $tag = $_GET["tag"];
            $sqlBlog = "select * from tblblog b join tbltag t on b.BlogID = t.BlogID where TagName = '$tag' and IsActive=1 and Published=1 order by TotalViews desc";
        }
        ?>
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="tag m-2">Top Subject</h3>
                        <hr />
                        <?php 
                        $sql2 = "select Subject, count(Subject) as cnt from tblblog group by Subject order by count(Subject) desc limit 5";
                        $result = mysqli_query($link,$sql2) or die(mysqli_error($link));
                        if(mysqli_num_rows($result) != 0){
                             while ($tags = mysqli_fetch_array($result)) {
                                 ?>
                        <a href="blogs.php?subject=<?=$tags['Subject']?>" class="btn btn-primary mt-2"> <?=$tags["Subject"]?> (<?=$tags["cnt"]?>) </a>
                        <?php
                             }
                            }
                        ?>
                        <br />
                        <br />
                        <h3 class="tag m-2">Top Tags</h3>
                        <hr />
                        <?php 
                        $sql2 = "select TagName, count(TagName) from tbltag group by TagName order by count(TagName) desc limit 10";
                        $result = mysqli_query($link,$sql2) or die(mysqli_error($link));
                         if(mysqli_num_rows($result) != 0){
                             while ($tags = mysqli_fetch_array($result)) {
                                 ?>
                        <a href="blogs.php?tag=<?=$tags['TagName']?>" class="btn btn-primary mt-2"> <?=$tags["TagName"]?> </a>
                        <?php
                             }
                            }
                    ?>
                        <br />
                        <br />

                    </div>
                    <div class="col-md-8">
                        <h3> Most Viewed </h3>
                        <hr/>
                        <?php
                        // $sqlBlog = "select * from tblblog where IsActive=1 and Published=1 order by TotalViews desc";
                        if ($result = mysqli_query($link, $sqlBlog)) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-md-12 col-sm-12">
                                <div class="post-entry-2 d-flex">
                                    <div class="thumbnail"
                                        style="background-image: url('UploadedFiles/BlogImage/<?php echo($row['BlogImage']) ?>')">
                                    </div>
                                    <div class="contents">
                                        <h4><?=$row["Title"]?></h4>
                                        <p class="mb-3"><?=$row["AboutBlog"]?></p>
                                        <div class="post-meta">
                                            <span class="date-read"><?=$row["CreatedON"]?> </span>
                                            <?=$row["TotalViews"]?> <span class="icon-star2"></span></span>
                                        </div>
                                        <br />
                                        <!-- <a href="EditBlog.php?BlogID=<?php echo($row['BlogID']); ?>">Edit Blog</a> -->
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>

</html>