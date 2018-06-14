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
        					<li><a href="active">Cliente</a></li>
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
        						<strong class="card-title">LISTA DE CLIENTES</strong>
        					</div>
        					<div class="card-body">
        						<table id="bootstrap-data-table" class="table table-striped table-bordered">
        							<thead>
        								<tr>
        									<th>Nome</th>
        									<th>Email</th>
        									<th>CPF</th>
        									<th>Editar/Excluir</th>
        								</tr>
        							</thead>

        							<tbody>
        								{BLC_DADOS}
        								<tr>
        									<td>{NOME}</td>
        									<td>{EMAIL}</td>
        									<td>{CPF}</td>
        									<td class="alinha-centro" style="width:200px;"><a
        										href="{URLEDITAR}" class="btn btn-info btn-xs"><i
        										class="fa fa-pencil"></i> Edit </a> <a href="{URLEXCLUIR}"
        										onclick="return confirm('Deseja realmente excluir ?')"
        										class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
        									Delete </a></td>
        								</tr>
        								{/BLC_DADOS} {BLC_SEMDADOS}
        								<tr>
        									<td colspan="5" class="alinha-centro">Não há dados</td>
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

