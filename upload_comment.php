<?php 
	include('conex_bd.php');
	session_start();

		$autor = $_SESSION['usuario'];
		$comentario = $_POST['comentario'];
		$id_publicacion = $_POST['id_post'];

		$query = "INSERT INTO comentarios(comentario, autor, id_publicacion, date) VALUES ('$comentario','$autor','$id_publicacion',now())";
		$resultado = mysqli_query($conex, $query);

		if(!$resultado){
			die('Query Error' . mysqli_error($conex));
		} else{
		
			echo "comentario agregado";

			
		
	$resultado2 = mysqli_query($conex, "UPDATE publicaciones SET comentarios = comentarios + 1 WHERE id LIKE '$id_publicacion'");
		if(!$resultado2){
		die('Query Error' . mysqli_error($conex));
		} else{
			echo "comentario añadido";
		}





		}
	
	
 ?>