<?php
session_start();

if(isset($_SESSION['username'])){
} else {
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dice game</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, inicial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://use.fontawesome.com/1fe1012896.js"></script>
	<script   src="https://code.jquery.com/jquery-3.2.1.js"   integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="   crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<h1>Dice game</h1>
		<div class="row">
			<div class="col" id="test"></div>
			<label>Your winnings:</label>
			<div class="col" id="win"></div>
			<label>Your total:</label>
			<div class="col" id="won"></div>
		</div>
		<div class="col text-right">
			<a class="btn btn-primary" href="stats.php">TO STATS</a>
			<a class="btn btn-danger" href="logout.php">LOGOUT</a>
		</div>
	</header>
	<div class="container vertical-center">
		<div class="row">
			<div class="col">
				<img class="dice" id="dice1" src="images/0.gif">
				<img class="dice" id="dice2" src="images/0.gif">
				<img class="dice" id="dice3" src="images/0.gif">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<button onclick="start()" class="btn btn-primary buttons">Pradėti žaidimą</button>
				<button onclick="play()" class="btn btn-danger buttons" disabled="true" id="play">Ridenti kauliukus</button>
			</div>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>