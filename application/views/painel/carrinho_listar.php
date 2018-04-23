        <div class="breadcrumbs">
        	<div class="col-sm-4">
        		<div class="page-header float-left">
        			<div class="page-title">
        				<h1>Dashboard</h1>
        			</div>
        		</div>
        	</div>
        	<div class="col-sm-8">
        		<div class="page-header float-right">
        			<div class="page-title">
        				<ol class="breadcrumb text-right">
        					<li><a href="#">Dashboard</a></li>
        					<li><a href="active">Formas de Pagamento</a></li>
        				</ol>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="content mt-3">
        	<div class="animated fadeIn">
        		<div class="row">

        			<div class="col-md-12">
        				<div class="card">
        					<div class="card-header">
        						<strong class="card-title">LISTA DE FORMAS DE PAGAMENTO</strong>
        					</div>
        					<div class="card-body">
        						<table id="bootstrap-data-table" class="table table-striped table-bordered">
        							<thead>
        								<td>Código do Pedido</td>
        								<td>Data</td>
        								<td>Valor</td>
        								<td>Produto Soli.</td>
        								<td>Nome Cliente</td>
        								<td>Situacao</td>
        							</thead>
        							<tbody>
        								{BLC_DADOS}
        								<tr>
        									<td><a href="{URLRESUMO}">{CODPEDIDO}</a></td>
        									<td><a href="{URLRESUMO}">{DATA}</a></td>
        									<td><a href="{URLRESUMO}">{VALOR}</a></td>
        									<td><a href="{URLRESUMO}">{PRODUTO}</a></td>
        									<td><a href="{URLRESUMO}">{NOMECOMPRADOR}</a></td>
        									<td><a href="#" id="ativo" class="btn-xs btn btn-{BTNINFO}">{STATUS}</a></td>
        								</tr>
        								{/BLC_DADOS}
        								{BLC_SEMDADOS}
        								<tr>
        									<td colspan="3" class="alinha-centro">Não há dados</td>
        								</tr>
        								{/BLC_SEMDADOS}
        							</tbody>
        						</table>
        					</div>
        				</div>
        			</div>


        		</div>
        	</div><!-- .animated -->
        </div><!-- .content -->

