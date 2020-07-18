$(function(){

	$("#form_signup2").submit(function(){

		if(!$("#user").val() || !$("#password").val() || !$("#email").val()){
			alert("debe completar los campos con *");
		} else{
			return true;
		}
	});




	$("#user").keyup(function(){
		var usuario = $(this).val();
		if(usuario != ""){

			$.ajax({  
					url  : 'check_user.php',
		            type : 'POST',
		            data : {usuario},
		            success:function(data) {  
		               console.log(JSON.parse(data).length);

		               if(JSON.parse(data).length > 0){
		               		$("#user").css("background-color","#ff2f1e");
		               		$("#errorusuario").css("opacity","1");
		               } else{
		               		$("#user").css("background-color","");
		               		$("#errorusuario").css("opacity","0");
		               }
		            }  
		        });
		}
			
	});

	$("#email").keyup(function(){
		var usuario = $(this).val();
		if(usuario != ""){

			$.ajax({  
					url  : 'check_user.php',
		            type : 'POST',
		            data : {usuario},
		            success:function(data) {  
		               console.log(JSON.parse(data).length);

		               if(JSON.parse(data).length > 0){
		               		$("#email").css("background-color","#ff2f1e");
		               		$("#erroremail").css("opacity","1");
		               } else{
		               		$("#email").css("background-color","");
		               		$("#erroremail").css("opacity","0");
		               }
		            }  
		        });
		}
			
	});
})