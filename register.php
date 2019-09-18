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


}









//Generate hash

$options = ['cost' => 10,];

//$salt_hash must be stored in a table that can contain up to 255 chars
$salt_hash = password_hash($pass, PASSWORD_DEFAULT, $options);
//Default cost is 10

//Store salt_hash in database



?>