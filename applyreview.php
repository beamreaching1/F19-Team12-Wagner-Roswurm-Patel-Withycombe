<?php

#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="/login.php"</script>');
}

if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

if(isset($_GET['item'])){
	$_SESSION['cart'] = array_diff($_SESSION['cart'], array($_GET['item']));
	unset($_GET['item']);
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

  $tableName = "Company";

  $sql = "SHOW COLUMNS FROM $tableName";
  $res = $connection->query($sql);
  
  while($row = $res->fetch_assoc()){
      $cols[] = $row['Field'];
  }

  $array = $_SESSION['cart'];

  $sql = "SELECT * FROM $tableName WHERE company_id IN (".implode(',', array_map('intval', $array)).")";

  $result = $connection->query($sql);
    
}


?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<title>Review Sponsors</title>
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
	<h1 class="text-center">Review Sponsors</h1>
	<hr>

	<div class="row">
<!-- Product  -->
<?php
	while ($row = mysqli_fetch_assoc($result)){
		echo "<div class=\"col-md-4 product-grid\">"; 

		foreach($cols as $colName){
		  	if($colName == "company_name"){
				echo "<h5 class=\"text-center\">".$row[$colName]."</h5>";
			}
		}

		foreach($cols as $colName){			
			if($colName == "company_id"){
				echo "<a href=\"applyreview.php?item=".$row[$colName]."\" class=\"btn buy\">Remove</a>" ;
			}
		}
		
		echo "</div>";
	}
    mysqli_close($connection);
?>
		</div>

</div>
	<hr>
	<div class="text-center">
	<button type="button" class="btn btn-primary"><a style="color: #ffffff; text-decoration: none;" href="applied.php">Send Request</a></button>
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