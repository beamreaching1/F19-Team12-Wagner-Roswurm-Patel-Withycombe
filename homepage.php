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
      <img src="images/d10c2e43ee5892449d29b28526bab4f9.jpg" alt="Image 1">
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

  <!-- Icon Cards-->
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-comments"></i>
          </div>
          <div class="mr-5">Notifications</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="notify.php">
          <span class="float-left">View</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>


    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5">Shopping Cart</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="cart.php">
          <span class="float-left">View</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>


    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-shopping-cart"></i>
          </div>
          <a class="mr-5">Shop on Catalog</a>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="market.php">
          <span class="float-left">View</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>


    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-life-ring"></i>
          </div>
          <div class="mr-5">Profile</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="profile.php">
          <span class="float-left">View</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
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