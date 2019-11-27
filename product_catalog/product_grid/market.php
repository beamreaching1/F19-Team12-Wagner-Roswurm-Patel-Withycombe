<?php

#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');
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
<html>
<head>
	<title>Safe Driving Rewards Catalgue</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Style css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div id="nav-placeholder"></div>
	
	<?php
    $count = 0;
	while ($row = mysqli_fetch_assoc($result)){
        $count++;

    ?>



	<?php echo "<div class=\"col-md-4 product-grid\">"; ?>
		<?php echo "<div class=\"image\">;";
			echo "<a href=\"#\">";?>
        <?php foreach($cols as $colName){
          if($colName == "item_pic"){
            echo "<img src=\"".$row[$colName]."\" class=\"w-100\">";
          }
        
         ?>
	<?php 
			echo "<div class=\"overlay\">
							<div class=\"detail\">View Details</div>
						</div>
					</a>
				</div>"; 
			
			if($colName == "item_name"){
				echo "<h5 class=\"text-center\">".$row[$colName]."</h5>";
			}

			if($colName == "item_cost"){
				echo "<h5 class=\"text-center\">".round($row[$colName]*100)."</h5>";
			}
			echo "<a href=\"#\" class=\"btn buy\">BUY</a>" ;
		}
	}?>
    </tbody>
  </table>
</div>
    


<?php
    mysqli_close($connection);
?>


	<div class="container">
		<h1 class="text-center">Safe Driving Rewards Catalgue</h1>
		<hr>

		<div class="row">
			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="images/apple-watch.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Apple Watch Series 3 Aluminium</h5>
				<h5 class="text-center">Price: 55,000 Points</h5>
				<a href="#" class="btn buy">BUY</a>
			</div>
			<!-- ./Product -->

			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="images/beat.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Beats Solo 3 Wireless</h5>
				<h5 class="text-center">Price: 15,900 Points</h5>
				<a href="#" class="btn buy">BUY</a>
			</div>
			<!-- ./Product -->

			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="images/imac.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Apple iMac</h5>
				<h5 class="text-center">Price: $169,900</h5>
				<a href="#" class="btn buy">BUY</a>
			</div>
			<!-- ./Product -->

			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="images/ipad.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Apple iPad</h5>
				<h5 class="text-center">Price: 41,599 Points</h5>
				<a href="#" class="btn buy">BUY</a>
			</div>
			<!-- ./Product -->

			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="images/iphone.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Apple iPhone X</h5>
				<h5 class="text-center">Price: $134,200 Points </h5>
				<a href="#" class="btn buy">BUY</a>
			</div>
			<!-- ./Product -->

			<!-- Product  -->
			<div class="col-md-4 product-grid">
				<div class="image">
					<a href="#">
						<img src="images/macbook.jpg" class="w-100">
						<div class="overlay">
							<div class="detail">View Details</div>
						</div>
					</a>
				</div>
				<h5 class="text-center">Apple MacBook</h5>
				<h5 class="text-center">Price: 269,900 Points</h5>
				<a href="#" class="btn buy">BUY</a>
			</div>
			<!-- ./Product -->

		</div>

	</div>
</body>

<script>
    $(function(){
      $("#nav-placeholder").load("nav.php");
    });
</script>

</html>