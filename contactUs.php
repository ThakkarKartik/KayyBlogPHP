<html>
<head>
<?php include('links.php');?>
</head>
<body>
    <?php include('header.php'); ?>
    <div class='container'>
        <div class="row">
            <div class="col-lg-6">
    <section class='latest-posts'> 
        <h3 style="color:blue"> Feel Free to give any Suggestion or Query anything  </h3>
         <form method="post">
            <div class="form-group mt-5">
                <label for="txtName"> Name :</label>
                <input type="text" name="txtName" id="txtName" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="txtEmail"> E-Mail :</label>
                <input type="text" name="txtEmail" id="txtEmail" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="txtName"> Your Query :</label>
                <textarea name="txtName" id="txtName" class="form-control" rows="5"></textarea>
            </div>
            <input type="submit" value="Send Query" class="btn btn-secondary"/>
        </form>
    </section>
    </div>
    <div class="col-lg-6">
        <section>
    <div class="widget latest-posts">
            <header>
                <h3 class="h4">About Us</h3>
            </header>
            
    </div>
    </section>
    </div>
    </div>
    </div>
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>
</html>