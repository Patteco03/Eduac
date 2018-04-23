<div class="wrapper">


	<div class="centro-form">
		<h1>Seja bem-vindo a nossa plataforma</h1>
		<form class="form" action="{URLVALIDACONTA}" method="post">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="senha" placeholder="Senha">
			<button type="submit" id="login-button">Entrar</button>
			<br><br><br>
		<div class="co" style="z-index:9;">
			<a href="<?php echo ci_site_url('conta/recuperarsenha') ?>" > Esqueci minha senha</a>
		</div>
		</form>

	

	</div>

	<br><br><br>
	<div class="col-md-12" style="z-index: 9;"> <center> Não é cadastrado ? <a href="<?php echo ci_site_url('conta/novaconta') ?>"> Cadastrar </a> </center></div>


	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>

	<style type="text/css">
   
   .centro-form form input {
          appearance: none;
  outline: 0;
  border: 1px solid rgba(255, 255, 255, 0.4);
  background-color: rgba(255, 255, 255, 0.2);
  width: 250px;
  border-radius: 3px;
  padding: 10px 15px;
  margin: 0 auto 10px auto;
  display: block;
  text-align: center;
  font-size: 18px;
  color: white;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
  font-weight: 300;
}
.centro-form form input:hover {
  background-color: rgba(255, 255, 255, 0.4);
}
.centro-form form input:focus {
  background-color: white;
  width: 300px;
  color: #53e3a6;
}
.centro-form form button {
          appearance: none;
  outline: 0;
  background-color: white;
  border: 0;
  padding: 10px 15px;
  color: #53e3a6;
  border-radius: 3px;
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  transition-duration: 0.25s;

}
.centro-form form button:hover {
  background-color: #f5f7f9;
} 
  </style>