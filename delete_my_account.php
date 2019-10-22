<?php
//Allows any user level user to delete thier account//
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
 
    

    //user can change thier home address based off thier id

        $update = " DELETE FROM Account WHERE id = $id;";
        $update1 = " DELETE FROM Driver WHERE id = $id;";
        $update2 = " DELETE FROM Sponsor WHERE id = $id;";
        $update3 = " DELETE FROM Admin WHERE id = $id;";

        mysqli_query($connection, $update);
        mysqli_query($connection, $update1);
        mysqli_query($connection, $update2);
        mysqli_query($connection, $update3);
}


mysqli_close($connection);


?>