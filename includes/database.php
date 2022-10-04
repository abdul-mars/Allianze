<?php 
	$host = "localhost";
	$user = "root";
	$password = "";
	$dbName = "insurance";

	$con = mysqli_connect($host, $user, $password, $dbName);
	 if (!$con) {
	 	echo "Unable to connect to database";
	 }