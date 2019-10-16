<?php

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
    //Capture variables, user and pass
    $user = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'user'));
    $pass = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass'));

    //Lookup username in db for password hash
    $lookup = "SELECT ash FROM Password_Hash WHERE id IN (SELECT id FROM Account WHERE username='$user')";

    $userresult = $connection->query($lookup);

    $row = mysqli_fetch_assoc($userresult);

    $salt_hash = $row["ash"];
    //echo $salt_hash; //THIS NEEDS TO BE REMOVED AFTER DEBUGGING!!!
    //Generate and compare hash for inputted password

    $success = password_verify($pass, $salt_hash);

    if ($success) {
        echo "Logging in...";
        header("Location: /homepage.html");
    } else {
        echo "Invalid credentials!";
        header("Location: /login.html");
    }

}

mysqli_close($connection);

?>
