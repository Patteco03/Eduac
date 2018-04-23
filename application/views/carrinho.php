
<div class="container-fluid ">

	<div class="row-fluid">

		<div class="col-lg-12 conteudo">
		
			<h3 class="title-carrinho">{ACAO}</h3>

			<ul class="table-produtos">
					{BLC_PRODUTOS}
					
					<div class="col-md-12 list-carrinho"> 
						<li>
							<div class="col-md-8 col-sm-8 col-xs-12"><img class="foto-carrinho" src="{URLFOTO}" width="150" height="100"><h5>{NOMEPRODUTO}</h5></div>
							<div class="col-md-2 col-sm-2 col-xs-12 valor">R$ {VALOR}</div>
							<div class="col-md-2 col-sm-2 col-xs-12 remover">| <a href="{URLREMOVEQTD}" title="Remover"><span class="glyphicon glyphicon-remove"></span></a></div>
						<li>
					</div>	
						
					{/BLC_PRODUTOS} 
					
					{BLC_SEMPRODUTOS}
					
					<div class="col-md-12 col-sm-12 col-xs-12 carrinho-vazio"> 	
						<li>Seu carrinho está vazio.</li>
						
						<center><a href="<?php echo ci_site_url('');?>" title="ir para a loja"> <button type="button"><span style="color: #fff;" class="glyphicon glyphicon-shopping-cart"></span> Ir para loja</button></a></center>
					</div>	
					{/BLC_SEMPRODUTOS} 
					
					
					{BLC_FINALIZAR}
					
					<div class="col-md-8 contin"> 
					
						<a href="{CONTINUAR}">Continuar comprando </a>
					</div>
					
					<div class="col-md-4 pull-right finalizar">
						<div class="form-group">
							<div class="checkbox_compra col-md-12">    
								<input required="required" type="checkbox" id="confirm_contract" class="contract" style="position: absolute;">
								<label for="confirm_contract" style="text-align: center; padding-left: 2rem; font-size: 13px">Concordo com os termos do contrato.</label>
								<br>
								<a target="_blank" href="#"> <strong>Contrato de matrícula</strong></a>
								<div id="check_termo_de_responsabilidade">Para prosseguir com sua compra, marque o campo concordando com os termos do contrato</div>
							</div>
						</div>
							
							<h5>Total</h5>
							<h4>R$ {VALORTOTAL} </h4>
						<div id="weather-temp"></div>
						<p class="text-right">
								<a href="{URLFINALIZAR}" id="testcheck" title="Finalizar o carrinho de compras"> <button type="button">Finalizar </button> </a>
						</p>
					</div>
					{/BLC_FINALIZAR}
			</ul>

		</div>

	</div>

</div>