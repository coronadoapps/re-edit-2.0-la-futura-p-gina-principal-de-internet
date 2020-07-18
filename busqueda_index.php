<?php 
	include('conex_bd.php');
	session_start();

	if(!isset($_SESSION['usuario'])){
	    // header("Location: signup.php");
	  } else{  

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
	<div class="row">	
		<div id="sidebar" class="col-2" >
				<a class="logo" href="index.php">
					<img src="img/reedit.png">
				</a>
				<form id="form_search" action="busqueda_index.php" method="GET">
					<div class="input-group">
					  	<input id="searchInput" name="busqueda" type="text" class="form-control" placeholder="Search">
					  <div class="input-group-append">
					  	<button type="submit" class="btn btn-outline-secondary" id="searchIcon"><i class="fas fa-search"></i></button>	
					  </div>
					</div>
				</form>		
				<ul>
					<li><a class="select_sidebar" href="#">All</a></li>
					<li><a class="select_sidebar" href="#">Top</a></li>
					<li><a class="select_sidebar" href="#">Best</a></li>
					<li><a class="select_sidebar active" href="#">Users</a></li>
				</ul>
				<hr>
				<div id="topics">
					<ul>
					</ul>	
				</div>
		</div>

		<div class="col-10">


<?php if(isset($_SESSION['usuario'])){ ?>

			<nav id="topbar" class="navbar navbar-expand-lg navbar-light" style="background-color: transparent;">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link active" href="home.php?filter=1">New</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="home.php?filter=2">Best</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="home.php?filter=3">Top</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link disabled" href="#">Premium</a>
			      </li>
			      <li class="nav-item ml-5"><button class="btn btn-outline-dark btn-sm mt-3" data-toggle="modal" data-target="#ModalNewPost"><i class="fas fa-feather-alt"></i> nueva publicación</button></li>
			    </ul>
		    	<div class="navbar-nav ml-auto">
		    		
		    		<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          <img class="rounded-circle mr-1" src="<?php echo $avatar; ?>" width="30px">
				          <?php echo $_SESSION['usuario']; ?>
				        </a>
				        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalPerfil">ver mi perfil</a>
				          <a class="dropdown-item" href="#">configuracion</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> cerrar sesión</a>
				        </div>
				    </li>
			    	<!-- <a href="#"><img class="rounded-circle" src="img/caratula.jpg" width="5%"></a> -->
			    </div>			    
			  </div>
			</nav>


<?php } else{ ?>

			<nav id="topbar" class="navbar navbar-expand-lg navbar-light" style="background-color: transparent;">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav">
			      <li class="nav-item">
			        <a class="nav-link active" href="home.php?filter=1">New</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="home.php?filter=2">Best</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="home.php?filter=3">Top</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link disabled" href="#">Premium</a>
			      </li>
			    </ul>
		    	<ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a id="tologin" class="nav-link" href="login.php">Log In</a>
			      </li>
			      <li class="nav-item">
			        <a id="tosignup" class="nav-link btn btn-light btn-sm" href="signup.php">Sign Up</a>
			      </li>
			    </ul>			    
			  </div>
			</nav>
<?php }

	$busqueda = $_GET['busqueda'];

?>

			<div id="posts" class="container-fluid mt-2 p-0">

				<h3>Resultados para: <strong><?php echo $busqueda; ?></strong></h3>

<?php 
	$query = "SELECT * FROM usuarios WHERE usuario LIKE '%$busqueda%'";
	$result = mysqli_query($conex, $query);

	if(!$result){
	    die('Query Error' . mysqli_error($conex));
	} else{

	while($row = mysqli_fetch_array($result)) {

		if(!isset($row)){
			echo "No arrojó resultados";
			break;
		}

		 $avatar = $row['avatar'];
		        if(is_null($avatar)){
		        	$avatar = "img/avatar/default.png";
		        }

		 $fecha_registro = $row['fecha_registro'];

 ?>

 <div id="perfil" class="card" style="border: 1px solid #898ea2;">

			          <div class="card-body">
			            <div class="row">
			              <div class="col-2">
			                <img src="<?php echo($avatar); ?>" class="img-thumbnail rounded-circle mx-auto d-block" width="100px">       
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
			              <div class="col"><p class="card-text float-left"><i class="fas fa-calendar-alt"></i> Se unió en <?php echo(date('F \d\e Y', strtotime($fecha_registro))); ?></p></div>
			            </div> 			            	          
			          </div>

			         	<div class="card-footer">
					    </div>
			        </div>
				
				
<?php } } ?>


<hr style="border: 1px solid #CC554F">

<?php 

	$query = "SELECT * FROM publicaciones WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' OR autor LIKE '%$busqueda%' ORDER By id DESC";
	$result = mysqli_query($conex, $query);

	if(!$result){
	    die('Query Error' . mysqli_error($conex));
	} else{

	while($row = mysqli_fetch_array($result)) {
		 $fecha = $row['date'];
		 if(empty($row['multimedia'])){
		 	$multimedia = "img/posts/text_default.png";
		 } else{
		 	$multimedia = $row['multimedia'];
		 }

		 	if(!isset($_SESSION['usuario'])){ ?>

		 		<div class="card" style="border: 1px solid #898ea2;">
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
					  			<div class="row-fluid">
					  				<p class="card-text"><?php echo $row['descripcion']; ?></p>
					  			</div>
					  			<div class="row-fluid">
					  				<strong><p id="<?php echo $row['id']; ?>" class="card-text"><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo $row['comentarios']; ?> comentarios</a> | <a href="#">compartir</a></p></strong>
					  			</div>				   
						  	</div>
						</div>			  	
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

				<div class="card" style="border: 1px solid #898ea2;">
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
						  	<div class="col-2" style="border: 0px solid #FD4500;">
						  		<a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><img class="rounded" src="<?php echo $multimedia; ?>" width="90%"></a>
						  	</div>
						  	<div class="col-9">
						  		<div class="row-fluid">
						  			<p class="card-title"><strong><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo($row['titulo']);?></a></strong> | <?php echo(time_elapsed_string($fecha));?> | por <?php echo($row['autor']);?></p>
					  			</div>
					  			<div class="row-fluid">
					  				<p class="card-text"><?php echo $row['descripcion']; ?></p>
					  			</div>
					  			<div class="row-fluid">
					  				<strong><p class="card-text"><a href="comentarios.php?id_publicacion=<?php echo $row['id']; ?>"><?php echo $row['comentarios']; ?> comentarios</a> | <a href="#">compartir</a></p></strong>
					  			</div>				   
						  	</div>
						</div>			  	
				  	</div>
				</div>	
<?php } } }   ?>
				
			</div> <!-- container posts-->

		</div>  <!-- col principal-->

	</div> <!-- row -->
	

	 
<?php include('modals.php');  ?>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/index.js"></script>
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