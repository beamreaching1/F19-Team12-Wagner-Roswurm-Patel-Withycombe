<?php
//Allows any user level user to change thier own info
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
    $id = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'id'));
    $newaddre = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'address'));
    

    //user can change thier home address based off thier id

        $update = " UPDATE Driver SET address = $newaddre WHERE id = $id";

        mysqli_query($connection, $update);

}


mysqli_close($connection);


?>