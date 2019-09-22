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
    $creation_date = date('m/d/y');

    $check_duplicate = "SELECT username FROM Account WHERE username=$user";
    //Check if query succeeds
    if(mysqli_query($connection, $check_duplicate))
    {
        echo "This username already exists. Please choose another one.";
    } else {
    
    //Generate hash of inputted password
    $options = ['cost' => 10,];
    $salt_hash = password_hash($pass, PASSWORD_DEFAULT, $options);
    //$salt_hash must be stored in a table that can contain up to 255 chars

    //Store user info into db table

    $store = "INSERT INTO Account(creation_date, first_name, last_name, 
    phone_number, email_address, username) VALUES(
        $creation_date , $first_name, $last_name, $phone, $email, $user) 
        AND INSERT INTO Password_Hash(Hash) VALUES(
        $salt_hash)";

    mysqli_query($connection, $store);

    $store2 = "INSERT INTO Admin (id) VALUES ($id)";
    mysqli_query($connection, $store2);


    echo "Account created! Please login now.";
    }

}


mysqli_close($connection);


?>