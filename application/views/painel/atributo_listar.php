<div class="col-lg-12">
	<div class="col-sm-10">
		<div class="page-title">
			<div class="title_left">
				<h3>
					<small>Página de Planos de Assinaturas</small>
				</h3>
			</div>
		</div>
	</div>

	<div class="col-sm-2">
		<div class="page-title">
			<div class="title_right">
				<a href="{URLADICIONAR}" title="Adicionar novo Curso"
					style="color: #fff;">
					<button type="button" class="btn btn-success">
						<span class="glyphicon glyphicon-plus"></span>Adicionar
					</button>
				</a>
			</div>
		</div>
	</div>

	<div class="col-sm-12">
		<div class="x_panel">
			<div class="table-responsive">
				<table id="datatable-responsive"
					class="table table-striped table-bordered bulk_action">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Categorias Vinculadas</th>
							<th>Editar/Excluir</th>
						</tr>
					</thead>

					<tbody>
						{BLC_DADOS}
						<tr>
							<td>{NOME}</td>
							<td>{NOMETIPO}</td>
							<td class="alinha-centro" style="width: 240px;"><a
								href="{URLEDITAR}" class="btn btn-info btn-xs"><i
									class="fa fa-pencil"></i> Edit </a> <a href="{URLEXCLUIR}"
								onclick="return confirm('Deseja realmente ')"
								class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
									Delete </a></td>
						</tr>
						{/BLC_DADOS} {BLC_SEMDADOS}
						<tr>
							<td colspan="4" class="alinha-centro">Não há dados</td>
						</tr>
						{/BLC_SEMDADOS}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
