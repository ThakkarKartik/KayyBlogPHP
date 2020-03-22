<?php include("header.php"); ?>
<?php require_once("config.php"); ?>
<div class="container">
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </div>
        <form id="frmAdmin" action="insertUser.php" method="GET" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="txtFName"> Full Name :</label>
                        <input type="text" class="form-control col-10" name="txtFName" placeholder="Enter User Name" />
                    </div>

                    <div class="form-group">
                        <label for="txtEmail"> E-Mail :</label>
                        <input type="text" class="form-control col-10" name="txtEmail" placeholder="E-Mail Address" />
                    </div>
                    <div class="form-group">
                        <label for="txtContactNo"> Contact No :</label>
                        <input type="text" class="form-control col-10" name="txtContactNo" placeholder="Contact Number" />
                    </div>
                    <div class="form-group">
                        <label for="txtPassword"> Password :</label>
                        <input type="text" class="form-control col-10" name="txtPassword" placeholder="Password" />
                    </div>
                    <input type="submit" class="btn btn-success" value="Insert User" />
                </div>
                <div class="col-6">
                        <img src="images/NoImg.png" class="rounded-circle" height="100px" width="100px" />
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="txtFile" />
                        </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
<?php include("footer.php"); ?>