<?php

//Pseudocode for database connection
$host = "172.31.64.59";
$dbuser = "team12";
$dbpass = "hG827vnymmBh5CVkTSZ3";
$dbname = "team12";

//Establish SQL connection
$connection = new mysqli ($host, $dbuser, $dbpass, $dbname);

if(mysqli_connect_error())
{
    echo "A database connection error has occured. 
    Please try again later or contact your system 
    administrator.<br \>\n";

} else {
  if(!empty($_POST)){
    $tableName = mysqli_real_escape_string($connection, $_POST['select']);
  }else {
    $tableName = "Account";
  }
  $sql = "SHOW COLUMNS FROM $tableName";
  $res = $connection->query($sql);
  
  while($row = $res->fetch_assoc()){
      $cols[] = $row['Field'];
  }

  $sql = "SELECT * FROM $tableName";

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
<form action="" method="POST">
  <select name="select" id="select">
    <option value="Account">Account</option>
    <option value="Driver">Driver</option>
    <option value="Item">Item</option>
    <option value="msg">msg</option>
  </select>
  <input type="submit">
</form>
<h3><?php echo $tableName;?></h3>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <?php foreach($cols as $colName){
          echo "<th scope=\"col\">".$colName."</th>";
        } ?>
      </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)){
        $count++;

    ?>
      <?php echo "<tr>"; ?>
        <?php echo "<th scope=\"row\">".$count."</th>"; ?>
        <?php echo "<td>".$row['id']."</td>"; ?>
        <?php echo "<td>".$row['creation_date']."</td>"; ?>
        <?php echo "<td>".$row['first_name']."</td>"; ?>
        <?php echo "<td>".$row['last_name']."</td>"; ?>
        <?php echo "<td>".$row['phone_number']."</td>"; ?>
        <?php echo "<td>".$row['email_address']."</td>"; ?>
        <?php echo "<td>".$row['username']."</td>"; ?>
        <?php echo "<td>".$row['rtype']."</td>"; ?>
    <?php echo "</tr>"; }?>
    </tbody>
  </table>
</div>
    


<?php
    mysqli_close($connection);
?>
    </tr>
    </table>
</body>
</html>
