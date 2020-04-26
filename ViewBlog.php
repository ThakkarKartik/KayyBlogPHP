<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php 
include('links.php');?>
    <?php include('config.php'); ?>
</head>

<body>
    <?php include('header.php'); 
    
    ?>
    <?php 
    if (isset($_GET["BlogID"])) {
        $BlogID = $_GET["BlogID"];
        $sql = "Select * from tblBlog where BlogID = $BlogID";
        if ($result = mysqli_query($link, $sql)) {
            $Blog = mysqli_fetch_array($result);
        }
    }
    ?>
    <div class='container'>
        <div class="row">
            <!-- Latest Posts -->
            <main class="post blog-post col-lg-8">
                <div class="container">
                    <div class="post-single">
                        <div class="post-thumbnail">
                            <img src="UploadedFiles/BlogImage/<?php echo($Blog["BlogImage"]) ?>" alt="..."
                                class="img-fluid">
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <!-- <div class="category"><a href="#">Business</a><a href="#">Financial</a></div> -->
                            </div>
                            <h1><?php echo($Blog["Title"]); ?></h1>
                            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#"
                                    class="author d-flex align-items-center flex-wrap">
                                    <!-- Users Details -->
                                    <?php 
                    $UserID = $Blog["UserID"];
                    $sql = "Select * from tblUser where UserID = $UserID";
                    if ($result = mysqli_query($link, $sql)) {
                        $User = mysqli_fetch_array($result);
                    }           
                ?>
                                    <div class="avatar">
                                        <img src="UploadedFiles/Users/<?php echo($User["ProfPic"]) ?>" alt="..."
                                            class="img-fluid">
                                    </div>
                                    <div class="title"><span><?php echo($User["FullName"]) ?></span></div>
                                </a>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="date"><i class="icon-clock"></i><?php echo($Blog["CreatedON"]) ?></div>
                                    <div class="views"><i class="icon-eye"></i><?php echo($Blog["TotalViews"]) ?></div>
                                </div>
                            </div>
                            <div class="post-body">
                                <span> <?php 
                // header("Content-Type: text/html; charset=utf-8");
                        echo stripslashes($Blog['Content']); ?></span>
                            </div>
                            <div class="post-tags">
                                <?php 
                    $BlogID = $Blog["BlogID"];
                    $sql = "Select * from tblTag where BlogID = $BlogID";
                    if ($result = mysqli_query($link, $sql)) {
                    while ($tag = mysqli_fetch_array($result)) {
                        ?>
                                <a href="#" class="tag">#<?php echo($tag["TagName"]) ?></a>
                                <?php
                    }
                }
                ?>
                            </div>

                            <div
                                class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                                <?php 
                    // Previous Post
                    if (isset($_GET["BlogID"])) {
                        $BlogID = $_GET["BlogID"];
                        $PrevBlogID = $BlogID - 1;
                        $sql = "Select * from tblBlog where BlogID = $PrevBlogID";
                        if ($result = mysqli_query($link, $sql)) {
                            $PrevBlog = mysqli_fetch_array($result);
                        ?>
                                <a href="ViewBlog.php?BlogID=<?=$PrevBlog['BlogID'] ?>"
                                    class="prev-post text-left d-flex align-items-center">
                                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="text"><strong class="text-primary">Previous Post </strong>


                                        <h6><?php echo($PrevBlog['Title']) ?></h6>
                                    </div>
                                </a>
                                <?php
                        }
                    }?>
                                <?php 
                    // Next Post
                    if (isset($_GET["BlogID"])) {
                        $BlogID = $_GET["BlogID"];
                        $NextBlogID = $BlogID + 1;
                        $sql = "Select * from tblBlog where BlogID = $NextBlogID";
                        if ($result = mysqli_query($link, $sql)) {
                            $NextBlog = mysqli_fetch_array($result);
                        ?>
                                <a href="ViewBlog.php?BlogID=<?=$NextBlog['BlogID'] ?>"
                                    class="next-post text-right d-flex align-items-center justify-content-end">

                                    <div class="text"><strong class="text-primary">Next Post </strong>
                                        <h6><?php echo($PrevBlog['Title']) ?></h6>
                                    </div>
                                    <div class="icon next"><i class="fa fa-angle-right"> </i></div>
                                </a></div>
                            <?php
                        }
                    }
                    ?>
                            <div class="post-comments">

                            </div>
                        </div>
                    </div>
            </main>
            <aside class="col-lg-4">
                <!-- Widget [Search Bar Widget]-->
                <div class="widget search">
                    <header>
                        <h3 class="h6">Search the blog</h3>
                    </header>
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <input type="search" placeholder="What are you looking for?">
                            <button type="submit" class="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6">Latest Posts</h3>
                    </header>
                    <div class="blog-posts"><a href="#">
                            <div class="item d-flex align-items-center">
                                <div class="image"><img src="img/small-thumbnail-1.jpg" alt="..." class="img-fluid">
                                </div>
                                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                                    <div class="d-flex align-items-center">
                                        <div class="views"><i class="icon-eye"></i> 500</div>
                                        <div class="comments"><i class="icon-comment"></i>12</div>
                                    </div>
                                </div>
                            </div>
                        </a><a href="#">
                            <div class="item d-flex align-items-center">
                                <div class="image"><img src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid">
                                </div>
                                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                                    <div class="d-flex align-items-center">
                                        <div class="views"><i class="icon-eye"></i> 500</div>
                                        <div class="comments"><i class="icon-comment"></i>12</div>
                                    </div>
                                </div>
                            </div>
                        </a><a href="#">
                            <div class="item d-flex align-items-center">
                                <div class="image"><img src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid">
                                </div>
                                <div class="title"><strong>Alberto Savoia Can Teach You About</strong>
                                    <div class="d-flex align-items-center">
                                        <div class="views"><i class="icon-eye"></i> 500</div>
                                        <div class="comments"><i class="icon-comment"></i>12</div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                    <header>
                        <h3 class="h6">Categories</h3>
                    </header>
                    <div class="item d-flex justify-content-between"><a href="#">Growth</a><span>12</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Sales</a><span>8</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Tips</a><span>17</span></div>
                    <div class="item d-flex justify-content-between"><a href="#">Local</a><span>25</span></div>
                </div>
                <!-- Widget [Tags Cloud Widget]-->
                <div class="widget tags">
                    <header>
                        <h3 class="h6">Tags</h3>
                    </header>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="tag">#Business</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Technology</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Fashion</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Sports</a></li>
                        <li class="list-inline-item"><a href="#" class="tag">#Economy</a></li>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
        <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>

</html>