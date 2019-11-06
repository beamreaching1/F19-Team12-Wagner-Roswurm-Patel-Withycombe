<?php

session_start();

if($_SESSION['stig'] == "OK"){
	#User is already logged in
	header("Location: /homepage.php");	
}

#Check if the login form was submitted
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

		//Lookup username in db for password hash
		$lookup = "SELECT ash FROM Password_Hash WHERE id IN (SELECT id FROM Account WHERE username='$user')";

		$userresult = $connection->query($lookup);

		$row = mysqli_fetch_assoc($userresult);

		$salt_hash = $row["ash"];
		//echo $salt_hash; //THIS NEEDS TO BE REMOVED AFTER DEBUGGING!!!
		//Generate and compare hash for inputted password

		$success = password_verify($pass, $salt_hash);

		if ($success) {
			$check = "SELECT driver_id FROM Black_List WHERE driver_id = (SELECT id FROM Account WHERE username = '$user')";
			
			if(($connection->query($check)->num_rows) > 0){
				echo "<script type='text/javascript'>document.getElementById(\"blacklist\").style.display = block;</script>";	
			} else {
				$lookup = "SELECT rtype FROM Account WHERE username='$user'";

				$userresult = $connection->query($lookup);
	
				$row = mysqli_fetch_assoc($userresult);
	
				$_SESSION['role']=$row['rtype'];
	
				$_SESSION['stig']="OK";

				$_SESSION['uname']=$user;
				header("Location: /homepage.php");
			}
		} else {
			$message = "Failed to login!";
			echo "<script type='text/javascript'>document.getElementById(\"fail\").style.display = block;</script>";
		}

	}

	mysqli_close($connection);
} else {

}

?>
<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Login Page</title>
       
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
	<body>
		<div class="alert" id="blacklist" style="position: fixed;">
  			<strong>Your account is blacklisted.</strong> If you believe this to be a mistake please contact a system admininstrator at wagnerctw@gmail.com
			  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		</div>
		<div class="alert" id="fail" style="position: fixed;">
  			<strong>Failed to login!</strong>
			  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
		</div>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Sign In</h3>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="user" class="form-control" placeholder="Username" required>
								
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="pass" class="form-control" placeholder="Password" required>
							</div>
							<div class="row align-items-center remember">
								<input type="checkbox">Remember Me
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Login" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Don't have an account? <a href="create.html">Sign Up</a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="forgot.html">Forgot your password? </a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="forgot.html">Forgot your username? </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>