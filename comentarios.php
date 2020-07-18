<?php 
	include('conex_bd.php');
	session_start();

	if(!isset($_SESSION['usuario'])){
	    // header("Location: signup.php");
	  }  else{

			$consulta = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."' ";
		    $resultado = mysqli_query($conex,$consulta);

		    if($resultado){
		      while ($rowPerfil = $resultado->fetch_array()) {
		        $nombre = $rowPerfil['nombre'];
		        $apellido = $rowPerfil['apellido'];
		        $cumpleanos = $rowPerfil['cumpleanos'];
		        $email = $rowPerfil['email'];
		        $fecha_registro = $rowPerfil['fecha_registro'];
		       	$avatar = $rowPerfil['avatar'];
		        if(is_null($avatar)){
		        	$avatar = "img/avatar/default.png";
		        }
		      }
		    }		   
		}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>re-edit: la (futura) página principal de la internet.</title>
	<link rel="icon" href="img/reddit.png" type="image/icon type">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">


	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bcb5003990.js" crossorigin="anonymous"></script>

</head>
<body>

<div id="container-fluid">
	<nav id="topbar" class="navbar navbar-sm sticky-top navbar-light bg-light">
		<a href="index.php">
			<img class="rounded" width="100px" src="img/reedit.png">
		</a>
		<a type="button" href="index.php">
			<i class="far fa-window-close"></i>
		</a>
	</nav>

	<div class="row">
		<div id="posts" class="col-9">
<?php 

	$id_publicacion = $_GET['id_publicacion'];

	$query = "SELECT * FROM publicaciones WHERE id LIKE '$id_publicacion'";
	$result = mysqli_query($conex, $query);

	if(!$result){
	    die('Query Error' . mysqli_error($conex));
	} else{

	while($row = mysqli_fetch_array($result)) {
		$autor = $row['autor'];
		 $fecha = $row['date'];
		 if(empty($row['multimedia'])){
		 	$multimedia = "img/posts/text_default.png";
		 } else{
		 	$multimedia = $row['multimedia'];
		 }


		 if(!isset($_SESSION['usuario'])){ ?>
		 		<div class="card mx-2 mt-2" style="border: 1px solid #898ea2;">
					<div class="card-body">
						<div class="row">
					  		<div class="col-1 text-center">
					  			<div class="row-fluid">
					  				<a href="#">
					  					<img src="img/voteup.png" width="30px" height="30px">
					  				</a>
							  		<div class="row-fluid">
							  			<p class="card-text"><?php echo ($row['up'] - $row['down']);?></p>
							  		</div>
						  			<div class="row-fluid">
						  				<a href="#"><img src="img/votedown.png" width="30px" height="30px"></a>
						  			</div>
						  		</div>						  			
						  	</div>
						  	<div class="col-2">
						  		<a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><img class="rounded" src="<?php echo $multimedia; ?>" width="100%"></a>
						  	</div>
						  	<div class="col-9">
						  		<div class="row-fluid">
						  			<p class="card-title"><strong><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo($row['titulo']);?></a></strong> | <?php echo(time_elapsed_string($fecha));?> | por <?php echo($row['autor']);?></p>
					  			</div>			   
						  	</div>
						</div>			  	
				  	</div>
				</div>

				<div class="card mx-4 mt-2" style="border: 1px solid #898ea2;">
					<div class="card-header">
						<h1 class="card-title"><strong><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo($row['titulo']);?></a></strong> | <?php echo(time_elapsed_string($fecha));?> | por <?php echo($row['autor']);?></h1>
					</div>

					<div class="card-body">
						<p class="card-text"><?php echo $row['descripcion']; ?></p>
					</div>

<?php  if(!empty($row['multimedia'])){ ?>
			 	 <img class="img-thumbnail rounded mx-auto d-block" src="<?php echo $multimedia;?>" width="79%">
			<?php } ?>

					<div class="row-fluid mx-4 mt-2">
		  				<strong><p id="<?php echo $row['id']; ?>" class="card-text"><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo $row['comentarios']; ?> comentarios</a> | <a href="#">compartir</a> | <a href="#">guardar</a>	| <a href="#">reportar</a></p></strong>
		  			</div>

					<div class="card-footer">
				    	<form>
				    		<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><img class="rounded" src="img/avatar/default.png" width="28px"></span>
							  </div>
							  <input class="form-control" disabled type="text" name="comment" placeholder="Registrate para poder comentar y ver los comentarios." style="font-weight: bold;">
							</div>   		
				    	</form>
				    	<strong class="card-text mt-3">Registrate <a href='signup.php'>aquí</a></strong>
			    	</div>
			</div>			
			
	<?php } else{

		 $query2 = "SELECT * FROM interacciones WHERE usuario = '".$_SESSION['usuario']."' AND publicacion = '".$row['id']."'";
		 $result2 = mysqli_query($conex, $query2);

		 if(!$result2){
		 	die('Query Error' . mysqli_error($conex));
		 } else{
		 	$row2 = mysqli_fetch_array($result2);


 ?>

 			<div class="card mx-2 mt-2" style="border: 1px solid #898ea2;">
					<div class="card-body">
						<div class="row">
					  		<div class="col-1 text-center">
					  			<div class="row-fluid">
	<?php if(isset($row2['reaccion']) && $row2['reaccion'] == 1){ ?>
						  				<a id="<?php echo $row['id']; ?>" class="voteup" href="#"><img src="img/vote_up.png" width="30px" height="30px"></a>
						  				<div class="row-fluid"><p class="card-text"><?php echo ($row['up'] - $row['down']);?></p></div>
						  			<div class="row-fluid">
						  				<a id="<?php echo $row['id']; ?>" class="votedown" href="#"><img src="img/votedown.png" width="30px" height="30px"></a>
						  			</div>
			<?php } elseif (isset($row2['reaccion']) && $row2['reaccion'] == 0) { ?>
						  				<a id="<?php echo $row['id']; ?>" class="voteup" href="#"><img src="img/voteup.png" width="30px" height="30px"></a>
							  				<div class="row-fluid"><p class="card-text"><?php echo ($row['up'] - $row['down']);?></p></div>
							  			<div class="row-fluid">
							  				<a id="<?php echo $row['id']; ?>" class="votedown" href="#"><img src="img/vote_down.png" width="30px" height="30px"></a>
							  			</div>
			<?php } else{ ?>
					  			<a id="<?php echo $row['id']; ?>" class="voteup" href="#"><img src="img/voteup.png" width="30px" height="30px"></a>
							  				<div class="row-fluid"><p class="card-text"><?php echo ($row['up'] - $row['down']);?></p></div>
							  			<div class="row-fluid">
							  				<a id="<?php echo $row['id']; ?>" class="votedown" href="#"><img src="img/votedown.png" width="30px" height="30px"></a>
							  			</div>
			<?php } } ?> 									  			
						  		</div>						  			
						  	</div>
						  	<div class="col-2">
						  		<a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><img class="rounded" src="<?php echo $multimedia; ?>" width="100%"></a>
						  	</div>
						  	<div class="col-9">
						  		<div class="row-fluid">
						  			<p class="card-title"><strong><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo($row['titulo']);?></a></strong> | <?php echo(time_elapsed_string($fecha));?> | por <?php echo($row['autor']);?></p>
					  			</div>			   
						  	</div>
						</div>			  	
				  	</div>
				</div>

			<div class="card mx-4 mt-2" style="border: 1px solid #898ea2;">
				<div class="card-header">
					<h1 class="card-title"><strong><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo($row['titulo']);?></a></strong> | <?php echo(time_elapsed_string($fecha));?> | por <?php echo($row['autor']);?></h1>
				</div>

				<div class="card-body">
					<p class="card-text"><?php echo $row['descripcion']; ?></p>
				</div>			

<?php  if(!empty($row['multimedia'])){ ?>
			 	 <img class="img-thumbnail rounded mx-auto d-block" src="<?php echo $multimedia;?>" width="79%">
			<?php } ?>

			 	 <div class="row-fluid mx-4 mt-2">
	  				<strong><p id="<?php echo $row['id']; ?>" class="card-text"><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo $row['comentarios']; ?> comentarios</a> | <a href="#">compartir</a> | <a href="#">guardar</a>	| <a href="#">reportar</a></p></strong>
	  			</div>
				<div class="card-footer">
		    		<small class="card-text">comentar como <?php echo $_SESSION['usuario'];?></small>
		    		<div class="input-group">
					  <div class="input-group-prepend">
					    <span class="input-group-text"><img class="rounded" src="<?php echo($avatar); ?>" width="30px"></span>
					  </div>
					  <input class="comment form-control" type="text" name="comment" placeholder="escribe tu comentario" style="font-weight: bold;">
					</div>
					<button id="<?php echo $row['id']; ?>" class="btn btn-dark form-control btn_comentar">comentar</button>   		
			    </div>
			</div>

<?php } }//fin while
		 }//fin else ?>

		 <div class="card mx-4" style="border: 1px solid #898ea2;">
		 	<div class="card-body">
		 		<ul id="comment_list" class="list-group">

				</ul>
		 	</div>
		 </div>

		</div> <!--fin col-9-->


		<div class="col-3">

