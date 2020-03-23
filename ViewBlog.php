<html>
<head>
<?php include('links.php');?>
<?php include('config.php'); ?>
</head>
<body>
    <?php include('header.php'); ?>
    <div class='container'>
    <?php 
    if (isset($_GET["BlogID"])) {
        $BlogID = $_GET["BlogID"];
        $sql = "Select * from tblBlog where BlogID = $BlogID";
        if ($result = mysqli_query($link, $sql)) {
            $Blog = mysqli_fetch_array($result);
        }
    }
    ?>
    <section class='latest-posts'> 
        <h1> <?php echo $Blog['Title']; ?> </h1>
    </section>

    <span> <?php echo $Blog['Content']; ?></span>


    </div>
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>
</html>