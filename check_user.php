<?php 
	include('conex_bd.php');

	$user = $_POST['usuario'];

	$query = "SELECT * FROM usuarios WHERE (usuario = '$user' OR email = '$user')";

	$result = mysqli_query($conex,$query);

	if(!$result){
		die("Query Error" . mysqli_fetch_array());
	} else{
		$json = array();
		while($row = mysqli_fetch_array($result)){
			$json[] = array(
				'usuario' => $row['usuario']);
		}

		$jsonstring = json_encode($json);
		echo $jsonstring;

	}
		
?>
		
 