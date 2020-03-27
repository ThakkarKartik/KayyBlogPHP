<html>

<head>
    <?php include('links.php'); ?>
    <title> User Profile </title>
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
                    <li class="breadcrumb-item active"> Profile of <?php echo($row['FullName'])?></li>
                </ol>
                <!-- Page Content -->
                <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <?php 
                        $ImageName = "NoImage.png";
                        if ($row['ProfPic'] != null) {
                            $ImageName = 'Users/' + $row["ProfPic"];
                        }
                    ?>
                    <img src='../UploadedFiles/<?php echo($ImageName) ?>' class="img img-thumbnail"/>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="form-group">
                        <label for="txtName"> Full Name :</label>
                        <input type="text" class="form-control" value="<?php echo($row["FullName"]) ?>">
                    </div>
                    <div class="form-group">
                    <label for="txtContactNo"> Contact No :</label>
                        <input type="text" class="form-control" value="<?php echo($row["ContactNo"]) ?>">
                    </div>
                    <div class="form-group">
                    <label for="txtEmail"> E-Mail Address :</label>
                        <input type="text" class="form-control" value="<?php echo($row["Email"]) ?>">
                    </div>
                </div>
                </div>

                <!-- Page Content Ends Here -->

            </div>
        </div>
    <?php
    }
    ?>
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>

</html>