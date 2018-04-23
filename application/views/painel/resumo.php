<div class="row-fluid">
	<div class="col-md-12 x_panel">
		<legend>Resumo do Pedido: {CODCARRINHO}</legend>
	</div>
</div>
<div class="row-fluid">
	<div class="col-md-12 x_panel">
		<table>
			<tr>
				<td>Data:</td>
				<td>{DATA}</td>
			</tr>
			<tr>
				<td>Valor:</td>
				<td>{VALORFINALCOMPRA}</td>
			</tr>
		</table>
		<hr>
		<h3>Dados Pessoais</h3>
		<table>
			<tr>
				<td>Comprador:</td>
				<td>{NOMECOMPRADOR}</td>
			</tr>
			<tr>
				<td>Endereço:</td>
				<td>{ENDERECOCOMPRADOR} / {CEPCOMPRADOR}</td>
			</tr>
			<tr>
				<td>Cidade:</td>
				<td>{CIDADECOMPRADOR} / {UFCOMPRADOR}</td>
			</tr>
		</table>
		<form action="{URLSITUACAO}" method="post" class="form-inline">
			<input type="hidden" name="codcarrinho" value="{CODCARRINHO}">
			<select name="situacao">
				<option value="1" {SITUACAO_1}>Pagamento confirmado</option>
				<option value="2" {SITUACAO_2}>Aguardando Pagamento</option>
				<option value="3" {SITUACAO_3}>Pagamento recusado</option>
				<option value="4" {SITUACAO_4}>Cancelado</option>
			</select>
			<button class="btn btn-success">Atualizar</button>
		</form>
		<hr>
		<table>
			<h3>Forma de Pagamento</h3>
			<tr>
				<td>Forma Pagamento:</td>
				<td>{NOMEFORMAPAGAMENTO}</td>
			</tr>
			<tr>
				<td>Número de Parcelas:</td>
				<td>{PARCELAS}x</td>
			</tr>
			<tr>
				<td>Desconto:</td>
				<td>de R$ {DESCONTO} </td>
			</tr>
		</table>
		<form action="{URLFORMAPAGAMENTO}" method="post" class="form-inline">
			<input type="hidden" name="codcarrinho" value="{CODCARRINHO}">
			<select name="formapagamento">
				<option value="">Selecione uma forma de pagamento</option>
				{BLC_FORMADEPAGAMENTO}
				<option value="{codformapagamento}"{sel_tipoformapagamento}>{NOME} {PARCELAS}x - Desconto de R$ {DESCONTO}</option>
				{/BLC_FORMADEPAGAMENTO}	
			</select>
			<button class="btn btn-success">Alterar</button>
		</form>
		<hr>
		<table class="table">
			<thead>
				<td>Produto</td>
			</thead>
			<tbody>
				{BLC_DADOS}
				<tr>
					<td>{NOMEPRODUTO}</td>
				</tr>
				{/BLC_DADOS}
			</tbody>
		</table>
	</div>
</div>

