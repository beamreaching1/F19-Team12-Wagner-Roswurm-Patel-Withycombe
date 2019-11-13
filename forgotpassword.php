<?php
#Check if the user is logged in (Put this php code in all of your documents that require login)
session_start();

if($_SESSION['stig'] != "OK"){
	#go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	echo('<script>window.location="login.php"</script>');
}
if($_SESSION['role'] != "a"){
	echo('<script>window.location="homepage.php"</script>');
}

if(isset($_POST['submit'])){
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
		//Capture variables, user and pass
		$user = mysqli_real_escape_string($connection, $_POST['user']);
		$pass = mysqli_real_escape_string($connection, $_POST['pass']);

		$message = $user . $pass;
				echo "<script type='text/javascript'>alert('$message');</script>";

		//Generate hash of inputted password
		$options = ['cost' => 10,];
		$salt_hash = password_hash($pass, PASSWORD_DEFAULT, $options);
		//Lookup username in db for password hash
		$lookup = "UPDATE Password_Hash SET ash = '$salt_hash' WHERE id = (SELECT id FROM Account WHERE username='$user')";

		$result = $connection->query($lookup);

		}
	}

	mysqli_close($connection);

?>

<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Password Reset</title>
       
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="forgotpassword.css">
</head>
<body>
<div id="nav-placeholder"></div>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Password Reset</h3>
			</div>
			<div class="card-body">
				<form action="" method="POST">
                    <h5 style="color: aliceblue">Username</h5>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" id="user" name="user" class="form-control" placeholder="Username" required>
						
                    </div>
                    <h5 style="color: aliceblue">New Password</h5>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="pass" name="pass" class="form-control" placeholder="New Password" required>
                    </div>
                    <h5 style="color: aliceblue">New Password</h5>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pass2" id="pass2" class="form-control" placeholder="New Password" required>
                    </div>
                  
					<div class="form-group">
						<input type="submit" name="submit" value="Change" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<script>
    $(function(){
      $("#nav-placeholder").load("nav.html");
    });
</script>
</html>