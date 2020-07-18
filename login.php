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
<body style="background: url('img/background2.jpg');">

	<div id="login">
		<div class="row w-75">
			<div class="col mr-4">					
				<h3 class="mt-4">Te damos la bienvenida! inicia sesión ahora.</h3>
			</div>				
		</div>
	</div>

	<div id="form_login">		
		<button type="button" onclick="location.href='index.php'" class="close" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
		<div class="row w-80  ml-auto mr-auto">
			<div class="col">
				<div class="text-center">
				<img class="" src="img/reedit.png" width="50%"></div>
				<form id="target" method="POST" action="login_user.php">
				  <div class="form-group mt-4">
				  	<div class="input-group-prepend">
				    	<span class="input-group-text bg-light"><i class="far fa-user"></i></span>
				    	<input id="user" class="form-control" type="name" name="user" placeholder="usuario o email">
				  	</div>	  	
				  </div>
				  <div class="form-group">
				  	<div class="input-group-prepend">
				  		<span class="input-group-text bg-light"><i class="far fa-hourglass"></i></span>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="contrasena" minlength="6">
				    </div>
				  </div>
				  <div class="text-center">
				  	<strong><input value="LOG IN" type="submit" href="#" class="btn btn-primary mt-3"></input></strong>
				  	<p class="mt-2">¿No tienes cuenta en Reedit? <a href="signup.php">¡Registrate ya!</a></p>				
				  </div>					  
				</form>
				<p class="mt-2 text-center">Para ingresar como invitado <a href="signup.php">¡click aquí!</a></p>
				<small><p class="mt-5">Todos los usuarios pueden votar a favor o en contra del contenido, haciendo que aparezcan más o menos destacados.</p></small>
			</div>
		</div>	
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/login.js"></script>
</body>
</html>