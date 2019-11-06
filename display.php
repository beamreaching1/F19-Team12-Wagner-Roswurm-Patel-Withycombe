<?php

//Pseudocode for database connection
$host = "172.31.64.59";
$dbuser = "team12";
$dbpass = "hG827vnymmBh5CVkTSZ3";
$dbname = "team12";

//Establish SQL connection
$connection = new mysqli ($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT * FROM Account";

if(mysqli_connect_error())
{
    echo "A database connection error has occured. 
    Please try again later or contact your system 
    administrator.<br \>\n";

} else {

    $result = $connection->query($sql);
    
}


?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <title>Admin Display</title>
	<link rel="stylesheet" type="text/css" href="display.css">
</head>
<body> 
    <table>
    <tr> 

        <th colspan ="1"> <h2> Account Record </h2> </th>
        <th> id </th>
        <th> creationDate </th>
        <th> firstname </th>
        <th> lastname </th>
        <th> phonenumber </th>
        <th> emailaddress </th>
        <th> username </th>

    </tr>
    
    <?php
    
    while ($row = mysqli_fetch_assoc($result)){

    ?>
    <tr>
        <td> </td>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['creation_date'];  ?> </td>
        <td> <?php echo $row['first_name'];  ?> </td>
        <td> <?php echo $row['last_name'];  ?> </td>
        <td> <?php echo $row['phone_number'];  ?> </td>
        <td> <?php echo $row['email_address'];  ?> </td>
        <td> <?php echo $row['username'];  ?> </td>    
    </tr>

<?php
    } mysqli_close($connection);
?>
    </tr>
    </table>
</body>
</html>
