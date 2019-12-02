<?php

    #Check if the user is logged in (Put this php code in all of your documents that require login)
    session_start();

    if($_SESSION['stig'] != "OK"){
	    #go to the login page if sig doesn't exist in the SESSION array (i.e. the user is not logged in)
	    echo('<script>window.location="login.php"</script>');
    }

    if(isset($_POST['submit'])){

        //Pseudocode for database connection
        $host = "172.31.64.59";
        $dbuser = "team12";
        $dbpass = "hG827vnymmBh5CVkTSZ3";
        $dbname = "team12";

        //Establish SQL connection
        $connection = new mysqli($host, $dbuser, $dbpass, $dbname);

        if(mysqli_connect_error())
	    {
		    echo "A database connection error has occured. 
		    Please try again later or contact your system 
		    administrator.<br \>\n";
	    } else {
            //Capture variables
            $user = mysqli_real_escape_string($connection, 
            filter_input(INPUT_POST,'user'));
            $first_name = mysqli_real_escape_string($connection,
            filter_input(INPUT_POST,'fname'));
            $last_name = mysqli_real_escape_string($connection,
            filter_input(INPUT_POST,'lname'));
            $phone = mysqli_real_escape_string($connection,
            filter_input(INPUT_POST,'phone'));
            $email = mysqli_real_escape_string($connection,
            filter_input(INPUT_POST,'email'));

            $session_user = $_SESSION['uname'];

            $store_info = "UPDATE Account SET username='$user', 
            first_name='$first_name', last_name='$last_name', 
            phone_number='$phone', email_address='$email' WHERE 
            username='$session_user'";

            if($connection->query($store_info)){
                echo "Account information updated!";
                header("Location: /homepage.php");
            } else {
                echo "Error: ". $store_info ."
                ". $connection->error;
            }

        }

    }


?>

<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Edit Account Information</title>
       
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" type="text/css" href="create.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Update Information</h3>
			</div>
			<div class="card-body">
				<form enctype="multipart/form-data" action="register.php" method="POST">
                    <h5 style="color: aliceblue">Username</h5>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" id="user" name="user" class="form-control" placeholder="Username" required>
						
                    </div>
                    <h5 style="color: aliceblue">First Name</h5>
                    <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <h5 style="color: aliceblue">Last Name</h5>
                    <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <h5 style="color: aliceblue">Phone Number</h5>
                    <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <h5 style="color: aliceblue">Email</h5>
                    <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
					<div class="form-group">
						<input type="submit" value="Update" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>