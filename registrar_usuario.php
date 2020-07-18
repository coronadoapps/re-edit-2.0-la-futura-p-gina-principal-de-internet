<?php 
	session_start();
	include('conex_bd.php');

	$usuario = $_POST['user'];
	$nombre = $_POST['name'];
	$contrasena = $_POST['password'];
	$email = $_POST['email'];

	$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$email'";
	$result = mysqli_query($conex,$query);

	if(mysqli_num_rows($result) > 0){
		header("Location: signup.php");
	}else{

			$consulta = "INSERT INTO usuarios(usuario, nombre, contrasena, email, fecha_registro) VALUES ('$usuario','$nombre','$contrasena','$email',now())";

			$resultado = mysqli_query($conex, $consulta);

			if($resultado){
				session_start();
				$_SESSION['usuario'] = $usuario;
				header("Location: index.php");
				}
	}
?>