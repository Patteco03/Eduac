<div class="grid">
	
	<div class="row space-top">
		<!-- CONTACT FORM -->
		<div class="c8 space-top">
			<img class="imgLogin" src="https://minhabiblioteca.com.br/wp-content/uploads/2015/04/20150430-MINHA-BIBLIOTECA-Pais-alunos-e-professores-conectados-pela-tecnologia.jpg" alt="paperBlock">
		</div>
		<div class="c4 space-top formlogin">
			<h1 class="maintitle">
				<span><i class="icon-lock"></i> Acesso a plataforma</span>
			</h1>
			<div class="wrapcontact">
				<div class="done">
					<div class="alert-box success ctextarea">
						Your message has been sent. Thank you! <a href="" class="close">x</a>
					</div>
				</div>
				<form method="post" action="{URLVALIDACONTA}" id="contactform">
					<div class="form">
						<div class="c6 noleftmargin">
							<label>E-mail address</label>
							<input type="text" name="email">
						</div>
						<div class="c6 noleftmargin">
							<label>Senha</label>
							<input type="password" name="senha">
						</div>

						<input type="submit" id="submit" class="button" style="font-size:12px;" value="ENTRAR">
						<a href="#"><input type="button" id="submit" class="button" style="font-size:12px;" value="RECUPERAR SENHA"></a>
					</div>
				</form>
			</div>
			<hr>
			<div class="infocadastrp">
				<p>Não é cadastrado ainda? <a href="<?php echo site_url('conta/novaconta') ?>">Cadastrar</a></p>
			</div>
		</div>
	</div>
	</div><!-- end grid -->