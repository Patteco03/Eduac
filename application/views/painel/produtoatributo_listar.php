
<legend>
	<!-- Breadcrumbs -->
	<ol class="breadcrumb my-3">
		<li class="breadcrumb-item"><a href="<?php echo ci_site_url('painel');?>">Dashboard</a></li>
		<li class="breadcrumb-item active">Atributos do Produto: {NOMEPRODUTO}
		</li>
	</ol>

	<div class="pull-right" style="padding-bottom: 40px;">
		<a href="{URLLISTAR}" title="Listar produtos" class="btn btn-info">Listar</a>
	</div>
</legend>
<form action="{URLSALVAATRIBUTO}" method="post">
	<input type="hidden" name="codproduto" value="{CODPRODUTO}">
	<h5>Planos e Assinaturas Vinculados</h5>
	<table class="table table-bordered table-condensed">
		<tr>
			<th style="width: 80px;">Referência</th>
			<th class="text-center">Descrição</th>
			<th class="text-center" style="width: 80px;">Preço</th>
			<th class="text-center" style="width: 240px;">Valor Promocional</th>
			<th class="coluna-acao text-center">Remover</th>
		</tr>
		{BLC_SEMVINCULADOS}
		<tr>
			<td colspan="6">Não há planos vinculados.</td>
		</tr>
		{/BLC_SEMVINCULADOS} 
		
		{BLC_VINCULADOS}
		<tr>
			<td><input type="text" class="form-control input input-small"
				name="sku[{CODSKU}][referencia]" value="{REFERENCIA}"></td>
			<td class="text-center">{DESCRICAO}</td>
			<td class="text-center">{VALOR}</td>
			<td class="text-center">{VALORPROMOCIONAL}</td>
			<td ><input type="checkbox" name="sku[{CODSKU}][remover]" value="S"></td>	
		</tr>
		{/BLC_VINCULADOS}
	</table>

	<h5>Planos Disponíveis</h5>

	<table class="table table-bordered table-condensed">
		<tr>
			<th class="text-center" style="width: 80px;">Referência</th>
			<th class="text-center">Descrição</th>
			<th class="text-center" style="width: 240px;">Valor</th>
			<th class="text-center" style="width: 240px;">Valor Promocial</th>
		</tr>
		{BLC_SEMDISPONIVEIS}
		<tr>
			<td colspan="6">Não há planos para este curso.</td>
		</tr>
		{/BLC_SEMDISPONIVEIS} 
		{BLC_DISPONIVEIS}
		<tr>
			<td><input type="text" class="input input-small"
				name="atributo[{CODATRIBUTO}][referencia]" value=""></td>
			<td class="text-center">{DESCRICAO}</td>
			<td class="text-center">R$ {VALOR}</td>
			<td class="text-center">R$ {VALORPROMOCIONAL}</td>
			
		</tr>
		{/BLC_DISPONIVEIS}
	</table>

	<div class="well">
		<button type="submit" class="btn">Salvar</button>
	</div>
</form>