<div class="grid">
	<div class="row">
		<div class="c12">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="{PORTALDOALUNO}">Início</a></li>
				<li class="active"><span>Financeiro</span></li>
			</ol>

			<table id="mytable" class="table table-bordred table-striped">

				<thead>
					<th>Cod. Compra</th>
					<th>Curso</th>
					<th>valor</th>
					<th>Data</th>
					<th>Situação</th>
					<th>Forma de Pagamento</th>
				</thead>
				<tbody>
					{BLC_SELECTPRODUTO}
					<tr>
						<td>{CODCOMPRA}</td>
						<td>{NOME}</td>
						<td>{VALORCOMPRA}</td>
						<td>{DATAHORA}</td>
						<td>{SITUACAO}</td>
						<td>{FORMADEPAGAMENTO}</td>
					</tr>
					{/BLC_SELECTPRODUTO}

					{SEM_BLCDADOS}
					<td colspan="5">
						<div class="center">Nenhuma compra efetuada</div>
					</td>
					{/SEM_BLCDADOS}  
				</tbody>

			</table>
		</div>
	</div>
</div>