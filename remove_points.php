<?php
//Allows admin level user to remove points from a driver
//Connect to database
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
    
    //Capture variables
    $user = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'user'));
    $points = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass'));

    //Check if number was entered
    if(is_numeric($points))
    {

        $remove = "UPDATE Driver SET points = 
        points - $points WHERE id = (SELECT id FROM 
        Account WHERE username = $user)";

        mysqli_query($connection, $remove);


    } else {
        echo "Please enter a valid amount of points to remove.";
    }

}

mysqli_close($connection);

?>