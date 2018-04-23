
<div class="">
	<div class="col-lg-12">
		<div class="col-sm-12">
			<div class="page-title">
				<div class="title_left">
					<h3>
						<small>Definir forma de pagamento para os cursos - {ACAO}</small>
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
					<input type="hidden" name="codformapagamento"
						id="codformapagamento" value="{codformapagamento}">
					<div class="form-group">
						<label class="control-label" for="nomeformapagamento">Nome <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control" id="nomeformapagamento"
								name="nomeformapagamento" value="{nomeformapagamento}"
								required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="maximoparcelasformapagamento">Máximo
							de Parcelas <span class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control"
								id="maximoparcelasformapagamento"
								name="maximoparcelasformapagamento"
								value="{maximoparcelasformapagamento}" required="required"
								class="set-integer">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="descontoformapagamento">Desconto:</label>
						<div class="controls">
							<input type="text" class="form-control"
								id="descontoformapagamento" name="descontoformapagamento"
								value="{descontoformapagamento}" class="set-numeric">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="tipoformapagamento">Tipo de
							Forma:</label>
						<div class="controls">
							<select class="form-control" id="tipoformapagamento"
								name="tipoformapagamento">
								<option value="1"{sel_tipoformapagamento1}>Boleto</option>
								<option value="2"{sel_tipoformapagamento2}>Cartão de Crédito</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 col-sm-6 col-xs-12 control-label"
							for="habilitaformapagamento">Habilitar no site: </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="checkbox">
								<label> <input type="checkbox" id="habilitaformapagamento" class="flat"
									name="habilitaformapagamento" value="S"{chk_habilitaformapagamento}> Ativo
								</label>
							</div>

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
