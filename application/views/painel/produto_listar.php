        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="buttons">
                                <a href="{URLADICIONAR}"><button class="btn btn-success"><i class="fa fa-plus"></i> Novo curso</button></a>

                                <a href="{URLFILTRO}"><button class="btn btn-info"><i class="fa fa-filter"></i> Filtros</button></a>
                            </div>


                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Administrar</th>
                                    <th class="coluna-acao text-center">Excluir / Editar</th>
                                </tr>
                                {BLC_DADOS}
                                <tr>
                                    <td>{CODPRODUTO}</td>
                                    <td><img src="{IMAGEMDESTACADA}" alt="Imagem" width="60" height="60"></td>
                                    <td>{NOME}</td>
                                    <td><a href="{URLVIDEO}">Ver material</a></td>
                                    <td>
                                        <a href="{URLEXCLUIR}"
                                        onclick="return confirm('Deseja realmente ')"><button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button></a>
                                        <a href="{URLEDITAR}"><button class="btn btn-info"><i
                                            class="fa fa-pencil"></i> Editar</button></a>
                                        </td>
                                    </tr>
                                    {/BLC_DADOS}
                                    {BLC_SEMDADOS}
                                    <tr>
                                        <td colspan="3" class="alinha-centro">Não há dados</td>
                                    </tr>
                                    {/BLC_SEMDADOS}
                                </table>
                                <div class="pagination pull-right">
                                    <ul>
                                        <li class="{HABANTERIOR}"><a href="{URLANTERIOR}">&laquo;</a></li>
                                        {BLC_PAGINAS}
                                        <li class="{LINK}"><a href="{URLLINK}">{INDICE}</a></li>
                                        {/BLC_PAGINAS}
                                        <li class="{HABPROX}"><a href="{URLPROXIMO}">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

