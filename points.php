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
    filter_input($_POST,'Company Id'));
    
    $update = "UPDATE points SET 
    pointval = (pointval + $pointval) WHERE driver_id = $driver_id AND
    company_id = $companyid";

    mysqli_query($connection, $update);

}

}
mysqli_close($connection);

?>

<!DOCTYPE HTML>
<html>
<body>

<form action="" method="post">
<h2>Driver ID:</h2><br>
<input type="text" name="driver_id" id="driver_id"placeholder="Driver ID" required>
<h2>Company ID:</h2><br>
<input type="text" name="company_id" id="company_id" placeholder="Company ID" required><br>
<h2>Point Amount:</h2><br>
<input type="text" name="pointval" id="pointval" placeholder="Point Value" required><br>
<input type="submit">
</form>

</body>
</html>