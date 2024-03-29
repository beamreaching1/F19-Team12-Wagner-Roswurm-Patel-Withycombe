<?php

#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');
}
if($_SESSION['role'] != "a" && $_SESSION['role'] != "s"){
	echo('<script>window.location="homepage.php"</script>');
}

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
<div id="nav-placeholder"></div>
<form action="" method="POST">
  <select name="select" id="select">
    <option value="Account">Account</option>
    <option value="Item">Item</option>
    <option value="msg">Messages</option>
    <option value="Black_List">Blacklist</option>
    <option value="points">Points</option>
    <option value="Company">Company</option>
    <option value="Sponsor">Sponsor</option>
    <option value="Sponsor_List">Sponsor List</option>

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
        <?php foreach($cols as $colName){
          if($colName == "item_pic"){
            echo "<td><img src=\"".$row[$colName]."\"></td>";
          }else {
            echo "<td>".$row[$colName]."</td>";
          }
        }
         ?>
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
<script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });
</script>
</html>
