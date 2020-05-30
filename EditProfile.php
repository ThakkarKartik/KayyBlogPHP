<html>
<head>
<?php include('links.php');?>
<?php include('config.php');?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">
    <?php include('header.php'); ?>
    <div class="site-section">
        <div class="container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="txtName">Full Name</label>
                    <input id="txtName" class="form-control" type="text" name="txtName">
                </div>
                <div class="form-group">
                    <label for="txtAbout">About You</label>
                    <input id="txtAbout" class="form-control" type="text" name="txtAbout">
                </div>
                
            </form>
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
</body>
<?php include('scripts.php'); ?>
</html>