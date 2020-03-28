<html>

<head>
    <?php include('links.php'); ?>
    <title> User Profile </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <script>
	tinymce.init({
	  selector: 'textarea#txtContent',  //Change this value according to your HTML
      auto_focus: 'element1',
      plugins: "image media link table",

	});
</script>

</head>

<body>
    <?php include('config.php'); ?>
    <?php include('header.php'); ?>
    <?php
    SessionCheck();
    $UserID = $_SESSION["UserID"];
    $sql = "select * from tblUser where UserID = $UserID";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_array($result);
    ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="Users.php"> Home </a>
                    </li>
                    <li class="breadcrumb-item active"> Profile of <?php echo ($row['FullName']) ?></li>
                </ol>
                <!-- Page Content -->
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <?php
                            $ImageName = "NoImage.png";
                            if ($row['ProfPic'] != null) {
                                $ImageName = 'Users/' + $row["ProfPic"];
                            }
                            ?>
                            <img src='../UploadedFiles/<?php echo ($ImageName) ?>' id="imgUser" name="imgUser" class="img img-thumbnail" />
                            <input type="file" name="UserPic" id="UserPic" style="visibility: hidden" />
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="form-group">
                                <label for="txtName"> Full Name :</label>
                                <input type="text" class="form-control" value="<?php echo ($row["FullName"]) ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtContactNo"> Contact No :</label>
                                <input type="text" class="form-control" value="<?php echo ($row["ContactNo"]) ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtEmail"> E-Mail Address :</label>
                                <input type="text" class="form-control" value="<?php echo ($row["Email"]) ?>">
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-sm-12">
                        <textarea name="txtContent" id="txtContent" class="form-control"></textarea>
                        </div>
                        <div class="container">
                            <br/>
                            <input type="submit" class="btn btn-primary offset-5" value="Save Changes"/>
                        </div>
                    </div>
                </form>
                <!-- Page Content Ends Here -->
            </div>
        </div>
    <?php
    }
    ?>
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>
<script>
    $('#imgUser').click(function() {
        $('#UserPic').click();
    });
    $('#UserPic').change(function() {
        //$('#UserPic').click();
        alert("Image Chnaged");
    });
</script>

</html>