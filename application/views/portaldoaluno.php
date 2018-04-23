<link href="https://fonts.googleapis.com/css?family=Lato:300,400"
	rel="stylesheet">
<!--  Style da page de perfil -->



<div class="container">
	<div class="row panel-portal">

		<div class="col-lg-12">

			<div class="title-perfil">
				<h4>
					PORTAL DO <span class="no"> ALUNO </span>
				</h4>
			</div>


			<div class="col-md-3" style="border-right: 1px solid #ccc;z-index: 999;">

				<div class="col-sm-12 col-xs-12">

					<div class="form-group">
						
							<img src="{URLFOTO}" title="imagem do perfil"
								class="img-circle" width="200" height="200">

								<br>
							<!-- Button trigger modal -->
							<a href="#" data-toggle="modal" data-target="#exampleModal">Alterar
								imagem</a>

					</div>

					<div class="form-group">
						<h3>{NOMECOMPRADOR}</h3>
					</div>

					<div class="edit-form">
						<a href="{EDITARFORM}">
							<button type="button" class="btn btn-info">Editar</button>
						</a> 
						<a href="{ALTERARSENHA}">
							<button type="button" class="btn btn-info">Alterar Senha</button>
						</a> 
					</div>	

					<br> <br> <br>
					<div class="form-group">
							<div class="checkbox_compra col-md-12">    
								<h5 style="color: blue;text-align: center;">AVISOS</h5>
								<label for="confirm_contract" style="text-align: center; padding-left: 2rem; font-size: 13px">{NOTICIAS}</label>
								<br>
							</div>
						</div>
				</div>
			</div>
			<div class="col-md-9">

				<div class="title-portal">

					<span>INFORMAÇÕES </span>
					<br><br><br>
					<div class="row">
						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{FINANCEIRO}"> <img
									src="<?php echo base_url('assets/img/dollar-symbol.png') ?>"
									title="Financeiro" class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Financeiro</figcaption>
							</figure>
						</div>

						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{PLANOENSINO}"> <img
									src="<?php echo base_url('assets/img/books.png') ?>"
									title="Plano de Ensino" class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Plano de Ensino</figcaption>
							</figure>
						</div>

						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{DOWNLOAD}"> <img
									src="<?php echo base_url('assets/img/cloud-computing.png') ?>"
									title="Dawnload material" class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Download</figcaption>
							</figure>
						</div>

						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{CONTRATO}"> <img
									src="<?php echo base_url('assets/img/contract.png') ?>"
									title="Ver meu contrato " class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Contrato</figcaption>
							</figure>
						</div>

					</div>

					<br> <br>



					<div class="row">

						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{ATIVIDADE}"> <img
									src="<?php echo base_url('assets/img/test.png') ?>"
									title="Envie sua atividade complementar" class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Ativ. Comp</figcaption>
							</figure>
						</div>

						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{OUVIDORIA}"> <img
									src="<?php echo base_url('assets/img/sac.png') ?>"
									title="ouvidoria da nortesul" class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Ouvidoria</figcaption>
							</figure>
						</div>

						<div class="col-sm-3 col-xs-6">
							<figure class="float">
								<a href="{SOLCURSOS}"> <img
									src="<?php echo base_url('assets/img/pedido-cursos.png') ?>"
									title="ouvidoria da nortesul" class="img-responsive" width="64"
									height="64">
								</a>
								<figcaption>Soli. Cursos</figcaption>
							</figure>
						</div>

					</div>
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
						uma foto para miniatura </span><br> <br> <input type="file"
						id="imagem" name="fotos[]" /> <br> <br>

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

<style type="text/css">

.float figcaption{
	padding-top: 5px;
	font-weight: bold;
	color: #737373;
}
.edit-form a:hover{
	text-decoration: none;
}
.edit-form button{
	background: #00C69C;
}

.edit-form button:hover{
	
	background: #01a783;
}
</style>
