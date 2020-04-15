<?php 
include('config.php'); 
SessionCheck();
?>
<html>

<head>
    <?php include('links.php'); ?>
    <title> Users </title>


</head>

<body>
    <?php include('header.php'); ?>
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="Dashboard.php"> Dashboard </a>
                </li>
                <li class="breadcrumb-item active">User List</li>
            </ol>
            <!-- Page Content -->
            <h1>User Details</h1>
            <hr>
            <a href="UserAU.php" class="btn btn-primary"> Add New </a>
            <br /><br />
            <?php
        $sql = "SELECT * FROM tblUser";
        if ($result = mysqli_query($link, $sql)) {

        ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>Image</th>
                        <th> Name </th>

                        <th> Email</th>
                        <th> Contact No </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) 
                    {
                    ?>
                    <tr>
                        <td> <?php echo ($row['UserID']); ?> </td>
                        <td class="text-center" width="5%" height="20%">
                            <?php 
                                    $ImgFile = $row["ProfPic"];
                                    $ImgURL = "../UploadedFiles/NoImage.png";
                                    if($ImgFile!="" & file_exists("../UploadedFiles/Users/$ImgFile"))
                                    {
                                        $ImgURL = "../UploadedFiles/Users/$ImgFile";
                                    }
                                    
                                ?>
                            <img src="<?php echo $ImgURL;?>" class="img-fluid">
                        </td>
                        <td>
                            <a href="userprofile.php?id=<?php echo($row['UserID']) ?>" class="btn-link">
                                <?php echo ($row['FullName']); ?>
                            </a>
                        </td>
                        <td> <?php echo ($row['Email']); ?> </td>
                        <td> <?php echo ($row['ContactNo']); ?> </td>
                        <td>
                            <i data="<?php echo $row['UserID'];?>"
                                class="status_checks btn <?php echo ($row['IsActive'])? 'btn-success' : 'btn-danger'?>"><?php echo ($row['IsActive'])? 'Active' : 'Inactive'?></i>

                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        }
        ?>
        </div>
        <?php include('footer.php');?>
    </div>

</body>
<?php include('scripts.php');?>

</html>
<script type="text/javascript">
$(document).on('click', '.status_checks', function() {
    var status = ($(this).hasClass("btn-success")) ? '0' : '1';
    var msg = (status == '0') ? 'Deactivate' : 'Activate';
    if (confirm("Are you sure to " + msg)) {
        var current_element = $(this);
        url = "ajax.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                id: $(current_element).attr('data'),
                status: status
            },
            success: function(data) {
                location.reload();
            }
        });
    }
});
</script>