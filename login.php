<?php

//Login
session_start();

define('SERVER', "127.0.0.1");
define('USER', "root");
define('PASS', "");
define('DATABASE', "Dice");

if(isset($_POST['username'])){

	try {

		$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
	    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $conn->prepare("SELECT * FROM users WHERE username = :username");
		$statement->bindParam(':username', $_POST['username']);

		$statement->execute();
		$user_data = $statement->fetch(PDO::FETCH_ASSOC);

	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}

	if (password_verify($_POST['password'], $user_data['password'])){
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['last_login'] = date("Y-m-d H:m:s");	

		header("Location: Index.php");

	} else {
		echo "Try again";
	}
}

//Register

if (isset($_POST['username2']) && $_POST['password2'] == $_POST['password3']) {

	$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
			    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $conn->prepare("SELECT username FROM users WHERE username = :username");
	$statement->bindParam(':username', $_POST['username2']);
	$statement->execute();

	if($statement->rowCount() > 0){
		echo "User Already Exists.";

	} else {

		try {

			$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
			    // set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)"); 
			$statement->bindParam(':username', $_POST['username2']);

			$hash = password_hash($_POST['password2'], PASSWORD_DEFAULT);

			$statement->bindParam(':password', $hash);

			$statement->execute();

			$conn = null;

		} catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		} 
	} 
} elseif (isset($_POST['username2']) && $_POST['password2'] != $_POST['password3']) {
	echo "Passwords doesnt match";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, inicial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<form method="POST">
					<div><h1>Login</h1></div>
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="username">
					</div>
					<div class="form-group">
						<label>Password </label>
						<input class="form-control" type="password" name="password">
					</div>
					<input class="btn btn-primary" type="submit" value="Login">
				</form>
			</div>

			<div class="col">
				<form method="POST">
					<div><h1>Register</h1></div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username2">
					</div>
					<div class="form-group">
						<label>Password </label>
						<input class="form-control required" type="password" name="password2">
					</div>
					<div class="form-group">
						<label>Repeat password</label>
						<input class="form-control required" type="password" name="password3">
					</div>
					<input  id="register" type="submit" value="Register" class="btn btn-danger">
				</form>
			</div>
		</div>		
	</div>
</body>
</html>