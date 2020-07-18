<?php 
	include('conex_bd.php');
	session_start();

	if(!isset($_SESSION['usuario'])){
    	die('Query Error' . mysqli_error($conex));
  	}else{

  		$publicacionId = $_POST['id_publicacion'];
  		$usuario = $_SESSION['usuario'];

	    $query = "SELECT * FROM interacciones WHERE usuario = '$usuario' AND publicacion = '$publicacionId'";
	    $result = mysqli_query($conex, $query);

	    if(!$result){
	      die('Query Error' . mysqli_error($conex));
	    } else{

	    	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	    	if(!isset($row['reaccion'])){
	          echo "no existe";
	          mysqli_query($conex, "INSERT INTO interacciones(usuario, publicacion, reaccion, date) VALUES ('$usuario','$publicacionId','1',now())");
	          mysqli_query($conex, "UPDATE publicaciones SET up = up+1 WHERE id = '$publicacionId'");
	          //echo 0;
	        } else if($row['reaccion'] == 1){
	          echo "0";
	          mysqli_query($conex, "DELETE FROM interacciones WHERE usuario = '$usuario' AND publicacion = '$publicacionId'");
	          mysqli_query($conex, "UPDATE publicaciones SET up = up-1 WHERE id = '$publicacionId'");
	        } else if ($row['reaccion'] == 0) {
	          mysqli_query($conex, "UPDATE interacciones SET reaccion = 1 WHERE publicacion = '$publicacionId'");
	          mysqli_query($conex, "UPDATE publicaciones SET up = up+1, down = down-1 WHERE id = '$publicacionId'");
	          
	        }   	     
	     }

	  }
?>