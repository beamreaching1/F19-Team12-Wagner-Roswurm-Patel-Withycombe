<?php
//Allows an admin to see sponsored drivers based by company 
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
    $user = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'user'));
    $company = mysqli_real_escape_string($connection, 
    filter_input(INPUT_POST,'company id'));




    //SQL query to string conversion//

        $update = "SELECT * FROM Sponsor_list WHERE 
        company_id = $company";

        mysqli_query($connection, $update);

}


mysqli_close($connection);

?>