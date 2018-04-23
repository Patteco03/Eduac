<div class="">
	<div class="x_panel">
		<div class="page-title">
			<div class="title_left">
				<h3>
					<small>{NOMEMODULO} - ({ACAO})</small>
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

		<form action="{ACAOFORM}" method="post" class="form-horizontal">
			<input type="hidden" name="codproduto" id="codproduto"
			value="{codproduto}"> <input type="hidden" name="codmodulo"
			id="codmodulo" value="{codmodulo}">
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12"
				for="tipousuario">Status: <span class="required">*</span>:
			</label>
			<div class="controls col-md-4 col-sm-4 col-xs-12">
				<select name="statusmodulo" class="form-control" id="statusmodulo">
					<option value="R"{statusmodulo_R}>Rascunho</option>
					<option value="P"{statusmodulo_P}>Publicado</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-2 col-xs-12"
			for="nomemodulo">Nome</label>
			<div class="controls col-md-4 col-sm-4 col-xs-12">
				<input type="text" class="form-control" id="nomemodulo"
				name="nomemodulo" value="{nomemodulo}"
				placeholder="Digite o nome do módulo" required="required">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2 col-sm-2 col-xs-12"
			for="nomemodulo">Descrição</label>
			<div class="controls col-md-6 col-sm-4 col-xs-12">
				<textarea class="form-control" id="descricaomodulo"
				name="descricaomodulo"
				placeholder="Digite as informações para este módulo">{descricaomodulo}</textarea>
			</div>
		</div>

		<button type="submit" class="btn btn-success">Salvar</button>

	</form>





</div>
</div>


</div>