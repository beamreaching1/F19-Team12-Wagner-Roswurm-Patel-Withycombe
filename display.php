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
<h3>Table Name</h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Creation</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Phone #</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)){
        $count++;
    ?>
      <tr>
        <th scope="row"><?php echo $count; ?></th>
        <td> </td>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['creation_date'];  ?> </td>
        <td> <?php echo $row['first_name'];  ?> </td>
        <td> <?php echo $row['last_name'];  ?> </td>
        <td> <?php echo $row['phone_number'];  ?> </td>
        <td> <?php echo $row['email_address'];  ?> </td>
        <td> <?php echo $row['username'];  ?> </td>    
    </tr>
    </tbody>
  </table>
</div>
    


<?php
    } mysqli_close($connection);
?>
    </tr>
    </table>
</body>
</html>
