
<div class="grid">
	<div class="row">
		<div class="c8">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="<?php echo site_url('portal') ?>">Início</a></li>
				<li class="active"><span>Financeiro</span></li>
			</ol>

			<form action="<?php echo site_url('portal/atualizarRegistro'); ?>" method="post" class="form-horizontal"
				id="myform">
				<input type="hidden" name="codcomprador" id="codcomprador"
				value="{codcomprador}">
				<div class="c6 noleftmargin">
					<label class="control-label" for="nomecomprador">Nome
						<span class="required">*</span>
					</label>
					<div class="controls">
						<input type="text" class="form-control" id="nomecomprador"
						name="nomecomprador" value="{nomecomprador}" required="required">
					</div>
				</div>
				<div class="c6 noleftmargin">
					<label class="control-label" for="cpfcomprador">CPF
						<span class="required">*</span>
					</label>
					<div class="controls">
						<input type="text" class="form-control" class="form-control"
						id="cpfcomprador" name="cpfcomprador" value="{cpfcomprador}"
						required="required">
					</div>
				</div>
				<div class="c3 noleftmargin">
					<label class="control-label" for="cepcomprador">CEP
						<span class="required">*</span>
					</label>
					<div class="controls">
						<input type="text" class="form-control" class="busca-cep"
						id="cepcomprador" name="cepcomprador" value="{cepcomprador}"
						required="required">
					</div>
				</div>
				<div class="c9 noleftmargin">
					<label class="control-label" for="enderecocomprador">Endereço <span class="required">*</span>
					</label>
					<div class="controls">
						<input type="text" class="form-control" id="enderecocomprador"
						name="enderecocomprador" value="{enderecocomprador}"
						required="required">
					</div>
				</div>
				<div class="c4 noleftmargin">
					<label class="control-label" for="cidadecomprador">Cidade <span class="required">*</span>
					</label>
					<div class="controls">
						<input type="text" class="form-control" id="cidadecomprador"
						name="cidadecomprador" value="{cidadecomprador}"
						required="required">
					</div>
				</div>
				<div class="c2 noleftmargin">
					<label class="control-label" for="ufcomprador">UF
						<span class="required">*</span>
					</label>
					<div class="controls">
						<select name="ufcomprador" class="form-control" id="ufcomprador">
							<option value="AC"{ufcomprador_AC}>AC</option>
							<option value="AL"{ufcomprador_AL}>AL</option>
							<option value="AP"{ufcomprador_AP}>AP</option>
							<option value="AM"{ufcomprador_AM}>AM</option>
							<option value="BA"{ufcomprador_BA}>BA</option>
							<option value="CE"{ufcomprador_CE}>CE</option>
							<option value="DF"{ufcomprador_DF}>DF</option>
							<option value="ES"{ufcomprador_ES}>ES</option>
							<option value="GO"{ufcomprador_GO}>GO</option>
							<option value="MA"{ufcomprador_MA}>MA</option>
							<option value="MT"{ufcomprador_MT}>MT</option>
							<option value="MS"{ufcomprador_MS}>MS</option>
							<option value="MG"{ufcomprador_MG}>MG</option>
							<option value="PA"{ufcomprador_PA}>PA</option>
							<option value="PB"{ufcomprador_PB}>PB</option>
							<option value="PR"{ufcomprador_PR}>PR</option>
							<option value="PE"{ufcomprador_PE}>PE</option>
							<option value="PI"{ufcomprador_PI}>PI</option>
							<option value="RJ"{ufcomprador_RJ}>RJ</option>
							<option value="RN"{ufcomprador_RN}>RN</option>
							<option value="RS"{ufcomprador_RS}>RS</option>
							<option value="RO"{ufcomprador_RO}>RO</option>
							<option value="RR"{ufcomprador_RR}>RR</option>
							<option value="SC"{ufcomprador_SC}>SC</option>
							<option value="SP"{ufcomprador_SP}>SP</option>
							<option value="SE"{ufcomprador_SE}>SE</option>
							<option value="TO"{ufcomprador_TO}>TO</option>
						</select>
					</div>
				</div>
				<div class="c6 noleftmargin">
					<label class="control-label"
					for="emailcomprador">Email <span class="required">*</span>
				</label>
				<div class="controls">
					<input type="text" class="form-control" id="emailcomprador"
					name="emailcomprador" value="{emailcomprador}"
					required="required">
				</div>
			</div>
			<div class="c4 noleftmargin">
				<label class="control-label"
				for="telefonecomprador">Telefone *</label>
				<div class="controls">
					<input type="text" class="form-control" id="telefonecomprador"
					name="telefonecomprador" value="{telefonecomprador}">
				</div>
			</div>
			<div class="c4 noleftmargin">
				<label class="control-label" for="sexocomprador">Sexo *</label>
				<div class="controls">
					<label class="radio c5"> 
						<input type="radio" name="sexocomprador" id="sexocompradorM" value="M"{sexocomprador_M}>
						Masculino
					</label> 

					<label class="radio c4"> 
						<input type="radio" name="sexocomprador" id="sexocompradorF" value="F"{sexocomprador_F}>
						Feminino
					</label>
				</div>
			</div>
			<hr>


			<div class="c2">
				<button type="submit" class="btn btn-success toggle">Atualizar</button> 
			</div>
			<div class="c4">
				<a href="{URLALTERARSENHA}"><button type="button" class="btn btn-info">Alterar senha</button></a>	
			</div>
		</form>

	</div>

	<div class="c4">
		<hr><hr>
		<div class="form-group">

			<img src="{URLFOTO}" title="imagem do perfil"
			class="img">

			<br>
			<!-- Button trigger modal -->
			<a href="#" data-toggle="modal" data-target="#exampleModal">Alterar
			imagem</a>

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
		action="<?php echo site_url('portal/salvafotoperfil') ?>">



		<input type="hidden" name="codcomprador" value="{codcomprador}"> <span>Escolha
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