<?php 
	$query = "SELECT * FROM usuarios WHERE usuario LIKE '$autor'";
	$result = mysqli_query($conex, $query);

	if(!$result){
	    die('Query Error' . mysqli_error($conex));
	} else{

	while($row = mysqli_fetch_array($result)) {

		if(!isset($row)){
			echo "No existe";
			break;
		}

		 $avatar = $row['avatar'];
		        if(is_null($avatar)){
		        	$avatar = "img/avatar/default.png";
		        }

		 $fecha_registro = $row['fecha_registro'];

 ?>
 			<div class="card mx-2 mt-3" style="border: 1px solid #898ea2;">

	          <div class="card-body">
	            <div class="row">
	              <div class="col-6">
	                <img src="<?php echo($avatar); ?>" class="img-thumbnail rounded-circle mx-auto d-block w-100">       
	              </div>
	              <div class="col-6">  
	              </div>
	            </div>

	            <div class="row mt-2">
	              <div class="col"><p class="card-text float-left"><strong><?php echo $row['nombre']," ",$row['apellido']; ?></strong></p></div>
	              <div class="w-100"></div>
	              <div class="col"><p class="card-text float-left"><small>@<?php echo $row['usuario']; ?></small></p></div>
	              <div class="w-100"></div>
	              <div class="col"><p class="card-text float-left"><?php echo $row['email']; ?></p></div>
	              <div class="w-100"></div>
	              <div class="col"><p class="card-text float-left"><i class="fas fa-birthday-cake"></i> Se unió en <?php echo(date('F \d\e Y', strtotime($fecha_registro))); ?></p></div>
	            </div> 			            	          
	          </div>

	         	<div class="card-footer">
			    </div>
			</div>
<?php } } ?>
				
		</div>
	</div>
	
</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/comentarios.js"></script>
</body>
</html>



<?php 
  function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime,new DateTimeZone('America/Bogota'));
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
  }
 ?>