<?php 
	include('conex_bd.php');
	session_start();


	$query = "SELECT * FROM usuarios ORDER By id DESC";
	$resultado = mysqli_query($conex, $query);

	if(!$resultado){
		die('Query Error' . mysqli_error($conex));
	} else{

		$json = array();
		while($row = mysqli_fetch_array($resultado)){
			$json[] = array(
				'usuario' => $row['usuario']);
		}

		$jsonstring = json_encode($json);
		echo $jsonstring;

	

	}

	
?>	