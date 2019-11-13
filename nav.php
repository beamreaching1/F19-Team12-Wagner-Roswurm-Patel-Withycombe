<nav id="brand" class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="col-xs-4 navbar-brand" href="homepage.php" style="margin-right: 0px;">Team12</a>  
  <div class="nav-item active col-xs-4">
    <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
  </div>
  <div class="nav-item col-xs-4">
    <a class="nav-link" href="#">Shop</a>
  </div>

  <ul class="col-xs-4 navbar-nav ml-auto">
      <li><div class="nav-item">
        <a class="nav-link" href="account.html">Account</a>
      </div></li>
      <li><div class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </div></li>
      <li><div class="nav-item">
        <a class="nav-link" id="trend" href="<?php if($_SESSION['role'] == "a"){echo "suite.php";}else{echo "trending.php";}?>">Link</a>
      </div></li>
  </ul>
</nav>
