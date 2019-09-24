<?php

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

    $check_duplicate = "SELECT username FROM Account WHERE username=$user";
    //Check if query succeeds
    if($connection->query($check_duplicate))
    {
        echo "This username already exists. Please choose another one.";
    } else {
    
    //Generate hash of inputted password
    $options = ['cost' => 10,];
    $salt_hash = password_hash($pass, PASSWORD_DEFAULT, $options);
    //$salt_hash must be stored in a table that can contain up to 255 chars

    //Store user info into db table

    $timestamp = date("Y-m-d H:i:s");

    $store_acc = "INSERT INTO Account(creation_date, first_name, last_name, 
    phone_number, email_address, username) VALUES(
    $timestamp, $first_name, $last_name, $phone, $email, $user)";

    $store_hash = "INSERT INTO Password_Hash(Hash) VALUES($salt_hash)";

    if($connection->query($store_acc)){
        if($connection->query($store_hash)){
            echo "Account created! Please login now.";
        } else {
            echo "Error: ". $store_hash ."
            ". $connection->error;
        }
    } else {
        echo "Error: ". $store_acc ."
        ". $connection->error;
    }

    }
    mysqli_close($connection);
}

?>