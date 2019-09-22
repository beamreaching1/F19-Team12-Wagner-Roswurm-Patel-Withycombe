<?php
//Allows admin level user to add 100 points to a drivers account
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
    
    //Capture user variable
    $user = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'user'));

    //SQL query to string conversion//


        $update = "UPDATE Driver SET 
        points = points + 100 WHERE id = (SELECT 
        id FROM Account WHERE username = $user)";

        mysqli_query($connection, $update);

}


mysqli_close($connection);


?>