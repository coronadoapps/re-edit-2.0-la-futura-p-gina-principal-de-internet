<?php 
	include('conex_bd.php');

	$user = $_POST['user'];
	$pass = $_POST['password'];

	$query = "SELECT * FROM usuarios WHERE (usuario = '$user' OR email = '$user') AND contrasena = '$pass'";

	$result = mysqli_query($conex,$query);

	if(mysqli_num_rows($result) > 0){
		session_start();
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		$_SESSION['usuario'] = $row[1];
		$_SESSION['email'] = $row[6];

		header("Location: index.php");
	} else{
        header("Location: login.php");
        echo "<script type='text/javascript'>alert('error usuario no existe');</script>";
	}
 ?>