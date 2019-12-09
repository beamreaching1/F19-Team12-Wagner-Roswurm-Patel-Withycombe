<?php

#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');
}

if($_SESSION['role'] != "s" && $_SESSION['role'] != "a"){
	echo('<script>window.location="homepage.php"</script>');
}

//Pseudocode for database connection
$host = "172.31.64.59";
$dbuser = "team12";
$dbpass = "hG827vnymmBh5CVkTSZ3";
$dbname = "team12";

//Establish SQL connection
$connection = new mysqli ($host, $dbuser, $dbpass, $dbname);

if(mysqli_connect_error())
{
    echo "A database connection error has occured. 
    Please try again later or contact your system 
    administrator.<br \>\n";

} else {
  if(!empty($_POST)){
    
    $driver_id = mysqli_real_escape_string($connection, 
    filter_input($_POST,'driver_id'));

    $pointval = mysqli_real_escape_string($connection, 
    filter_input($_POST,'pointval'));

    $companyid = mysqli_real_escape_string($connection, 
    filter_input($_POST,'conpany_id'));

    $update = "UPDATE points SET pointval = (pointval + $pointval) WHERE driver_id = $driver_id AND company_id = $companyid";

    mysqli_query($connection, $update);

}

}
mysqli_close($connection);

?>

<!DOCTYPE HTML>
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
				<h3>Points Manager</h3>
			</div>
			<div class="card-body">
                <form action="" method="post">
                    <h2>Driver ID:</h2><br>
                    <input type="text" name="driver_id" id="driver_id"placeholder="Driver ID" required>
                    <h2>Company ID:</h2><br>
                    <input type="text" name="company_id" id="company_id" placeholder="Company ID" required><br>
                    <h2>Points Amount:</h2><br>
                    <input type="text" name="pointval" id="pointval" placeholder="Point Value" required><br>
                    <input type="submit">
                </form>
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