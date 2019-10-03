<?php
//Allows sponsor level user to add see drivers they sponsor
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

    $driver_id = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'driver id'));


    //SQL query to string conversion//

        $update = "UPDATE Driver
        SET sponsored = 1;
        WHERE id = $driver_id ";

        mysqli_query($connection, $update);

}


mysqli_close($connection);


?>