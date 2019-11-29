<?php
#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');		
}

if($_SESSION['role'] != "a"){
	echo('<script>window.location="homepage.php"</script>');
}
?>
<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Admin Suite
	</title>
       
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="adminsuite.css">
</head>
<body>
<div id="nav-placeholder"></div>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Admin Suite</h3>
			</div>
			<div class="card-body">
				<a href="display.php">System Information</a>
				<a href="banuser.php">Ban a User</a>
				<a href="forgotpassword.php">Reset a Password</a>
			</div>
		</div>
	</div>
</div>
</body>
<script>
    $(function(){
      $("#nav-placeholder").load("nav.html");
    });
</script>
</html>