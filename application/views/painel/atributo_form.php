<div class="">
	<div class="col-lg-12">
		<div class="col-sm-12">
			<div class="page-title">
				<div class="title_left">
					<h3>
						<small>Definição e Configuração dos Planos e Assinaturas - {ACAO}</small>
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
		<div class="col-md-4">
			<div class="x_panel">
				<form action="{ACAOFORM}" method="post" class="form-horizontal">
					<input type="hidden" name="codatributo" id="codatributo"
						value="{codatributo}">
					<div class="form-group">
						<label class="control-label" for="nomeatributo">Nome <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control" id="nomeatributo"
								name="nomeatributo" value="{nomeatributo}" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="codtipoatributo">Escolha uma
							Categoria de Curso:</label>
						<div class="controls">
							<select name="codtipoatributo" class="form-control"
								id="codtipoatributo" class="required">
								<option value="">Selecione o tipo do atributo</option>
								{BLC_TIPOATRIBUTOS}
								<option value="{CODTIPOATRIBUTO}"{sel_codtipoatributo}>{NOME}</option>
								{/BLC_TIPOATRIBUTOS}
							</select>
						</div>
					</div>
					<div class="salvar">
						<button type="submit" class="btn">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
