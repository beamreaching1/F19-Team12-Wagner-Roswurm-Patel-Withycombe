<?php
//Allows admin level user to change other users passwords
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
    $newpass = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass'));
    $newpass2 = mysqli_real_escape_string($connection,
    filter_input(INPUT_POST,'pass2'));

    //Check that the passwords match
    if($newpass == $newpass2)
    {
        //Generate hash of inputted password
        $options = ['cost' => 10,];
        $new_hash = password_hash($newpass, PASSWORD_DEFAULT, $options);

        $update = "UPDATE Password_Hash SET 
        HASH = '$new_hash' WHERE id IN (SELECT 
        id FROM Account WHERE username = '$user')";

        mysqli_query($connection, $update);

    } else {
        echo "The entered passwords do not match. Please
        try again.";
    }
}


mysqli_close($connection);


?>