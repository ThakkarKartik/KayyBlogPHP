<html>

<head>
    <?php include('links.php'); ?>
    <?php 
        include('config.php'); 
        SessionCheck();
        ?>
    <title> Blank Page </title>
</head>

<body>
    <?php include('header.php'); 
 ?>
    <div id="content-wrapper">

        <div class="container-fluid"  style="min-height: 600px">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php"> Home </a>
                </li>
                <li class="breadcrumb-item active">My Blogs</li>
            </ol>
            <!-- Page Content -->
            <?php 
                $sql = "SELECT * FROM tblBlog";
                if ($result = mysqli_query($link, $sql)) 
                {
            ?>
            <div class="card mx-auto mt-2">
                <div class="card-header bg-dark" style="color:#ffffff"> All Blogs </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                    while ($row = mysqli_fetch_array($result)) 
                    {
                    ?>
                        <div class='col-lg-2 border' style="margin:5px; padding:2px">
                            <div class="row">
                                <div class='col-lg-4'>
                                    <img src="../UploadedFiles/BlogImage/<?php echo($row['BlogImage']); ?>" style="border:none" class="img img-thumbnail" />
                                </div>
                                <div class='col-lg-8'>
                                <a href="BlogEdit.php?id=<?php echo($row['BlogID'])?>" class='btn-link'>
                                <h6> <?php echo($row['Title']); ?> </h6></a>
                                
                                <?php 
                                    $uid = $row['UserID'];
                                    $usersql = "select * from tbluser where UserID = $uid";
                                    // echo($usersql);
                                    $userData = mysqli_query($link,$usersql);
                                    $user = mysqli_fetch_array($userData);
                                ?>
                                    <span>By: <a href="userprofile.php?id=<?php echo($user['UserID']); ?>"><?php echo($user['FullName']); ?></a> </span>
                                </div>
                            </div>
                        </div>
                        <?php 
                    } 
                        ?>
                    </div>
                </div>
            </div>
            <?php 
                }
            ?>
            <!-- Page Content Ends Here -->
        </div>
        <?php include('footer.php'); ?>
    </div>
    
</body>
<?php include('scripts.php'); ?>

</html>