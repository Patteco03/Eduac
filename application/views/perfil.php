<link href="https://fonts.googleapis.com/css?family=Lato:300,400"
rel="stylesheet">
<!--  Style da page de perfil -->



<div class="container">
	<div class="row">

		<div class="col-lg-12">
			<span>{ACAO}</span>
		</div>

		<div class="col-lg-12">

			<div class="col-md-6 perfil-left">

				<div class="title-perfil">
					<h4>
						MEU PERFIL <span class="no"> NORTESUL </span>
					</h4>
				</div>

				<div class="col-sm-6 col-xs-12">

					<div class="form-group">
						<img src="{URLFOTO}" title="imagem do perfil"
						class="img-responsive" width="100" height="100">

						<!-- Button trigger modal -->
						<a href="#" data-toggle="modal" data-target="#exampleModal">Alterar
							imagem</a>
						</div>

						<div class="form-group">
							<h3>{NOMECOMPRADOR}</h3>
						</div>

						<a href="{EDITARFORM}">
							<button type="button" class="btn btn-info">Editar</button>
						</a>
						<a href="{ALTERARSENHA}">
							<button type="button" class="btn btn-info">Alterar Senha</button>
						</a> 
					</div>
				</div>
				<div class="col-md-6">
					<br>
					<div class="col-sm-3 col-xs-12">
						<figure class="float">
							<a href="{URLMEUSCURSOS}"> <img
								src="<?php echo base_url('assets/img/cursos.png') ?>"
								title="imagem cursos" class="img-responsive" width="64"
								height="64">
							</a>
							<figcaption>Meus Cursos</figcaption>
						</figure>
					</div>

					<div class="col-sm-3 col-xs-12">

						<figure class="float">
							<a href="#"> <img
								src="<?php echo base_url('assets/img/certificado.png') ?>"
								title="imagem certificados" class="img-responsive" width="64"
								height="64">
							</a>
							<figcaption>Contrato</figcaption>

						</figure>

					</div>

					<div class="col-sm-3 col-xs-12">
						<figure class="float">
							<a href="#"> <img
								src="<?php echo base_url('assets/img/comentarios.png') ?>"
								title="imagem comentários" class="img-responsive" width="64"
								height="64">
							</a>
							<figcaption>Dúvidas ?</figcaption>
						</figure>
					</div>
				</div>

			</div>

		</div>
	</div>


	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar perfil -
					Imagem</h5>
					<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Upload  -->
				<form id="formulario" method="post" enctype="multipart/form-data"
				action="{SALVAFOTOPERFIL}">



				<input type="hidden" name="codcomprador" value="{CODCOMPRADOR}"> <span>Escolha
				uma foto para miniatura </span><br>
				<br> <input type="file" id="imagem" name="fotos[]" /> <br> <br>

				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>
			<div id="visualizar"></div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

		</div>
	</div>
</div>
</div>


