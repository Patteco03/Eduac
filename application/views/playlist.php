<div class="grupo" style="width: 100%;height: auto;">

	<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;padding-bottom: 20px;">

		<nav class="menu-playlist lateral">

			<figure class="logo">
				<img class="img-responsive img-thumbnils" src="{URLFOTO}" alt="foto_capa" title="Foto Destaque">
			</figure>

			{MODULO_TABLE}
			<button class="accordion">{CONTADOR} - {NOMEMODULO}
				<div class="pull-right">
					<i class="fa fa-arrow-down" aria-hidden="true"></i>
				</div>
			</button>
			<div class="panel" id="menuplay">
				{BLC_CONTEUDODISPONIVEL}
				<div class="col-sm-12 col-xs-12 list-cursos-playlist" id="linkvideo">
					<li> <a href="{CONTEUDOMODULO}">  {AULANOME} </a>  </li>				
				</div> 

				{/BLC_CONTEUDODISPONIVEL}

				{BLC_SEMCONTEUDODISPONIVEL}
				<div>
					<h5> Este curso não possui aulas ainda</h5>
				</div>
				{/BLC_SEMCONTEUDODISPONIVEL}


			</div>

			{/MODULO_TABLE}

			{BLC_SEMMODULOSDISPONIVEIS}
			<div>
				<h5> Você não possui cursos ainda ou seu acesso está bloqueado, verifique com a secretaria.</h5>
			</div>
			{/BLC_SEMMODULOSDISPONIVEIS}
		</nav><!--MENU LATERAL-->

	</div>


	<div class="col-md-9 area-video">

		<main class="grupo contenido" id="contenido">    

			<section class="ventana" id="ventana">        

				<img class="loading" src="https://faculdadenortesul.com.br/home/assets/img/loading.gif">

			</section>


		</main>

	</div>

	<div class="col-md-3">

	</div>

	<div class="col-md-9">

		<div class="col-md-8 title-ficha">

			<br>
			<!-- Nav tabs --><div class="card">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#descricao" aria-controls="descricao" role="tab" data-toggle="tab">Descrição</a></li>
					<li role="presentation"><a href="#ficha" aria-controls="ficha" role="tab" data-toggle="tab">Ficha</a></li>
					<li role="presentation"><a href="#faq" aria-controls="faq" role="tab" data-toggle="tab">FAQ</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="descricao">{DESCRICAOCOMPLETA}.</div>
					<div role="tabpanel" class="tab-pane" id="ficha">{DESCRICAOBASICA}.</div>
					<div role="tabpanel" class="tab-pane" id="faq"></div>
				</div>
			</div>

		</div>

	</div>

</div><!--grupo contenedor-->


<div class="col-lg-12">

</div>	

<style type="text/css">
.conteudo{
	width: 100%;
	min-height: 600px;
	padding: 0px 0px !important;
}

.menu-playlist{
	height: auto;
	overflow: auto;
	border-left: 1px solid #d9d6d6;
	border-right: 1px solid #d9d6d6;
	border-bottom: 1px solid #d9d6d6;

}

button.accordion{
	background-color: transparent;
	color: #666666;
	cursor: pointer;
	text-transform: uppercase;
	font-family: 'Pf Prolight', sans-serif;
	padding: 10px 18px;
	width: 100%;
	text-align: left;
	border: none;
	outline: none;
	transition: 0.2s;
}

div.panel {
	padding: 0 0px;
	background: rgba(235, 235, 235, 0.37);
	overflow: -webkit-paged-x;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
	background-color: #9f2c97;
	color: #fff
}

.list-cursos-playlist li{
	padding: 10px 0px;
	margin-left: 25px;
}
.panel li a:before{
	content: "\f152";
	font-family: FontAwesome;
	font-style: normal;
	font-weight: normal;
	text-decoration: inherit;
	/*--adjust as necessary--*/
	color: red;
	font-size: 12px;
	padding-right: 0.5em;
	float: left;
	top: 8px;
	left: 0;
}
.panel li a{
	color: #929497;
	font-size: 1em;
	text-decoration: none;
	font-family: 'Pf Prolight', sans-serif;
	transition: all;
}


#linkvideo{
	border-bottom: 1px dashed #d9d6d6;
}

#linkvideo:hover li a{
	color: #fff;
	left: 5px;
}

#linkvideo:hover{
	background: #9f2c97;
}

.area-video{
	min-height: 150px;
	background: #000;
	padding-left: 0px;
	padding-right: 0px;
	height: auto;
}

.myvideo-dimensions {
	width: 100%;
	height: 600px;
}

.loading{
	position: absolute;
	left: 45%;
	top: 40%;
	display: none;
	width: 5%;
	height: auto;
}
.errolog{
	position: absolute;
	top: 40%;
	left: 40%;
	color: red;
	font-size: 30px;
}

.video-js {
	width: 100% !important;
	height: auto;
	max-height: 600px;
}
</style>