<html>
<head>
<?php include('links.php');?>
<?php include('config.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.imgcontainer {
  position: relative;
  width: 50%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.imgcontainer:hover .image {
  opacity: 0.3;
}

.imgcontainer:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
    <script>
    $(function() {
        $("#UserPic").change(function() {
            readURL(this);
        });
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                //alert(e.target.result);
                $('#imgUser').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
    <?php include('header.php'); ?>
    <div class="site-section">
        <div class="container">
            <?php
                    SessionCheck();
                    $UserID = $_SESSION["loginID"];
                    $sql = "select * from tbluser where UserID = $UserID";
                    if($result = mysqli_query($link,$sql))
                    {
                        $user = mysqli_fetch_array($result);
                    }
                if(isset($btnSave)){
                    $FileName=$user["ProfPic"];
                    if(!empty($_FILES["UserPic"]["name"]))
                    {
                        $FileName=Date('Ymds').$_FILES["UserPic"]["name"];
                        move_uploaded_file($_FILES["UserPic"]["tmp_name"],"UploadedFiles/Users/$FileName");
                    }
                    $sql = "update tbluser set FullName = '$txtName', AboutUser = '$txtAbout', Area = '$txtArea', ProfPic = '$FileName' where UserID = $UserID";
                    mysqli_query($link,$sql) or die(mysqli_error($link)." -> ".$sql);
                    

                }           
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4 text-center imgcontainer">
                    <img src="UploadedFiles/Users/<?=$user["ProfPic"]?>" class="img-thumbnail image" name="imgUser" id="imgUser" alt="Image Cannot be displayed"/>
                    <input type="file" name="UserPic" id="UserPic" style="visibility: hidden" />
                    <div class="middle">
                    <input type="button" value="Change Image" class="btn btn-secondary" name="btnChange" id="btnChange"/>
                    </div>    
                </div>
                    <div class="col-md-8">
                    <div class="form-group">
                    <label for="txtName">Full Name</label>
                    <input id="txtName" class="form-control" type="text" name="txtName" value="<?=$user["FullName"]?>">
                </div>
                <div class="form-group">
                    <label for="txtAbout">About You</label>
                    <input id="txtAbout" class="form-control" type="text" name="txtAbout" value="<?=$user["AboutUser"]?>">
                </div>
                <div class="form-group">
                    <label for="txtArea">Area</label>
                    <input id="txtArea" class="form-control" type="text" name="txtArea" value="<?=$user["Area"]?>">
                </div>
                <div class="form-group text-center">
                 <input type="submit" value="Save Changes" class="btn btn-secondary" name="btnSave" id="btnSave"/>                        
                </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include('footer.php'); ?>
    </div>
    <script>
$('#btnChange').click(function() {
    $('#UserPic').click();
});

</script>


</body>
<?php include('scripts.php'); ?>
</html>