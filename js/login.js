$(function(){

	$( "#target" ).submit(function( event ) {
		  if(!$("#user").val() || !$("#password").val()){
		  	alert("Debe completar todos los campos");
		  	return false;
		  } else{
		  	return true;
		  }

		  event.preventDefault();
		});

})