<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

global $sponsor;

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="/login.php"</script>');
}

if($_SESSION['role'] != "s"){
	header("Location: /homepage.php");
}



if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
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
    administrator.<br\>\n";

} else {

  $tableName = "Item";

  $sql = "SHOW COLUMNS FROM $tableName";
  $res = $connection->query($sql);
  
  while($row = $res->fetch_assoc()){
      $cols[] = $row['Field'];
  }

  $array = $_SESSION['cart'];

  $sql = "SELECT * FROM $tableName WHERE item_id IN (".implode(',', array_map('intval', $array)).")";

  $result = $connection->query($sql);
    
}

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Catalog</title>
	<link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Style css -->
	<link rel="stylesheet" type="text/css" href="market.css">
</head>
<body>

	<div id="nav-placeholder"></div>
	
<div class="container">
	<h1 class="text-center">Catalog Complete</h1>
	<hr>

	<div class="row">
<!-- Product  -->
<?php
	while ($row = mysqli_fetch_assoc($result)){
		echo "<div class=\"col-md-4 product-grid\">"; 
		echo "<div class=\"image\">";
		echo "<a href=\"#\">";
		foreach($cols as $colName){
          if($colName == "item_pic"){
			echo "<img src=\"".$row[$colName]."\" class=\"w-100\">";
			} 
		}

		echo "<div class=\"overlay\">
		<div class=\"detail\">View Details</div>
				</div>
			</a>
		</div>"; 

		foreach($cols as $colName){
		  	if($colName == "item_name"){
				echo "<h5 class=\"text-center\">".$row[$colName]."</h5>";
			}
		}
		
		foreach($cols as $colName){			
			if($colName == "item_cost"){
				echo "<h5 class=\"text-center\">".round($row[$colName]*100)." Points</h5>";
            }
		}
		
		echo "</div>";
    }
    echo "</div>";
    echo "<div class=\"text-center\">
    <hr>
    </div>";
    $array = $_SESSION['cart'];

    $input = $_SESSION(['uname']);

    foreach($array as $item){
        $sql = "INSERT INTO Sponsor_Catalogs(company_id, item_id) VALUES((SELECT company_id FROM Sponsor WHERE id=(SELECT id from Account WHERE username='$input'))),  $item)";
        
        $result = $connection->query($sql);
    }

    $_SESSION['cart'] = array();
    mysqli_close($connection);
?>


</div>

		</div>
    </div>

</body>
    <script>
        $(function(){
        $("#nav-placeholder").load("/nav.php");
        });
    </script>
</html>