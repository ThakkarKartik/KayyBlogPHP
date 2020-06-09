<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        $updateView = "update tblblog set TotalViews = (TotalViews + 1) where BlogID = $BlogID";
        mysqli_query($link,$updateView);
        $sql = "Select * from tblblog b, tbluser u where b.UserID = u.UserID and BlogID = $BlogID";
        if ($result = mysqli_query($link, $sql)) {
            $Blog = mysqli_fetch_array($result);
        }
    }
    ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 single-content">
                <h1 class="mb-4">
                        <?=$Blog["Title"]?>
                    </h1>
                
                    <div class="post-meta d-flex mb-5">
                        <div class="bio-pic mr-3">
                            <img src="UploadedFiles/Users/<?=$Blog["ProfPic"]?>" alt="Image" class="img-fluid circular">
                        </div>
                        <div class="vcard">
                            <span class="d-block"><a href="userprofile.php?id=<?=$Blog["UserID"]?>"><?=$Blog["FullName"]?></a> in <a
                                    href="#"><?=$Blog["Area"]?></a></span>
                            <span class="date-read"><?=$Blog["CreatedON"]?> <span class="mx-1">&bullet;</span>
                                <?=$Blog["TotalViews"]?> <span class="icon-star2"></span></span>
                        </div>
                    </div>
                    <p class="mb-5">
                        <img src="UploadedFiles/BlogImage/<?=$Blog["BlogImage"]?>" alt="Image" class="img-fluid">
                    </p>
                    <?php 
                    echo(stripcslashes($Blog["Content"]));
            ?>
                </div>
                <div class="col-lg-3 ml-auto">
                    <div class="section-title">
                        <h2> More From Author</h2>
                    </div>
                        <?php 
                            if (isset($_GET["BlogID"])) {
                                $BlogID = $_GET["BlogID"];
                                $UserID = $Blog["UserID"];
                                $sql = "Select * from tblblog where UserID = $UserID and BlogID <> $BlogID limit 3";
                                if ($result = mysqli_query($link, $sql)) {
                                    $cnt = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $cnt++;
                                        ?>
                                                <div class="trend-entry d-flex">
                                                <div class="number align-self-start"><?=$cnt?></div>
                                                <div class="trend-contents">
                                                    <h2><a href="ViewBlog.php?BlogID=<?=$row["BlogID"]?>"><?=$row["Title"]?></a></h2>
                                                    <div class="post-meta">
                                                    <span class="date-read"><?=$row["CreatedON"]?><span class="mx-1">&bullet;</span> <?=$row["TotalViews"]?> <span class="icon-star2"></span></span>
                                                    </div>
                                                </div>
                                                </div>
                        <?php
                                    }
                                }
                            }
                        ?>
                    <div class="section-title">
                        <h2>Tags</h2>
                    </div>
                        <?php 
                            if (isset($_GET["BlogID"])) {
                                $BlogID = $_GET["BlogID"];
                                $sql = "Select * from tbltag where BlogID = $BlogID";
                                if ($result = mysqli_query($link, $sql)) {
                                    while($row = mysqli_fetch_array($result)){
                                      ?>
                                            <a class="btn btn-info m-1" href="TagSearch.php?TagID=<?= $BlogID?>"> #<?=$row["TagName"]?></a>
                                            <?php
                                    }
                                }
                            }
                        ?>
                </div>

            </div>
        </div>
        <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>

</html>