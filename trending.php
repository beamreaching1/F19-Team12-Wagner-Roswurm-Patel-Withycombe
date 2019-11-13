<?php
#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');		
}
?>
<!DOCTYPE html>

<html>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>

    <div id="nav-placeholder"></div>

</body>

<script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });
</script>

</html>