<?php

//Pseudocode for database connection
$host = "";
$dbuser = "";
$dbpass = "";
$dbname = "";

//Establish SQL connection
$connection = new mysqli($host,$dbuser,$dbpass,$dbname);

if(mysqli_connect_error())
{
    echo "A database connection error has occured. 
    Please try again later or contact your system 
    administrator.<br \>\n";
} else {
    //Capture variables, user and pass
    $user = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'user'));
    $pass = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass'));

    //Lookup username in db for password hash

    $salt_hash = ;

    //Generate and compare hash for inputted password

    $success = password_verify($pass, $salt_hash);

    if ($success) {
        echo "Logging in...\n"
    } else {
        echo "Invalid credentials!\n"
    }


}


?>
