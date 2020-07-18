<?php 
	session_start();
	include('conex_bd.php');

	if (isset($_POST)) {       
	    $autor = $_SESSION['usuario'];
		$rutaimg = $_FILES['avatar']['name'];
		$img = $_FILES['avatar']['tmp_name'];
		
		if(empty($rutaimg)){
			$ruta = "";
		} else{	
			$ruta = "img/avatar/" . $rutaimg;
		}
		move_uploaded_file($img, $ruta);

		$query = "UPDATE usuarios SET avatar = '$ruta' WHERE usuario = '$autor'";	

		$resultado = mysqli_query($conex, $query);

		if(!$resultado){
			die('Query Error' . mysqli_error($conex));
		} else{
			header("Location: index.php");
		}

	}
	
 ?>
