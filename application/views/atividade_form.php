

<div class="container-fluid ">

	<div class="row-fluid">

		<div class="col-lg-12 conteudo">
		
		<h3 class="title-carrinho">Atividades</h3>
		
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="{PORTALDOALUNO}">Portal do Aluno</a></li>
				<li class="active"><span>Minhas Atividades</span></li>
			</ol>

			<div class="col-md-12">



			<div class="pull-right">
				  <!-- Large modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal"
						data-target=".bs-example-modal-lg">Nova atividade</button>
			</div>

			<main>
				<div class="block-atividades">
		            {BLC_LINHA}
		            <div class="block">
		                {BLC_COLUNA}
		                <div class="block-img">
			                <center><a href="{URL}" target="_blank" title="{NOME}"> <img src="{IMAGEMDESTACADA}" alt="{NOME}" /> </a> </center>
			                </div>		        
				                <div class="block-desc">
				                    <h5 class="alinha-centro">Nome: {NOME}</h5>
				                    <h5 class="alinha-centro">Referencia aula: {AULA}</h5>
				                    <h5 class="alinha-centro">Data envio: {DATA}</h5>

				                    <div class="delete">
				                    	<!-- <a href="{URLEXCLUIR}"> <button class="glyphicon glyphicon-trash"> </button> </a> -->
				                    </div>
				                </div>			  
		                {/BLC_COLUNA}
		            </div>
		            {/BLC_LINHA}
		            <div class="col-sm-12 col-xs-12">
				
							{BLC_SEMDADOS}
							<h5>Nao possui atividades ainda</h5> 
							{/BLC_SEMDADOS}
					</div>
	        	</div>
			</main>
			<br><br><br><br>
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



		<div class="modal fade bs-example-modal-lg" tabindex="-1"
			role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">×</span>
						</button>
						<h5 class="modal-title" id="myModalLabel">Nova atividade</h5>
					</div>
					<div class="modal-body">
						<form action="{SALVARATIVIDADE}" method="post" class="form-horizontal" enctype="multipart/form-data">
							<input type="hidden" name="codcomprador" id="codcomprador"
								value="{codcomprador}">
								<input type="hidden" name="codatividade" id="codatividade"
								value="">
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12"
								for="nomeatividade">Nome: </label>
							<div class="controls col-md-4 col-sm-4 col-xs-12">
								<input type="text" class="form-control" id="nomeatividade"
									name="nomeatividade" value="{nomeatividade}"
									placeholder="Digite o nome para a atividade" required="required">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4 col-sm-4 col-xs-12"
								for="selectaula">Selecione o curso <span class="required">*</span>:
							</label>
							<div class="controls col-md-4 col-sm-4 col-xs-12">
								<select name="codcurso" class="form-control" id="codcurso" class="set-cursoselect">
									<option value="">Não especificado</option> 
									{BLC_CURSO}
									<option value="{CODPRODUTO}"{sel_codproduto}>{NOME}</option>
									{/BLC_CURSO}
								</select>
							</div>
						</div>
						<div class="form-group" id="form-aulas">
							<label class="control-label col-md-4 col-sm-4 col-xs-12"
								for="selectaula">Selecione a aula <span class="required">*</span>:
							</label>
							<div class="controls col-md-4 col-sm-4 col-xs-12">
								<select name="codmodulo" class="form-control" id="codmodulo"  class="set-cursoselectmodulo">
									<option value="">Não especificado</option> 
								</select>
							</div>
						</div>
						<div class="form-group" id="formato-aula">
							<label for="tipo-aula" for="filename" class="control-label col-md-4 col-sm-4 col-xs-12">Arquivo: </label>
							<div class="controls col-md-4 col-sm-4 col-xs-12">
								<div id="div-storage">
									<div class="form-group">
										<input type="file" name="filename" id="filename" />
									</div>
								</div>
							</div>
						</div>
							
						<center> <button type="submit" class="btn btn-primary" name="upload" value="salvar">Salvar</button> </center>

					</form>

					</div>
					<div class="modal-footer">
					
					</div>

				</div>
			</div>
		</div>

<style type="text/css">
.title-carrinho {
	font-size: 40px;
}	

.block-atividades {
    display: flex;
    flex-wrap: wrap;
    max-width: 1280px;
    width: 100%;
    margin: 50px auto;
}

.block {
    width: calc(100%/3 - 20px);
    margin: 10px;
    border: 1px solid #ccc;
    box-shadow: 2px 2px 4px 0px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
}

.block-img {
    height: calc(((100vw - (100vw - 900px))/3 - 20px) /2);
    flex: 0 0 auto;
    padding: 10px;
}

.block-desc {
    padding: 15px;
    flex-grow: 1;
    flex-shrink: 1;
    flex-basis: auto;
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
