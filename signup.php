<?php 

	include('conex_bd.php');
	session_start();

	if(isset($_SESSION['usuario'])){
	    header("Location: index.php");
	  }
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Re-edit</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/bcb5003990.js" crossorigin="anonymous"></script>
</head>
<body style="background: url('img/background.jpg');">
	<div id="signup">
		<button type="button" onclick="location.href='index.php'" class="close" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		<div class="row w-75">
			<div class="col mr-4">
				<img src="img/reedit.png" width="30%">	
				<h3 class="mt-4">Registrate ahora para obtener tu propia experiencia en Reedit!</h3>
				<h5 class="mt-5">Para continuar como invitado haz <a href="index.php">click aquí.</a></h5>
				<p class="mt-5">Al registrarte, estas indicando que aceptas los Términos y confirmas que has leído nuestra Política de privacidad y Política de contenido.</p>
				<h5 class="mt-5">¿Ya estas registrado? <a href="login.php">Inicia sesión.</a></h5>
			</div>				
		</div>0
	</div>

	<div id="form_signup">
		<div class="row w-80  ml-auto mr-auto">
			<div class="col">
				<form id="form_signup2" action="registrar_usuario.php" method="POST">
				  <div class="form-group">
				  	<div class="input-group-prepend">
				    	<span class="input-group-text bg-light"><i class="fas fa-signature"></i></span>
				    	<input id="name" class="form-control" type="name" name="name" placeholder="nombre">
				  	</div>	  	
				  </div>
				  <div class="form-group">
				  	<div class="input-group-prepend">
				    	<span class="input-group-text bg-light"><i class="far fa-user"></i></span>
				    	<input required id="user" class="form-control" type="name" name="user" placeholder="usuario*">
				  	</div>
				    <small id="errorusuario" style="color: red; opacity: 0;">nombre de usuario o email no disponible</small>  	
				  </div>
				  <div class="form-group">
				  	<div class="input-group-prepend">
					  	<span class="input-group-text bg-light"><i class="far fa-envelope"></i></span>
					  	<input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email*">
					</div> 
					<small id="erroremail" style="color: red; opacity: 0;">email o usuario ya registrado</small>   
				  </div>
				  <div class="form-group">
				  	<div class="input-group-prepend">
				  		<span class="input-group-text bg-light"><i class="far fa-hourglass"></i></span>
				    	<input minlength="6" required type="password" class="form-control" id="password" name="password" placeholder="contrasena*">
				    </div>
				  </div>
				  <div class="text-center">
				  	<button type="submit" class="btn mt-3"><strong>REGISTRARME</strong></button>
				  </div>					  
				</form>
			</div>
		</div>	
	</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/signup.js"></script>
</body>
</html>