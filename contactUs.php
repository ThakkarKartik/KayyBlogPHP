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
        <h5> Feel Free to give any Suggestion or Query anything  </h5>
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
    <div class="widget latest-posts">
            <header>
                <h3 class="h2">About Us</h3>
            </header>
            <p class="text-big" style="text-align: justify">
                KayyBlog.com is a Blogging Website Designed for Personal use for the writters and Authors who want to publish their work for free for the readers arround the world. Readers will find any kind of Blog on kayyBlog, like Stories, Articles, Recepies, Poems, Technical Lessions, Notes, etc. 
                This Blog is not made for any commercial use Publish or Marketing. </p>
                <hr/>
                <p class="text-big" style="text-align: justify">
                Website is not responsible for any misleading or harmfull Content as it is posted by different Authors around the World.accessibility-issue--error
                </p><hr/><p class="text-big" style="text-align: justify">
                KayyBlog is developed for Reading, Learning and Entertaintment purpose. 
                <hr></p>
            </p>
    </div>
    </div>
    </div>
    </div>
    <?php include('footer.php'); ?>
</body>
<?php include('scripts.php'); ?>
</html>