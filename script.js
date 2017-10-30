var rolls = 0;
var game_array = [];
var total = 0;
var game = 0;


//new game button
function start(){

	game_array = [];
	total_win = [];
	rolls = 0;
	document.getElementById('won').innerHTML = "";
	document.getElementById('win').innerHTML = "";

	document.getElementById("play").disabled = false;
	document.getElementById('test').innerHTML = "New game!";
}


//rolls button
function play(){
	if (rolls < 4) {

		rolls++

		x = Math.ceil(Math.random()*6);
		y = Math.ceil(Math.random()*6);
		z = Math.ceil(Math.random()*6);
		document.getElementById('dice1').src = "images/"+ x +".png";
		document.getElementById('dice2').src = "images/"+ y +".png";
		document.getElementById('dice3').src = "images/"+ z +".png";
		game_array.push(x, y, z);
		game_array.toString();
		document.getElementById('test').innerHTML = game_array;
	} else {
		document.getElementById('test').innerHTML = "Game Over!"
		document.getElementById('play').disabled = true;
		game++
		var total=0;
		for(var i in total_win) { total += total_win[i]; }
			document.getElementById('won').innerHTML = total;
	}
	//posting data to game.php

		$.post("game.php",
			{
				win: total,
				game: game,
			},
		function(data){
			console.log("OK");
	});


	// checking for wins

	if (x == y || z == x) {
		win = document.getElementById('win').innerHTML = x * 0.1; 
		total_win.push(win);
	} else if( y == z || x == y == z) {
		win = document.getElementById('win').innerHTML = y * 0.1; 
		total_win.push(win);
	} else {
		document.getElementById('win').innerHTML = "Bandyk dar karta!";
	}

}


	




