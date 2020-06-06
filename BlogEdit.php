<html>
<head>
    <?php include('links.php'); ?>
    <?php include('config.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="BackOffice/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: 'textarea#txtContent', //Change this value according to your HTML
        auto_focus: 'element1',
        plugins: "image media link table code",
        toolbar: 'undo redo | image code',
        images_upload_url: 'upload.php',
        images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', 'upload.php');
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },

    });
    </script>
    <script>
    $(document).ready(function() {
        AddTag();
    });

    function AddTag() {
        var BlogId = document.getElementById('hdnBlogID').value;
        var TagName = document.getElementById('txtTag').value;
        $.ajax({
            url: "tag_ins.php",
            type: "POST",
            data: {
                BlogID: BlogId,
                Name: TagName
            },
            cache: false,
            success: function(result) {
                //alert(result);
                if (result != null) {
                    $('#tags').html(result);
                }
            },
            error: function(result) {
                alert(result);
            },
        });
    }

    function DelTag(id) {
        var BlogId = document.getElementById('hdnBlogID').value;
        $.ajax({
            url: "tag_del.php",
            type: "POST",
            data: {
                TagID: id,
                BlogID: BlogId
            },
            cache: false,
            success: function(result) {
                //alert(result);
                if (result != null) {
                    $('#tags').html(result);
                }
            },
            error: function(result) {
                alert(result);
            },
        });
    }
    </script>
    <title> Edit Blog </title>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <?php 
    if(isset($btnSave))
    {
        $FileName="";
        if(!empty($_FILES["txtBlogImage"]["name"]))
        {
            $FileName=Date('Ymds').$_FILES["txtBlogImage"]["name"];
            move_uploaded_file($_FILES["txtBlogImage"]["tmp_name"],"UploadedFiles/BlogImage/$FileName");
        }
        $Content = addslashes($_REQUEST['txtContent']) or die($Content);
        $BlogID = $_GET['id'];
        if($FileName == "")
        {
            $sql = "update tblBlog set AboutBlog = '$txtAbout', Subject = '$txtSubject', Title = '$txtTitle', Content = '$Content', ModifiedOn = now() where BlogID = $BlogID";
        }
        else
        {
            $sql = "update tblBlog set AboutBlog = '$txtAbout', Subject = '$txtSubject', Title = '$txtTitle', Content = '$Content', ModifiedOn = now(), BlogImage='$FileName' where BlogID = $BlogID";
        }
        mysqli_query($link,$sql) or die(mysqli_error($link)); 
        //header('location:Blogs.php');
    }
    else if(isset($btnPublish))
    {
        $FileName="";
        if(!empty($_FILES["txtBlogImage"]["name"]))
        {
            $FileName=Date('Ymds').$_FILES["txtBlogImage"]["name"];
            move_uploaded_file($_FILES["txtBlogImage"]["tmp_name"],"../UploadedFiles/BlogImage/$FileName");
        }
        $Content = addslashes($_REQUEST['txtContent']) or die($Content);
        $BlogID = $_GET['id'];
        if($FileName == "")
        {
            $sql = "update tblBlog set AboutBlog = '$txtAbout',  Subject = '$txtSubject', Title = '$txtTitle', Content = '$Content', ModifiedOn = now(), Published = 1 where BlogID = $BlogID";
        }
        else
        {
            $sql = "update tblBlog set AboutBlog = '$txtAbout',  Subject = '$txtSubject', Title = '$txtTitle', Content = '$Content', ModifiedOn = now(), BlogImage='$FileName', Published = 1 where BlogID = $BlogID";
        }
        mysqli_query($link,$sql) or die(mysqli_error($link)); 
        header('location:Blogs.php');
    }
    else if(isset($btnRemove))
    {
        $BlogID = $_GET['id'];
            $sql = "update tblBlog set IsActive = 0 where BlogID= $BlogID";
            mysqli_query($link,$sql) or die(mysqli_error($link).$sql); 
            header('location:loginProfile.php');
    }
?>
    
    <?php include('header.php'); ?>
    <?php 
            SessionCheck();
            $bid = $_GET['id'];
            $sql = "select * from tblBlog where BlogID = $bid";
            $blog = mysqli_fetch_array(mysqli_query($link,$sql)) or die(mysqli_error($link));
        ?>
    <div class="site-wrap">
    <div class="site-section">
        <div class="container">
            

            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <?php 
                        $title = $blog['Title']; 
                        $Subject = $blog['Subject'];
                        $About = $blog['AboutBlog'];
                        $BlogImage  = $blog['BlogImage'];
                        ?>
                        <div class="form-group mt-3">
                            <label for="txtTitle" class="col-form-label"> Title : </label>
                            <input type="text" class="form-control" name="txtTitle"
                                value="<?php echo($title)?>" required>
                        </div>

                        <div class="form-group">
                            <label for="txtSubject" class="col-form-label"> Subject : </label>
                            <input type="text" class="form-control" name="txtSubject" value="<?php echo($Subject)?>" placeholder="Subject or Area"  required/>
                        </div>
                        <div class="form-group mt-3">
                            <label for="txtAbout" class="col-form-label"> About Blog: </label>
                            <textarea name="txtAbout" id="txtAbout" rows="5" class="form-control"  required>
                            <?=$About?>
                            </textarea>
                        </div>
                        
                    </div>
                    <div class="col-4 mt-2">
                            <img src="UploadedFiles/BlogImage/<?php echo($BlogImage) ?>" class="img img-thumbnail" id="BlogImage" name="BlogImage"/> 
                            <input type="hidden" id="hdnBlogID" value="<?php echo($blog['BlogID'])?>">
                        <br />
                        <div class="form-group mt-3">
                            <label for="txtBlogImage" class="col-form-label"> Blog Image : </label>
                            <input type="file" class="form-control-file border" name="txtBlogImage" accept="image/*" onchange="preview_image(event)" />
                        </div>
                    </div>
                </div>
                <br />
                <textarea id="txtContent" name="txtContent" rows=50>
                          <?php 
                            echo(stripslashes($blog["Content"])); 
                          ?>
                        </textarea>
                <br />
                <br />
                <center>
                <input type="submit" id="btnSave" name="btnSave" value="Save Changes"
                    class="btn btn-primary col-lg-3 mt-3" />
                    <input type="submit" id="btnPublish" name="btnPublish" value="Save & Publish"
                    class="btn btn-primary col-lg-3 mt-3" />
                    <input type="submit" id="btnRemove" name="btnRemove" value="Remove this Blog"
                    class="btn btn-danger col-lg-3 mt-3" formnovalidate />
                    
                    </center>
            </form>
            <div class="card mx-auto mt-2">
                <div class="card-header">
                    <form method="post" action="tag_ins.php">
                        <div class="input-group">
                            <input type="text" class="form-control col-lg-2" name="txtTag" id="txtTag"
                                placeholder="Enter New Tag">
                            <div class="input-group-append">
                                <input type="button" class="btn btn-secondary" value="Add Tag" onclick="AddTag();" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row" id="tags">

                    </div>

                </div>

            </div>
            <?php include('footer.php');?>
</body>
<?php include('scripts.php');?>
<script>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('BlogImage');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
</html>