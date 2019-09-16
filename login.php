<?php

//Benchmark for appropriate cost
$timeTarget = 0.05; // 50 milliseconds 

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;



//Generate hash

$user = "username";
$pass = "password";

$options = ['cost' => 10,];

//$salt_hash must be stored in a table that can contain up to 255 chars
$salt_hash = password_hash($pass, PASSWORD_DEFAULT, $options);
//Default cost is 10

echo $salt_hash;
//Store salt_hash in database

//Obtain stored salt_hash from database

//Verify hash against password
$verified = password_verify($pass, $salt_hash); //Returns bool value
if ($verified) {
	echo "Logging in..."
} else {
	echo "Invalid password"
}

?>
