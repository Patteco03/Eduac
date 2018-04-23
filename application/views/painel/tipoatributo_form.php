<div class="col-lg-12">
	<div class="col-sm-12">
		<div class="page-title">
			<div class="title_left">
				<h3>
					<small> Vitrine - {ACAO}</small>
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
	<div class="col-sm-4">
		<div class="x_panel">
			<form action="{ACAOFORM}" method="post" class="form-horizontal">
				<input type="hidden" name="codtipoatributo" id="codtipoatributo"
					value="{codtipoatributo}">
				<div class="form-group">
					<label class="control-label" for="nometipoatributo">Nome <span
						class="required">*</span>:
					</label>
					<div class="controls">
						<input type="text" class="form-control" id="nometipoatributo"
							name="nometipoatributo" value="{nometipoatributo}"
							required="required">
					</div>
				</div>

				<small>Neste campo você vai ser criada a vitrine de exibição para vincular os cursos</small>

				<div class="salvar">
					<button type="submit" class="btn">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>