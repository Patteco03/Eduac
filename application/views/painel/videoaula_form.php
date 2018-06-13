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
                            <li><a href="<?php echo site_url('painel') ?>">Dashboard</a></li>
                            <li class="active">Aulas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="buttons col-lg-8">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                        data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i> Novo Módulo
                    </button>
                </div>
                <div class="col-lg-4">
                    <div class="x_panel tile">
                        <div class="form-group">
                            <img src="{URLFOTO}" title="imagem do perfil"
                            class="img-responsive" width="150" height="150">

                            <!-- Button trigger modal -->
                            <a href="#" data-toggle="modal" data-target="#exampleModalimg">Alterar
                            imagem</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    {BLC_SEMMODULOSDISPONIVEIS}
                    <tr>
                        <center>
                            <td colspan="6" class="alinha-centro">Não há módulos ainda.</td>
                        </center>
                    </tr>
                    {/BLC_SEMMODULOSDISPONIVEIS}

                    {MODULO_TABLE}
                    <ul>
                        <li>{NOMEMODULO}
                            <div class="pull-right">

                                <a href="{IDMODULO}" id="add" class="add"
                                style="color: #fff;" data-toggle="modal"
                                data-target=".bs-upload"><span>Adicionar</span> </a>
                                <a
                                href="{URLEDITAR}" style="color: #fff;"><span
                                id="editarmodulo"
                                class="modulo-icon glyphicon glyphicon-pencil"></span>
                            </a> 
                            <a href="{URLEXCLUIR}" style="color: #fff;"><span
                                onclick="return confirm('Deseja realmente ')"
                                id="delete"
                                class="modulo-icon glyphicon glyphicon-trash"></span>
                            </a>

                        </div>
                    </li>
                </ul>
                {/MODULO_TABLE}
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->





<div class="modal fade" id="exampleModalimg" tabindex="-1" role="dialog"
aria-labelledby="exampleModalimg" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar foto destaque
            </h5>
            <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <!-- Upload  -->
        <form id="formulario" method="post" enctype="multipart/form-data"
        action="{URLUPLOADFOTO}">

        <input type="hidden" name="codproduto" value="{CODPRODUTO}"> <span>Escolha
        uma foto para miniatura </span><br> <br> <input type="file"
        id="imagem" name="fotos[]"/> <br> <br>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
    <div id="visualizar"></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

</div>
</div>
</div>
</div>