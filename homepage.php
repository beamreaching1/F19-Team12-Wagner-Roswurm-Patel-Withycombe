<?php
#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();
if(!isset($_SESSION['sig']))
{
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

<div id="nav-placeholder">
    
</div>

<div id="carousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/background.jpg" alt="Image 1">
    </div>
    <div class="carousel-item">
      <img src="images/stack-of-coins.jpg" alt="Image 2">
      <div class="carousel-caption">
        <h3 style="-webkit-text-stroke: 1px black;">Buy Buy Buy</h3>
        <p style=" font-weight: bold; font-size: 1rem; -webkit-text-stroke: 1px black;">Now Accepting BitCoins</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/optimus.jpg" alt="Image 3">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#carousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#carousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

</body>

<script>
    $(function(){
      $("#nav-placeholder").load("nav.html");
    });
</script>

</html>