
<?php

	// CONNECT

	$hostname = "localhost";
	$username = "root";
	$password1 = "";
	$dbname = "myfirstdatabase";

	// CONNECTING TO MYSQL DATABASE
	$dbc = mysqli_connect($hostname, $username, $password1, $dbname) OR die("Could not connect to database, ERROR: ".mysqli_connect_error());

	mysqli_set_charset($dbc, "utf8");

?>