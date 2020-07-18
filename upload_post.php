<?php 
	session_start();
	include('conex_bd.php');

	$autor = $_SESSION['usuario'];
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$rutaimg = $_FILES['imagen']['name'];
	$img = $_FILES['imagen']['tmp_name'];
	
	if(empty($rutaimg)){
		$ruta = "";
	} else{	
		$ruta = "img/posts/" . $rutaimg;
	}

	move_uploaded_file($img, $ruta);

	$query = "INSERT INTO publicaciones(autor, date, titulo, descripcion, multimedia, up, down, comentarios) VALUES ('$autor', now(), '$titulo', '$descripcion', '$ruta', '0', '0', '0')";

	$resultado = mysqli_query($conex, $query);

	if(!$resultado){
		die('Query Error' . mysqli_error($conex));
	} else{
		header("Location: index.php");
	}

 ?>
