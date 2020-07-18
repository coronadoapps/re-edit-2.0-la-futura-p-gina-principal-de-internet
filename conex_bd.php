<?php
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "mydb";

	$conex = mysqli_connect($host,$dbUsername,$dbPassword,$dbname);

	if(!$conex){
		header("Location: error404.php");
	}
?> 