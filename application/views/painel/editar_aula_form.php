<div class="">
	<div class="x_panel">
		<div class="page-title">
			<div class="title_left">
				<h3>
					<small>{NOMEAULA} - ({ACAO})</small>
				</h3>
			</div>

			<div class="title_right">
				<div
					class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<a href="{URLLISTAR}" title="Voltar a Listagem"
						style="color: #fff;">
						<button type="button" class="btn btn-success">
							<span class="glyphicon glyphicon-arrow-left"></span>Voltar
						</button>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="x_panel">

		<div class="col-md-12">



				<form action="{URLUPLOAD}" class="form-horizontal" method="post"
						enctype="multipart/form-data">
						<input type="hidden" id="codmodulo" name="codmodulo" value="{CODMODULO}"
							readonly="readonly" />
						<input type="hidden" id="codarquivosmodulo" name="codarquivosmodulo" value="{CODARQUIVOS}"
							readonly="readonly" />
						<div class="form-group">
							<label for="aula" class="col-lg-2 control-label">Título</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="aula" id="aula"
									value="{NOMEAULA}" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-lg-2 control-label">Status</label>
							<div class="col-lg-3">
								<select class="form-control" id="status" name="status">
									<option value="D" {status_D}">Rascunho</option>
									<option value="A" {status_A}>Publicado</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="tipo_aula" class="col-lg-2 control-label">Conteúdo</label>
							<div class="col-lg-5">
								<select name="tipo_aula" id="tipo_aula" class="form-control"
									required="required">
									<option value="">Selecione</option>
									<optgroup label="Vídeo Aula">
										<option value="storage" {tipo_storage}>Enviar Vídeo</option>
									</optgroup>
									<optgroup label="Outros">
										<option value="pdf" {tipo_pdf}>Enviar PDF / Word / Power Point / Excel /
											Arquivos de Texto</option>
									</optgroup>
								</select>
							</div>
						</div>
						<div class="form-group" id="formato-aula">
							<label for="tipo-aula" class="col-lg-2 control-label">Aula</label>
							<div class="col-lg-10">
								<div id="div-storage">
									<div class="form-group">
										<input type="file" id="uploads" name="arquivo" />
									</div>
								</div>
								<div id="div-embed">
									<div class="form-group">
										<input type="text" class="form-control" id="embed"
											name="embed" />
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="descricao" class="col-lg-2 control-label">Descrição</label>
							<div class="col-lg-10">
								<textarea class="form-control autosize" name="descricao"
									id="descricao"
									placeholder="{descricao}">{descricao}</textarea>
							</div>
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>

					</form>



		</div>
	</div>


</div>