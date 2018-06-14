<div class="" style="min-height: 1000px;">
	<div class="col-lg-12">
		<div class="col-sm-12 col-xs-12">
			<div class="page-title">
				<div class="title_left">
					<h3>
						<small>Configuração de Alunos - {ACAO}</small>
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
		<div class="col-sm-4 col-xs-12">
			<div class="x_panel">
				<form action="{ACAOFORM}" method="post" class="form-horizontal">
					<input type="hidden" name="codcomprador" id="codcomprador"
						value="{codcomprador}">
					<div class="form-group">
						<label class="control-label" for="nomecomprador">Nome <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control" id="nomecomprador"
								name="nomecomprador" value="{nomecomprador}" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="cpfcomprador">CPF <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="mask-cpf form-control"
								id="cpfcomprador" name="cpfcomprador" value="{cpfcomprador}"
								required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="cepcomprador">CEP <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="mask-cep busca-cep form-control"
								id="cepcomprador" name="cepcomprador" value="{cepcomprador}"
								required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="enderecocomprador">Endereço <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control" id="enderecocomprador"
								name="enderecocomprador" value="{enderecocomprador}"
								required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="cidadecomprador">Cidade <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control" id="cidadecomprador"
								name="cidadecomprador" value="{cidadecomprador}"
								required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="ufcomprador">UF <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<select name="ufcomprador" class="form-control" id="ufcomprador">
								<option value="AC"{ufcomprador_AC}>AC</option>
								<option value="AL"{ufcomprador_AL}>AL</option>
								<option value="AP"{ufcomprador_AP}>AP</option>
								<option value="AM"{ufcomprador_AM}>AM</option>
								<option value="BA"{ufcomprador_BA}>BA</option>
								<option value="CE"{ufcomprador_CE}>CE</option>
								<option value="DF"{ufcomprador_DF}>DF</option>
								<option value="ES"{ufcomprador_ES}>ES</option>
								<option value="GO"{ufcomprador_GO}>GO</option>
								<option value="MA"{ufcomprador_MA}>MA</option>
								<option value="MT"{ufcomprador_MT}>MT</option>
								<option value="MS"{ufcomprador_MS}>MS</option>
								<option value="MG"{ufcomprador_MG}>MG</option>
								<option value="PA"{ufcomprador_PA}>PA</option>
								<option value="PB"{ufcomprador_PB}>PB</option>
								<option value="PR"{ufcomprador_PR}>PR</option>
								<option value="PE"{ufcomprador_PE}>PE</option>
								<option value="PI"{ufcomprador_PI}>PI</option>
								<option value="RJ"{ufcomprador_RJ}>RJ</option>
								<option value="RN"{ufcomprador_RN}>RN</option>
								<option value="RS"{ufcomprador_RS}>RS</option>
								<option value="RO"{ufcomprador_RO}>RO</option>
								<option value="RR"{ufcomprador_RR}>RR</option>
								<option value="SC"{ufcomprador_SC}>SC</option>
								<option value="SP"{ufcomprador_SP}>SP</option>
								<option value="SE"{ufcomprador_SE}>SE</option>
								<option value="TO"{ufcomprador_TO}>TO</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="emailcomprador">Email <span
							class="required">*</span>:
						</label>
						<div class="controls">
							<input type="text" class="form-control" id="emailcomprador"
								name="emailcomprador" value="{emailcomprador}"
								required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="telefonecomprador">Telefone:</label>
						<div class="controls">
							<input type="text" class="form-control" id="telefonecomprador"
								name="telefonecomprador" value="{telefonecomprador}">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="ufcomprador">Status<span
							class="required">*</span>:
						</label>
						<div class="controls">
							<select name="status" class="form-control" id="status">
								<option value="1"{status_1}>Ativo</option>
								<option value="0"{status_0}>Inativo</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"
							for="sexocomprador">Sexo:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label class="radio"> <input type="radio" class="flat"
								name="sexocomprador" id="sexocompradorM" value="M"{sexocomprador_M}>
								Masculino
							</label> <label class="radio"> <input type="radio" class="flat"
								name="sexocomprador" id="sexocompradorF" value="F"{sexocomprador_F}>
								Feminino
							</label>
						</div>
					</div>
					<div class="form-group">
					<label class="control-label col-sm-5 col-xs-12" for="tipo">Tenho
						interesse nos cursos :<br> <small>Seu
							nível de acesso vai mudar de acordo com com a sua escolha. </small>
					</label>
					<div class="controls col-sm-7 col-xs-12">
						<select name="tipo" class="form-control" id="tipo">
							<option value="">Todos os cursos</option>
							<option value="A"{tipo_A}>Cursos Virtuais</option>
							<option value="P"{tipo_P}>Cursos Presenciais</option>
						</select>
					</div>
				</div>
					<hr>
					<div class="form-group">
						<label class="control-label" for="senhacomprador">Senha:</label>
						<div class="controls">
							<input type="password" class="form-control" id="senhacomprador"
								name="senhacomprador" value="">
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