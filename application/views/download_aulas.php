
<div class="container">

	<div class="row">

		<div class="col-lg-12 conteudo">

			<h3 class="title-carrinho">Portal do Aluno - Download </h3>

			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="{PORTALDOALUNO}">Portal do Aluno</a></li>
				<li class="active"><span>Download Cursos</span></li>
			</ol>

			<div class="col-md-12">
				
				<h2>Meus cursos</h2>
				{BLC_DADOS}
				<button class="accordion">{i}-{nomecurso}
					<div class="pull-right">
						<span class="glyphicon glyphicon-plus
						"></span>
					</div>
				</button>
				<div class="panel">
				<br>
				{BLC_AULAS}
					<div class="col-sm-12 col-xs-12" style="border-bottom: 1px dashed #ccc;padding: 5px 0px;">
					{NOMEMODULO}
						
						<div class="pull-right">
							<a href="{URLVERAULA}" title="{NOMEMODULO}" target="_blank"> 
								<button type="button" class="btn btn-info">Acessar link <i class="glyphicon glyphicon-arrow-right"></i></button>
							</a>
						</div>					
					 </div>
					<br>
				{/BLC_AULAS}
				
				{SEM_BLCAULAS}
					<div>
						<h5> Este curso não possui aulas ainda</h5>
					</div>
				{/SEM_BLCAULAS}
			
					
				</div>
			
				{/BLC_DADOS}
				
				{SEM_BLCDADOS}
					<div>
						<h5> Você não possui cursos ainda ou seu acesso está bloqueado, verifique com a secretaria.</h5>
					</div>
				{/SEM_BLCDADOS}
			

			</div>


		</div>

	</div>

</div>

<style type="text/css">
.title-carrinho {
	font-size: 40px;
}
</style>