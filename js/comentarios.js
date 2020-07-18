$(function(){

	listar_comentarios($("button.btn_comentar").attr("id"));

	$("button.btn_comentar").click(function(){
		// console.log($("button.btn_comentar").attr("id"));
		if($("input.comment").val() != ""){
			var comentario = $("input.comment").val();
			$("input.comment").val("");
			var id_post = $("button.btn_comentar").attr("id");
			 // console.log(id_post);

			 $.ajax({  
			url  : 'upload_comment.php',
            type : 'POST',
            data : {comentario: comentario, id_post: id_post},
            success:function(data) {  
               listar_comentarios(id_post);
            }  
        });
	    }
	});
		
})

		
function listar_comentarios(id_post){
	$.ajax({  
			url  : 'list_comment.php',
            type : 'POST',
            data : {id_post},
            success:function(data) {  
               // console.log(data);

               let comments = JSON.parse(data);
               let template = "";

               comments.forEach(comment => {
               	template += `<li class="list-group-item">
				  	<div class="d-flex w-100 justify-content-between">
				  		<div class="card-text">
				  			<strong class="card-text">${comment.autor}</strong>
				  		</div>
				      <small>${comment.date}</small>
				    </div>
				    <p class="card-text">${comment.comentario}</p>
				  </li>`
               });

               $("#comment_list").html(template);
            }  
        });
}
	
