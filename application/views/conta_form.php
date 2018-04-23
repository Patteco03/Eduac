
<div class="container">
	<div class="row">

			<div class="col-lg-12 con-cadastro">

			<div class="col-md-4"></div>

			<div class="col-md-4">

				<div class="form-cadastro">
					<h4>{ACAO}</h4>
			<form action="{ACAOFORM}" method="post" class="form-horizontal"
				id="myform">
				<input type="hidden" name="codcomprador" id="codcomprador"
						value="{codcomprador}">
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12" for="nomecomprador">Nome
						<span class="required">*</span>
					</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" class="form-control" id="nomecomprador"
							name="nomecomprador" value="{nomecomprador}" required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12" for="cpfcomprador">CPF
						<span class="required">*</span>
					</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="text" class="form-control" class="form-control"
							id="cpfcomprador" name="cpfcomprador" value="{cpfcomprador}"
							required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12" for="cepcomprador">CEP
						<span class="required">*</span>
					</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="text" class="form-control" class="busca-cep"
							id="cepcomprador" name="cepcomprador" value="{cepcomprador}"
							required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12"
						for="enderecocomprador">Endereço <span class="required">*</span>
					</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="text" class="form-control" id="enderecocomprador"
							name="enderecocomprador" value="{enderecocomprador}"
							required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12"
						for="cidadecomprador">Cidade <span class="required">*</span>
					</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="text" class="form-control" id="cidadecomprador"
							name="cidadecomprador" value="{cidadecomprador}"
							required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12" for="ufcomprador">UF
						<span class="required">*</span>
					</label>
					<div class="controls col-sm-9 col-xs-12">
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
					<label class="control-label col-sm-3 col-xs-12"
						for="emailcomprador">Email <span class="required">*</span>
					</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="text" class="form-control" id="emailcomprador"
							name="emailcomprador" value="{emailcomprador}"
							required="required">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12"
						for="telefonecomprador">Telefone</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="text" class="form-control" id="telefonecomprador"
							name="telefonecomprador" value="{telefonecomprador}">
					</div>
				</div>
				<div class="form-group" style="display: none;">
						<label class="control-label" for="status">Status<span
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
					<label class="control-label col-sm-3 col-xs-12" for="sexocomprador">Sexo</label>
					<div class="controls col-sm-9 col-xs-12">
						<label class="radio col-xs-4 col-sm-4"> <input type="radio"
							name="sexocomprador" id="sexocompradorM" value="M"{sexocomprador_M}>
							Masculino
						</label> <label class="radio col-xs-4 col-sm-4"> <input
							type="radio" name="sexocomprador" id="sexocompradorF" value="F"{sexocomprador_F}>
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
							<option value="P"{tipo_P}>Cursos Presenciais</option>
						</select>
					</div>
				</div>
				<hr>

				<div class="{senha_view}">
					<a href="{URLALTERARSENHA}"><button type="button" class="btn btn-info">Alterar senha</button></a>	
				</div>
				<div class="{view_senha} versenha">
					<div class="form-group">
						<label class="control-label col-sm-3 col-xs-12"
							for="senhacomprador">Senha</label>
						<div class="controls col-sm-9 col-xs-12">
							<input type="password" class="form-control" id="myPassword"
								name="senhacomprador" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3 col-xs-12"
							for="senhacomprador">confirma senha</label>
						<div class="controls col-sm-9 col-xs-12">
							<input type="password" class="form-control" id="confirm_password"
								name="confirm_password" value="">
						</div>
					</div>
				</div>
				<div class="salvar-conta col-sm-3 col-xs-12">
					<button type="submit" class="btn btn-success toggle">salvar</button>
				</div>
				
			</form>
	</div>
</div>

<div class="col-md-4"></div>
			</div>	


	</div>
</div>



<style type="text/css">
	
.con-cadastro {
text-align: center;
min-height: 1300px;
padding-left: 0px;
padding-right: 0px;
color: white;
}


.conteudo{
background: #50a3a2;
background: linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);

}

.form-cadastro h4{
	font-family: 'Source Sans Pro', sans-serif;
    color: white;
    font-weight: 300;
    padding: 0px 15px;

}

</style>