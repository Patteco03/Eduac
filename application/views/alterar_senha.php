
<div class="grid">
	<div class="row">
		<div class="col-md-5 con-cadastro" style="padding: 10px 0px;">
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="<?php echo site_url('portal') ?>">Início</a></li>
				<li class="active"><span>Alterar senha</span></li>
			</ol>

			<form  id="login-form" action="<?php echo site_url('portal/validanovasenha') ?>" method="post" class="form-horizontal"
			id="myform">
			<input type="hidden" name="codcomprador" id="codcomprador"
			value="{codcomprador}">

			<br><br>
			<div class="versenha">
				<div class="form-group">
					<label  class="control-label col-sm-3 col-xs-12"
					for="senhaatual">Senha Atual: *</label>
					<div class="controls col-sm-9 col-xs-12"> 
						<input type="password" class="form-control" required="required"  id="senhaatual"
						name="senhaatual" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12"
					for="novasenha">Nova senha: *</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="password" class="form-control" required="required" id="myPassword"
						name="novasenha" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3 col-xs-12"
					for="confirmarsenha">confirmar senha: *</label>
					<div class="controls col-sm-9 col-xs-12">
						<input type="password" class="form-control" required="required" id="confirm_password"
						name="confirmarsenha" value="">
					</div>
				</div>
			</div>
			<div class="salvar-conta col-sm-3 col-xs-12">
				<button type="submit" class="btn btn-primary" name="btn-login" id="btn-login">Enviar</button>
			</div>

		</form>

	</div>
</div>
</div>



<style type="text/css">

.con-cadastro {
	color: white;
}


.conteudo{
	background: #50a3a2;
	background: linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
	background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
	font-family: 'Source Sans Pro', sans-serif;
	color: white;
	font-weight: 300;
	padding: 0px 15px;

}

</style>