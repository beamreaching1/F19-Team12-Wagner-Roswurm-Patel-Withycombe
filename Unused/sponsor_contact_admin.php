<?php
//Allows sponsor level user to see admin email addresses//
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

        $update = "SELECT email_address FROM Account AND FROM Admin WHERE 
         Account.id = Admin.id";

        mysqli_query($connection, $update);

}


mysqli_close($connection);


?>