<?php

//Pseudocode for database connection
$host = "172.31.64.59";
$dbuser = "team12";
$dbpass = "hG827vnymmBh5CVkTSZ3";
$dbname = "team12";

//Establish SQL connection
$connection = new mysqli ($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM Driver";

$result = mysqli_query($connection, $sql);

$temp = $row['id'];

if(mysqli_connect_error())
{
    echo "A database connection error has occured. 
    Please try again later or contact your system 
    administrator.<br \>\n";
} else {

echo "<table border = '1'>";
echo "<tr><td>Address</td><td>ID</td><td>Sponsored</td><td>Incident_Count</td><td>Points</td><tr>";

while ($row = mysqli_fetch_assoc($result)){

    echo $temp;
    // echo "<tr><td>{$row['address']}</td><td>{$row['id']}</td><td>{$row['sponsored']}</td><td>{$row['incident_count']}</td><td>{$row['points']}</td><tr>";
}


echo "</table>";  }

?>