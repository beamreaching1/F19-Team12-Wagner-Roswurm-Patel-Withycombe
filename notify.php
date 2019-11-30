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
    <title>Notifications</title>
	<link rel="stylesheet" type="text/css" href="notify.css">
  <link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>

<div id="nav-placeholder"></div>



<div class="text-center">
<div class="container h-100" style="justify-content: center;">
<br>
<?php
  //Pseudocode for database connection
$host = "172.31.64.59";
$dbuser = "team12";
$dbpass = "hG827vnymmBh5CVkTSZ3";
$dbname = "team12";

//Establish SQL connection
$connection = new mysqli($host,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error())
{
  echo "A database connection error has occured. 
  Please try again later or contact your system 
  administrator.<br \>\n";
} else {
  //Capture variables, user and pass
  $user = mysqli_real_escape_string($connection, $_SESSION['uname']);

  //Lookup username in db for password hash
  $lookup = "SELECT notice FROM msg WHERE username='$user'";

  $result = $connection->query($lookup);

  while($row=mysqli_fetch_row($result)){
    $message = $row[0];
    echo "
    <div class=\"row align-items-center h-100\" style=\"justify-content: center;\">
        <div class=\"col-xl-auto\">
            <div class=\"card text-white bg-secondary o-hidden h-100\">
                <div class=\"card-body\">
                    <div class=\"card-body-icon\">
                        <i class=\"fas fa-fw fa-shopping-cart\"></i>
                    </div>
                    <a>".$message."</a>
                </div>
            </div>
        </div>
    </div><br>";
  }
}

mysqli_close($connection);
?>
</div>
</div>
</body>

<script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });
</script>

</html>