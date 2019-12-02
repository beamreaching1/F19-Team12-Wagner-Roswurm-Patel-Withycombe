<?php

session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');		
}

if($_SESSION['role'] != "a"){
	echo('<script>window.location="homepage.php"</script>');
}

if(isset($_POST['submit'])){


//Allows admin level user to add points to a drivers account
//Connect to database
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
    
    //THIS VERSION USES PHP TO GET INPUT
    //Capture user variable
    $driver_id = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'Driver Id'));

    $pointval = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'Point Value'));

    $companyid = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'Company Id'));
    

    /*THIS VERSION IS CONNECTED TO A SEPERATE HTML FORM TO COLLECT INPUT//
    $driver_id = echo $_POST["driver_id"];
    $pointval = echo $_GET["pointval"];
    $company_id = echo $_GET["compamy_id"];
    ID WHAT WOULD WORK BETTER BUT THE UNCOMMENTED ONE USES AN HTML VIEW*/





    //edits point table to add desrived point amount to desired user//

        $update = "UPDATE points SET 
        pointval = (pointval + $pointval) WHERE driver_id = $driver_id AND
        company_id = $companyid";

        mysqli_query($connection, $update);

}


mysqli_close($connection);

?>

