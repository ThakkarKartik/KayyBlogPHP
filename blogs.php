<html>
<head>
<?php include('links.php');?>
<?php include('config.php');?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <?php include('header.php'); ?>
        <div class="site-section py-0">
            <form action="Blogs.php" method="post">
            <input type="search" name="btnSearch" id="btnSearch" class="form-control">
            </form> 
        </div>
    </div>  
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>
</html>