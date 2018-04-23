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
                            <li><a href="#">Produto</a></li>
                            <li class="active">Adicionar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="buttons">
                        <form action="{ACAOFORM}" method="post" class="form-horizontal">
                         <input type="hidden" name="id" id="id" value="{id}">
                         <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="form-group">
                                        <label for="nome" class="form-control-label">Nome da Permissão: </label>
                                        <input name="nome" type="text" id="nome" class="form-control" required="required" value="{role}" />
                                    </div>

                                    <div class="form-group"> 
                                       <label>
                                        <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                                        <span class="lbl"> Marcar Todos</span>
                                    </label>

                                </div>

                            </div>
                            <div class="card-body">
                                <div class="control-group">
                                    <label for="documento" class="control-label"></label>
                                    <div class="controls">

                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vCliente" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar Cliente</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aCliente" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar Cliente</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eCliente" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar Cliente</span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label>
                                                            <input name="dCliente" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir Cliente</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr><td colspan="4"></td></tr>
                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vProduto" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar Produto</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aProduto" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar Produto</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eProduto" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar Produto</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="dProduto" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir Produto</span>
                                                        </label>
                                                    </td>

                                                </tr>
                                                <tr><td colspan="4"></td></tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar Serviço</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aServico" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar Serviço</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eServico" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar Serviço</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="dServico" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir Serviço</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr><td colspan="4"></td></tr>
                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar OS</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aOs" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar OS</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eOs" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar OS</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="dOs" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir OS</span>
                                                        </label>
                                                    </td>

                                                </tr>
                                                <tr><td colspan="4"></td></tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar Venda</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aVenda" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar Venda</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eVenda" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar Venda</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="dVenda" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir Venda</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr><td colspan="4"></td></tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar Arquivo</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar Arquivo</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar Arquivo</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir Arquivo</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr><td colspan="4"></td></tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                            <span class="lbl"> Visualizar Lançamento</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Adicionar Lançamento</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Editar Lançamento</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Excluir Lançamento</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr><td colspan="4"></td></tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="rCliente" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Relatório Cliente</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="rServico" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Relatório Serviço</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="rOs" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Relatório OS</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="rProduto" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Relatório Produto</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="rVenda" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Relatório Venda</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Relatório Financeiro</span>
                                                        </label>
                                                    </td>
                                                    <td colspan="2"></td>

                                                </tr>
                                                <tr><td colspan="4"></td></tr>

                                                <tr>

                                                    <td>
                                                        <label>
                                                            <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Configurar Usuário</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Configurar Emitente</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Configurar Permissão</span>
                                                        </label>
                                                    </td>

                                                    <td>
                                                        <label>
                                                            <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                                            <span class="lbl"> Backup</span>
                                                        </label>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- .buttons -->

        </div><!-- .row -->
    </div><!-- .animated -->
        </div><!-- .content -->