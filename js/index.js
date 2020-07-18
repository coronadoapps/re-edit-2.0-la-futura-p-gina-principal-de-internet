$(function (){

	$("a.voteup").click(function(){
		console.log($(this).attr("id"));

		var id_publicacion = $(this).attr("id");

		update_voteup(id_publicacion);	

	});

	$("a.votedown").click(function(){
		console.log($(this).attr("id"));

		var id_publicacion = $(this).attr("id");
		update_votedown(id_publicacion);
	});


	listar_usuarios();

	$( "#formularioavatar" ).submit(function( event ) {
	  
	  event.preventDefault();
	
       //Obtenemos datos.
        var data = $(this).serialize(); 

        $.ajax({  
            type : 'POST',
            url  : 'upload_avatar.php',
            data:  new FormData(this),
            contentType: false,
                  cache: false,
            processData:false,

            success:function(data) {  
               //console.log(data);
               window.location.href = "index.php";
            }  
        });
    });


	$("input[type='file']").change(function() {
		
      var dato_archivo = $('#imageUpload').prop("files")[0];
		if(dato_archivo['name']){
			$("#change_avatar").removeAttr("disabled");
		}

	});
	
	$("#btn_post").click(function(){

		if(!$("#titulo").val()){
			alert("Debe completar los campos requeridos **");
		} else{
			var titulo = $("#titulo").val();
			var descripcion = $("#descripcion").val();
			var dato_archivo = $('#imagenfile').prop("files")[0];
		    //Creo un dato de formulario para pasarlo en el ajax

		    var form_data = new FormData();
		    //Añado los datos del fichero que voy a subir
		    //En el lado del servidor puede obtener el archivo a traves de $_FILES["file"]
		    form_data.append("imagen", dato_archivo);

			$.ajax({
	          url: 'upload_post.php',
	          type: 'POST',
	          data: {	titulo: titulo,
	          			descripcion: descripcion,
	          			form_data: form_data
	          		},
	          success: function(response) {
	            console.log(response);
	            window.location.href = "index.php";
	          }
	        })

		}
	});

	$("a.select_sidebar").click(function(){
		if($(this).hasClass("active")){
			$(this).removeClass("active");

		} else{
			$("a.select_sidebar").removeClass("active");
			$(this).addClass("active");

			if($(this).text() == "All"){
				var filter = 1;
				listar_publicaciones(filter);
			} else if($(this).text() == "Top"){
				var filter = 2;
				listar_publicaciones(filter);
			} else if($(this).text() == "Best"){
				var filter = 3;
				listar_publicaciones(filter);
			} else{
				listar_usuarios();
			}
		}
		
	});

})

function listar_usuarios(){
	$.ajax({  
			url  : 'list_users.php',
            type : 'GET',
            success:function(data) {  
               // console.log(data);

               let users = JSON.parse(data);
               let template = "<ul>";

               users.forEach(user => {
               	template += `<li><a href="#">${user.usuario}</a></li>`
               });
               template += "</ul>";
               $("#topics").html(template);
            }  
        });
}

function listar_publicaciones(filter){
	$.ajax({  
			url  : 'list_posts.php',
            type : 'POST',
            data : {filter},
            success:function(data) {  
               // console.log(data);

               let posts = JSON.parse(data);
               let template = "<ul>";

               posts.forEach(post => {
               	template += `<li><a href="#">${post.titulo}</a></li>`
               });
               template += "</ul>";
               $("#topics").html(template);
            }  
        });
}

function update_voteup(id_publicacion){
	$.ajax({  
			url  : 'update_voteup.php',
            type : 'POST',
            data : {id_publicacion},
            success:function(data) {  
               	// console.log(data);
               	location.reload();
            }  
        });
}

function update_votedown(id_publicacion){
	$.ajax({  
			url  : 'update_votedown.php',
            type : 'POST',
            data : {id_publicacion},
            success:function(data) {  
               	// console.log(data);
               	location.reload();
            }  
        });
}