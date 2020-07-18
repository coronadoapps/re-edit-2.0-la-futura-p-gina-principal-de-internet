<?php 
	include('conex_bd.php');
	session_start();

	$id_publicacion = $_POST['id_post'];

	$query = "SELECT * FROM comentarios WHERE id_publicacion LIKE '$id_publicacion' ORDER By id DESC";
	$resultado = mysqli_query($conex, $query);

	if(!$resultado){
		die('Query Error' . mysqli_error($conex));
	} else{

		$json = array();
		while($row = mysqli_fetch_array($resultado)){
			$json[] = array(
				'comentario' => $row['comentario'],
				'autor' => $row['autor'],
				'date' => $row['date']);
		}

		$jsonstring = json_encode($json);
		echo $jsonstring;

	

	}

	
?>	