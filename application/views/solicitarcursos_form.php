

<div class="container-fluid no-padding ">

	<div class="row-fluid">

		<div class="col-lg-12 conteudo">

			<div class="col-md-12 topo-sobre">

				<ol class="breadcrumb breadcrumb-arrow">
					<li><a href="{PORTALDOALUNO}">Portal do Aluno</a></li>
					<li class="active"><span>Solicitar Cursos</span></li>
				</ol>

			</div>

			<div class="block-atividades">
				{BLC_LINHA}
				<div class="block">
					{BLC_COLUNA}
						<form action="{URLCRIACARRINHO}" method="post" id="form-criacarrinho">
							<input type="hidden" value="{CODPRODUTO}" name="codproduto">

						     <div class="block-img">
						         <a href="{URLPRODUTO}" title="{NOMEPRODUTO}">
									<img src="{URLFOTO}" alt="{NOMEPRODUTO}">
								</a>
						     </div>

						     <div class="block-desc">
						          <h5>{NOMEPRODUTO}<h5><br>
						          <span>{FICHAPRODUTO}</span>
						     </div>
						     <div class="block-tags">
						     	<span class="tag-presencial"> Presencial</span>
						     </div>
						     <div class="block-valor">
						          {BLC_PRECOPROMOCIONAL} <span>de R$ {VALORANTIGO} por</span>
									{/BLC_PRECOPROMOCIONAL} <span>R$ {VALOR}</span> <br>
						     </div>

						     <div class="comprar-presencial">
								<button id="btn-criacarrinho" type="{SUBMIT}" class="btn {BTN}">{JAADQUIRIDO}</button>
							</div>


						</form>
					{/BLC_COLUNA}	     
					</div>
				{/BLC_LINHA}

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

			<div class="col-md-12">
				<nav aria-label="Page navigation" >
					 <ul class="pagination">
						    <li class="{HABANTERIOR}"><a aria-label="Previous" href="{URLANTERIOR}"><span aria-hidden="true">&laquo;</span></a> {BLC_PAGINAS}
						    <li class="{LINK}"><a href="{URLLINK}">{INDICE}</a> {/BLC_PAGINAS}
					    	<li class="{HABPROX}"><a aria-label="Next" href="{URLPROXIMO}"><span aria-hidden="true">&raquo;</span></a>
					 </ul>
		   		</nav>
			</div>

		</div>

	</div>

</div>

</div>


<style type="text/css">
	

.block-atividades {
  	display: flex;
    flex-wrap: wrap;
    max-width: 1280px;
    width: 100%;
    margin: 30px auto;
}

.block {
    width: calc(100%/4 - 20px);
    margin: 10px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 4px 0px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
}

.block-img {
    height: calc(((100vw - (100vw - 1280px))/4 - 10px) /2);
    flex: 0 0 auto;
}

.block-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.tag-presencial{
	background: #9f2c97;
    color: #fff;
    width: 50%;
    float: left;
    text-transform: uppercase;
    padding: .2rem 1rem;
    text-align: center;
}
.block-valor{
	padding: 0px 10px;
	position: relative;
	left: 30px;
}
.block-valor span{
	font-size: 18px;
}
.block-desc {
    padding: 15px;
    flex-grow: 1;
    flex-shrink: 1;
    flex-basis: auto;
}

.block-desc h5{
	font-weight: 700;
	font-size: 20px;
}
.comprar-presencial{
	position: relative;
	padding: 20px;

}
.button-comprar{
    padding: 2px 3px 5px;
    font-size: 1.1em;
    background: #00C674 none repeat scroll 0% 0%;
    color: #FFF;
    opacity: 0.7;
    transition-duration: 0.5s;
    right: 0;
    bottom: 40px;
}
.btn-danger{
 	cursor: not-allowed;
    pointer-events: none;

    padding: 2px 3px 5px;
    font-size: 1.1em;
    background: #b75959 none repeat scroll 0% 0%;
    color: #FFF;
    opacity: 0.7;
    transition-duration: 0.5s;
    right: 0;
    bottom: 40px;

}
.comprar-presencial button:hover{
	opacity: 1;
	color: #fff;
}
 
@media (max-width: 768px){
    .block {
        width: calc(100%/2 - 20px);
    }
    .block-img {
        height: calc((100vw /2 - 20px) /2);
    }

}
@media (max-width: 425px){
    .block {
        width: calc(100% - 20px);
    }
    .block-img {
        height: calc((100vw - 20px) /2);
    }
}
@media (max-width: 320px){
    .block {
        width: calc(100%);
        margin: 10px 0;
        box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.2);
        border: none;
    }
    .block-img {
        height: calc(100vw /2);
    }
}

</style>
