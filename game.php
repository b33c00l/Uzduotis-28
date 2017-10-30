<?php
session_start();

header("Content-type:application/json");
define('SERVER', "127.0.0.1");
define('USER', "root");
define('PASS', "");
define('DATABASE', "Dice");

if(isset($_POST['win'])) {
	try {
		$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
	    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $conn->prepare("INSERT INTO stats (username, total, game) VALUES (:username,:total, :game)" );
		$statement->bindParam(':game', $_POST['game']);
		$statement->bindParam(':total', $_POST['win']);
		$statement->bindParam(':username', $_SESSION['username']);
		$statement->execute();

		$conn = null;

	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}


//getting all data from db
try {
	$conn = new PDO("mysql:host=" . SERVER .";dbname=" . DATABASE . ";charset=utf8", USER, PASS);
	    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$statement = $conn->query("SELECT * FROM stats");
	$response = $statement->fetchAll(PDO::FETCH_ASSOC);



} 	catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

//getting 
if (isset($_GET['my'])) {
	
	$statement = $conn->prepare("SELECT * FROM stats WHERE username = :username");
	$statement->bindParam(':username', $_SESSION['username']);
	$statement->execute();
	$response = $statement->fetchAll(PDO::FETCH_ASSOC);

} elseif (isset($_GET['top'])) {
	$statement = $conn->query("SELECT * FROM stats ORDER BY total DESC LIMIT 5");
	$response = $statement->fetchAll(PDO::FETCH_ASSOC);
}


echo json_encode($response);


