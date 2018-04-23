
<div class="container-fluid ">

	<div class="row-fluid">

		<div class="col-lg-12 conteudo">
		
		<h3 class="title-carrinho">Portal do Aluno - Financeiro</h3>
		
			<ol class="breadcrumb breadcrumb-arrow">
				<li><a href="{PORTALDOALUNO}">Portal do Aluno</a></li>
				<li class="active"><span>Financeiro</span></li>
			</ol>

			<div class="col-md-12">

				 <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   		<th>Cod. Compra</th>
                    	<th>Curso</th>
                      	<th>valor</th>
                        <th>Data</th>
                        <th>Situação</th>
                        <th>Forma de Pagamento</th>
                   </thead>
   				    <tbody>
					    {BLC_SELECTPRODUTO}
					    <tr>
							    <td>{CODCOMPRA}</td>
							    <td>{NOME}</td>
							    <td>{VALORCOMPRA}</td>
							    <td>{DATAHORA}</td>
							    <td>{SITUACAO}</td>
							    <td>{FORMADEPAGAMENTO}</td>
					    </tr>
					    {/BLC_SELECTPRODUTO}
					    
					     {SEM_BLCDADOS}
					     <td colspan="5">
					     	<div class="center">Não possui cursos ainda</div>
					     </td>
					     {/SEM_BLCDADOS}  
    				</tbody>

				</table>

			</div>


		</div>

	</div>

</div>

<style type="text/css">
.title-carrinho {
	font-size: 40px;
}
</style>