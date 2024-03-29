<?php
    
?>
<!DOCTYPE html>

<html>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="nav.css">
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

<div id="nav-placeholder">
    
</div>

<div class="container" id="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card bg-light mb-3" id="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-3">
                            <img id="profileImg" name="profileImg" src="/images/bumblebee.jpg">
                        </div>
                        <div class="col-sm-3">
                            <p name="username" id="username">Missing Name</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <h5 class="card-title" id="Name">Heading of Content</h5>
                <p class="card-text">Email</p>
                <p class="card-text">1. Content</p>
                <p class="card-text">Phone Number</p>
                <p class="card-text">2. Content</p>
                <p class="card-text">Address</p>
                <p class="card-text">3. Content</p>
                <p class="card-text">Credits</p>
                <p class="card-text">4. Content</p>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><a style="color: #ffffff; text-decoration: none;" href="edit_acc.php">Edit</a></button>
                </div>
        </div>
    </div>
</div>
</body>

<script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });



</script>

</html>