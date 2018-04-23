<section class="conteudo-single">

	<div class="container-fluid">

		<div class="row-fluid">

			<div class="col-md-2">
				<img class="img-responsive" src="{FOTOPRINCIPAL}" alt="{NOMEPRODUTO}" title="{NOMEPRODUTO}">
			</div>

			<div class="col-md-8 title-ficha">
				<h5>{NOMEPRODUTO}</h5>
				<span class=""><i class="fa fa-clock-o" aria-hidden="true"></i> Duração:  {DURACAO} Meses</span>
				<br>
				<!-- Nav tabs --><div class="card">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#descricao" aria-controls="descricao" role="tab" data-toggle="tab">Descrição</a></li>
						<li role="presentation"><a href="#ficha" aria-controls="ficha" role="tab" data-toggle="tab">Ficha</a></li>
						<li role="presentation"><a href="#corpodocente" aria-controls="corpodocente" role="tab" data-toggle="tab">Corpo Docente</a></li>
						<li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="descricao">{DESCRICAOBASICA}.</div>
						<div role="tabpanel" class="tab-pane" id="ficha">{DESCRICAOCOMPLETA}.</div>
						<div role="tabpanel" class="tab-pane" id="corpodocente">{BLC_PROFESSORES}
							<div class="col-sm-4 col-xs-12">
								<center> 
									<img src="{IMG}" class="img-responsive" width="100" height="100" alt="{NOMEPROFESSOR}">
									<h5 style="font-size: 1.5em;"> {NOMEPROFESSOR}</h5>
									<span class="disciplinaProfessor">{DISCIPLINA}</span>
								</center>
							</div>	
						{/BLC_PROFESSORES}</div>
						<div role="tabpanel" class="tab-pane" id="faq"></div>
					</div>
				</div>

				<div id="share"></div>

			</div>

			<div class="col-md-2">

				<form action="<?php echo ci_site_url('carrinho/adicionar') ;?>" method="post"> 
					<input type="hidden" value="{CODPRODUTO}" name="codproduto">

					<article style="background: #EEEEEE;padding: 48px 0px 0px;">
						<center> 
							Curso: {NOMEPRODUTO}
							<br>
							{BLC_PRECOPROMOCIONAL} <span>de R$ {VALORANTIGO} por</span>
							{/BLC_PRECOPROMOCIONAL}  <span> <i> à vista por R$</i> {VALOR} </span> 
							<br>
						</center>	

						<div class="button-oos" style="padding-top: 20px;text-align: center;">
							<button type="submit" class='ph-button ph-btn-green' style="width: 100%;">Comprar <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
						</div>

					</article>

				</form>

				<br><br>
			<!-- 
			contact form created for treehouse competition.
		-->	
		<form method="post" id="contact" action="<?php echo ci_site_url('produto/EnviarEmail') ;?>">

			<?php if ($this->session->flashdata('success') == TRUE): ?>
				<div><?= $this->session->flashdata('success'); ?></div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('error') == TRUE): ?>
				<div><?= $this->session->flashdata('error'); ?></div>
			<?php endif; ?>

			<center> <span>Dúvidas sobre o curso ?</span></center>
			<input type="text" name="name" placeholder="Name" required="required" /><br />
			<input  type="email" name="email" placeholder="Email" required="required" /><br />
			<input  type="text" name="numero" placeholder="(68) 99999-9999"  required="required"/><br />
			<div class="message">Message Sent</div>
			<button id="submit" type="submit">
				Enviar!
			</button>

		</form>



	</div>

</div>

<div class="slide-relacionados-single">

	<div class="col-md-12" style=";padding-top: 40px;">

		<CENTER><h5 class="cr-relacionados">Cursos Relacionados:</h5></CENTER> <br>

		<div class="owl-carousel owl-theme list-cursos-rela">
			{BLC_CURSOSPRESENCIAIS}

			<div class="slide">

				<form action="<?php echo ci_site_url('carrinho/adicionar') ;?>" method="post"> 
					<input type="hidden" value="{CODPRODUTO}" name="codproduto">

					<article>

						<figure>
							<a href="{URLPRODUTO}" title="{NOMEPRODUTO}"><center>
								<img class="img-responsive" src="{URLFOTO}"
								alt="{NOMEPRODUTO}">
							</center> </a>
						</figure>

						<div class="list-cursos-descricao">
							<p>{FICHAPRODUTO}</p>
						</div>
						<div class="col-sm-12" class="block-preco">
							{BLC_PRECOPROMOCIONAL} 
							<span class="valorantigo"> <i> de R$ {VALORANTIGO} </i> </span> <br>
							{/BLC_PRECOPROMOCIONAL}  
							<span class="numvezes"> até 12X de R$ {VALORPR} </span><br>
							<span class="valorAu"> ou à vista por R$ {VALOR}  </span><br><br>
						</div>

						<div class="ph-float">
							<button type="submit" class='ph-button ph-btn-green'>Comprar <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
						</div>

					</article>

				</form>

			</div>

			{/BLC_CURSOSPRESENCIAIS}	
		</div>

	</div>	

</div>

</div>

</section>

<script>
	$("#share").jsSocials({
		shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
	});
</script>