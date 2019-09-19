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
    $lookup = "SELECT Hash FROM Password_Hash
    WHERE id IN (SELECT id FROM Account WHERE 
    username=$user);

    $userresult = mysqli_query($connection, $lookup);

    $row = mysqli_fetch_assoc($userresult);

    $salt_hash = $row["Hash"];

    //Generate and compare hash for inputted password

    $success = password_verify($pass, $salt_hash);

    if ($success) {
        echo "Logging in...";
    } else {
        echo "Invalid credentials!";
    }

}


?>