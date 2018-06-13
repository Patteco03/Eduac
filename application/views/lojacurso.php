
<div class="container-fluid no-padding ">

	<div class="row-fluid">

		<div class="col-lg-12 conteudo">

			<div class="col-md-12 cont-preparatorio">

				<div class="tab-content">	
					<div class="tab-pane active in fade" id="faq-cat-1">
						<div class="list-cursos">
							{BLC_CURSOSPRESENCIAIS}
							{BLC_COLUNA}
							
							<div class="col-md-3 col-sm-6 col-xs-12 block">	

								<form action="<?php echo site_url('carrinho/adicionar') ;?>" method="post"> 
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
										<br> 
										<div class="col-sm-12" class="block-preco">
											{BLC_PRECOPROMOCIONAL} 
											<span class="valorantigo"> <i> de R$ {VALORANTIGO} </i> </span> <br>
											{/BLC_PRECOPROMOCIONAL}  
											<span class="numvezes"> até 12X de R$ {VALORPARCELADO} </span><br>
											<span class="valorAu"> ou à vista por R$ {VALOR}  </span><br><br>
										</div>
										<div class="ph-float">
											<button type="submit" class='ph-button ph-btn-green'>Comprar <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
										</div>

									</article>

								</form>

							</div>

							
							{/BLC_COLUNA}
							{/BLC_CURSOSPRESENCIAIS}	
						</div>

					</div>

					<div class="tab-pane in fade" id="faq-cat-2">
						<div class="list-cursos">
							{BLC_CURSOSONLINE}
							{BLC_COLUNA}
							

							<div class="col-md-3 col-sm-6 col-xs-12 block">	

								<form action="<?php echo site_url('carrinho/adicionar') ;?>" method="post"> 
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
										<br> {BLC_PRECOPROMOCIONAL} <span>de R$ {VALORANTIGO} por</span>
										{/BLC_PRECOPROMOCIONAL}  <span> <i> à vista por R$</i> {VALOR}  </span> <br>

										<div class="ph-float">
											<button type="submit" class='ph-button ph-btn-green'>Comprar <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
										</div>

									</article>

								</form>

							</div>

							
							{/BLC_COLUNA}
							{/BLC_CURSOSONLINE}	
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">

						<tbody>
							{BLC_SEMDADOS}
							<tr>
								<td colspan="6" class="alinha-centro"><span>Não há cursos ainda</span></td>
							</tr>
							{/BLC_SEMDADOS}
						</tbody>
					</table>
				</div>


			</div>

		</div>

	</div>

</div>

<style type="text/css">
@media (max-width: 768px){
	.block {
		width: calc(100%/2 - 20px);
	}

}
@media (max-width: 425px){
	.block {
		width: calc(100% - 20px);
	}
}
@media (max-width: 320px){
	.block {
		width: calc(100%);
		margin: 10px 0;
		border: none;
	}
}
</style>