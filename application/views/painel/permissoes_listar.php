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
                                                <li><a href="active">Grupos e Permissoes</a></li>
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
                                                        <strong class="card-title">LISTA DE CATEGORIAS</strong>
                                                </div>
                                                <div class="card-body">
                                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                                <thead>
                                                                        <th>Código</th>
                                                                        <th>Nome</th>
                                                                        <th class="coluna-acao text-center">Editar / Excluir</th>
                                                                </thead>
                                                                <tbody>
                                                                        {BLC_DADOS}
                                                                        <tr> 
                                                                                <td>{ID}</td>
                                                                                <td>{NOME}</td>
                                                                                <td class="alinha-centro" style="width: 240px;">

                                                                                        <a href="{URLEDITAR}" class="btn btn-info btn-xs"> <i class="fa fa-pencil"></i> Edit </a> 

                                                                                        <a href="{URLEXCLUIR}" onclick="return confirm('Deseja realmente ')" class="btn btn-danger btn-xs">
                                                                                                <i class="fa fa-trash-o"></i> Delete </a></td>    
                                                                                        </tr>   

                                                                                        {/BLC_DADOS}                                
                                                                                </tbody>
                                                                        </table>
                                                                </div>
                                                        </div>
                                                </div>


                                        </div>
                                </div><!-- .animated -->
                        </div><!-- .content -->

