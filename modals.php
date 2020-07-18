

			<!-- Modal Nueva Publicacion-->
			<div class="modal fade" id="ModalNewPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Nueva publicación por <?php echo $_SESSION['usuario']; ?> <img class="rounded-circle mr-1" src="<?php echo($avatar); ?>" width="30px"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <i class="far fa-window-close"></i>
			        </button>
			      </div>
			      <div class="modal-body">


			      	<form id="formulariopublicar" action="upload_post.php" method="POST" enctype="multipart/form-data">

					    <small class="form-text text-muted">Los campos con * son obligatorios.</small>
					    <div class="form-group">
							<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título*" required="true" maxlength="40">
						</div>
						<div class="form-group">
						 <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción(opcional)" rows="4" maxlength="500"></textarea>
						</div>
				        <div class="form-group">
				          	<input id="imagenfile" type="file" class="form-control-file" name="imagen" accept="image/*">
				        </div>
				        <div class="form-check mt-3">
						   <input type="checkbox" class="form-check-input" id="exampleCheck1">
						   <label class="form-check-label" for="exampleCheck1">recibir notificaciones de esta publicación</label>
						</div>
					  <small class="form-text text-muted">tenga en cuenta las políticas de contenido de reedit. Ten siempre un buen comportamiento.</small>
			      </div>
			      <div class="modal-footer mr-auto">
			        <div class="ml-auto">
						  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						  <button type="submit" class="btn btn-primary">Publicar</button>
					</div>			  
					</form>
			      </div>
			    </div>
			  </div>
			</div>


					<!-- Modal Nueva mi perfil-->
			<div class="modal fade" id="ModalPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			      	<a href="index.php">
						<img src="img/logo.png" width="5%">
					</a>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <i class="far fa-window-close"></i>
			        </button>
			      </div>
			      <div class="modal-body">

			      	<div id="miperfil" class="card">

			          <div class="card-body">
			            <div class="row">
			              <div class="col-6">
			                <img src="<?php echo($avatar); ?>" class="img-thumbnail rounded-circle mx-auto d-block">       
			              </div>
			              <div class="col-6">  
			              </div>
			            </div>

			            <div class="row mt-2">
			              <div class="col"><p class="card-text float-left"><strong><?php echo $nombre," ",$apellido; ?></strong></p></div>
			              <div class="w-100"></div>
			              <div class="col"><p class="card-text float-left"><small>@<?php echo $_SESSION['usuario']; ?></small></p></div>
			              <div class="w-100"></div>
			              <div class="col"><p class="card-text float-left"><?php echo $email; ?></p></div>
			              <div class="w-100"></div>
			              <div class="col"><p class="card-text float-left"><i class="fas fa-birthday-cake"></i> Se unió en <?php echo(date('F \d\e Y', strtotime($fecha_registro))); ?></p></div>
			            </div>  
			            <div class="form-group">
			            	<form id="formularioavatar" action="upload_avatar.php" method="POST" enctype="multipart/form-data">
				          		<input id="imageUpload" type="file" class="form-control-sm-file mt-2" name="avatar" accept="image/*">
				          		<button type="submit" id="change_avatar" disabled="true" class="btn btn-outline-dark btn-sm mt-2"> cambiar avatar <i class='fas fa-camera-retro'></i></button>
				          	</form>
				        </div>
			            	          
			          </div>

			         	<div class="card-footer">
					        <button class="btn btn-dark btn-block"  data-dismiss="modal" data-toggle="modal" data-target="#ModalNewPost"> nueva publicación <i class="fas fa-feather-alt"></i></button>
					    </div>
			        </div>

					</div>			  
					</form>
			      </div>
			    </div>
			  </div>
			</div>


