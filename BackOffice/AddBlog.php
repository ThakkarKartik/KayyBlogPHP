<html>
<head>
    <?php include('links.php'); ?>
    <?php include('scripts.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    
    </head>

<script>
	tinymce.init({
	  selector: 'textarea#txtContent',  //Change this value according to your HTML
      auto_focus: 'element1',
      plugins: "image media link table",

	});
</script>
    <title> Blank Page </title>
</head>

<body>
    <?php 
    if()
    ?>
    <?php include('header.php'); ?>
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#"> Home </a>
                </li>
                <li class="breadcrumb-item active">Blank PHP Page</li>
            </ol>

            <!-- Page Content -->
            <form method="post">
            <h6 class="alert alert-dark"> Add New Blog 
            <input type="submit" value="Save" class="btn btn-success col-lg-2 offset-1" />
            </h6>
            <div class="form-group">
                <label for="txtTitle"> Title of Blog </label>
                <input type="text" name-='txtTitle' class="form-control" placeholder="Enter Blog Title" required/>
            </div>
            <div class="form-group">
                <label for="txtTags"> Select Tags for Blog (comma seprated) </label>
                <input type="text" name='txtTags' id="txtTags" class="form-control" placeholder="Enter Tags"/>
            </div>
            <textarea name="txtContent" id="txtContent" rows="50" class="form-control"></textarea>
           <br />
                </form>
                <!-- Page Content Ends Here -->
        </div>
    </div>
    <?php //include('footer.php'); 
    ?>
</body>

</html>