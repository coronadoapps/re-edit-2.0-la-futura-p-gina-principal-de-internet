<?php 
	include('conex_bd.php');	
	session_start();

	$filtro = $_POST['filter'];
	

	if($filtro == 1){
		$query = "SELECT * FROM publicaciones ORDER By id DESC";
		$resultado = mysqli_query($conex, $query);

		if(!$resultado){
			die('Query Error' . mysqli_error($conex));
		} else{

			$json = array();
			while($row = mysqli_fetch_array($resultado)){
				$json[] = array(
					'titulo' => $row['titulo']);
			}

			$jsonstring = json_encode($json);
			echo $jsonstring;

		

		}
	} else if($filtro == 2){

		$query = "SELECT * FROM publicaciones ORDER BY publicaciones.up DESC";
		$resultado = mysqli_query($conex, $query);

		if(!$resultado){
			die('Query Error' . mysqli_error($conex));
		} else{

			$json = array();
			while($row = mysqli_fetch_array($resultado)){
				$json[] = array(
					'titulo' => $row['titulo']);
			}

			$jsonstring = json_encode($json);
			echo $jsonstring;	
		}
	} else if($filtro == 3){

		$query = "SELECT * FROM publicaciones ORDER BY date ASC";
		$resultado = mysqli_query($conex, $query);

		if(!$resultado){
			die('Query Error' . mysqli_error($conex));
		} else{

			$json = array();
			while($row = mysqli_fetch_array($resultado)){
				$json[] = array(
					'titulo' => $row['titulo']);
			}

			$jsonstring = json_encode($json);
			echo $jsonstring;	
		}
	}
	
?>	