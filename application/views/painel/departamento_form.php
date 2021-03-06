<div class="col-lg-12">
	<div class="col-sm-12">
		<div class="page-title">
			<div class="title_left">
				<h3>
					<small>Categorias - {ACAO}</small>
				</h3>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="x_panel">
			<form action="{ACAOFORM}" method="post" class="form-horizontal">
				<input type="hidden" name="codepartamento" id="codepartamento"
					value="{codepartamento}">
				<div class="form-group">
					<label class="control-label" for="nomedepartamento">Nome <span
						class="required">*</span>:
					</label>
					<div class="controls">
						<input type="text" class="form-control" id="nomedepartamento"
							name="nomedepartamento" value="{nomedepartamento}"
							required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label" for="coddepartamentopai">Categoria
						Pai:</label>
					<div class="controls">
						<select name="coddepartamentopai" class="form-control"
							id="coddepartamentopai"{hab_coddepartamentopai}>
							<option value="">Selecione uma categoria</option>
							{BLC_DEPARTAMENTOS}
							<option value="{CODDEPARTAMENTO}"{sel_coddepartamentopai}>{NOME}</option>
							{/BLC_DEPARTAMENTOS}
						</select>
					</div>
				</div>
				<div class="salvar">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</form>

		</div>
	</div>
</div>