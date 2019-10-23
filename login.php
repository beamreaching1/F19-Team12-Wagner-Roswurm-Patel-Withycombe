<?php

session_start();

if($_SESSION['sig'])
{
	#User is already logged in
	header("Location: /homepage.php");	
}

#Check if the login form was submitted
if(isset($_REQUEST['submit']))
{
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
    $user = mysqli_real_escape_string($connection, $_REQUEST['user']);
    $pass = mysqli_real_escape_string($connection, $_REQUEST['pass']);

    //Lookup username in db for password hash
    $lookup = "SELECT ash FROM Password_Hash WHERE id IN (SELECT id FROM Account WHERE username='$user')";

    $userresult = $connection->query($lookup);

    $row = mysqli_fetch_assoc($userresult);

    $salt_hash = $row["ash"];
    //echo $salt_hash; //THIS NEEDS TO BE REMOVED AFTER DEBUGGING!!!
    //Generate and compare hash for inputted password

    $success = password_verify($pass, $salt_hash);

    if ($success) {
		$_SESSION['sig']="OK";
        header("Location: /homepage.php");
    } else {
		echo("<script type='text/javascript'>alert(\"Failed to login!\");</script>");
	}

}

mysqli_close($connection);
}

?>
<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Login Page</title>
       
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Sign In</h3>
					</div>
					<div class="card-body">
						<form action="login.php" method="POST">
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
								<input type="submit" value="Login" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Don't have an account? <a href="create.html">Sign Up</a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="forgotpassword.html">Forgot your password? </a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="forgotusername.html">Forgot your username? </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>