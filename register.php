<?php

//Pseudocode for database connection
$host = "172.31.0.0/16";
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
    $pass = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass'));
    $pass2 = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass2'));
    $first_name = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'fname'));
    $last_name = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'lname'));
    $phone = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'phone'));
    $email = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'email'));

    //Generate hash of inputted password
    $options = ['cost' => 10,];
    $salt_hash = password_hash($pass, PASSWORD_DEFAULT, $options);
    //$salt_hash must be stored in a table that can contain up to 255 chars

    //Store user info into db table

}

?>