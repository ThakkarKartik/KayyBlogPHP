<html>
<head>
<?php 
include('links.php');
include('config.php');
?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
    <?php include('header.php'); ?>
    <div class="site-section">
    <div class='container'>
    <div class="row">
    <div class="col-lg-6">
        <h5> Feel Free to give any Suggestion or Query anything  </h5>
        <?php
            if (isset($btnSave)) {
                $sql = "insert into tblcontactus(Name,Email,Query,CreatedOn) values('$txtName','$txtEmail','txtQuery',now())";
                mysqli_query($link, $sql) or die(mysqli_error($link)."=>".$sql);
            }
        ?>
         <form method="post">
            <div class="form-group mt-5">
                <label for="txtName"> Name :</label>
                <input type="text" name="txtName" id="txtName" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="txtEmail"> E-Mail :</label>
                <input type="text" name="txtEmail" id="txtEmail" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="txtName"> Your Query :</label>
                <textarea name="txtQuery" id="txtQuery" class="form-control" rows="5" required></textarea>
            </div>
            <input type="submit" id="btnSave" name="btnSave" value="Send Query" class="btn btn-secondary"/>
        </form>
    </div>
    <div class="col-lg-6">
    <div class="widget latest-posts">
            <header>
                <h3 class="h2">About Us</h3>
            </header>
            <p class="text-big" style="text-align: justify">
            Auctor.in is a free service for self-expression. This platform helps people to discover and enjoy new ideas of sharing information and privilege of language. It rises the opportunity of various information. However, in place to motivate, we have to manage abuses that threaten. Our Capability to deliver this facility and inspires the freedom of expression. Consequence, whatever the content published on the Auctor.in, must have to follow some privacy rules. The restrictions follow with legal requirements.
If you come up against some blog and you believe that it breaks Auctor.in privacy or policies, please report it to us on report@Auctor.in. If the link is hidden by blogger (publisher), you can still report abuse via specified mail ID support@auctor.in. 
            </p>
    </div>
    <br>
    <br>
    
    </div>
    </div>
    </div>
    
    <?php include('footer.php'); ?>
    </div>    
</div>
</body>
<?php include('scripts.php'); ?>
</html>