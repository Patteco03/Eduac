<div class="">
    <div class="x_panel">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    <small>Video aulas - {PRODUTO}</small>
                </h3>
            </div>

            <div class="title_right">
                <div
                        class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <a href="{URLLISTAR}" title="Voltar a Listagem"
                       style="color: #fff;">
                        <button type="button" class="btn btn-success">
                            <span class="glyphicon glyphicon-arrow-left"></span>Voltar
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="panel-modulo">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <div class="x_panel tile">
                    <div class="form-group" style="padding: 40px 0px;">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab_content1"
                                                                          id="home-tab" role="tab" data-toggle="tab"
                                                                          aria-expanded="true">Conteúdo
                                        Principal</a></li>
                                <li role="presentation" class=""><a href="#tab_content2"
                                                                    role="tab" id="profile-tab" data-toggle="tab"
                                                                    aria-expanded="false">Informações</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in"
                                     id="tab_content1" aria-labelledby="home-tab">

                                    {BLC_SEMMODULOSDISPONIVEIS}
                                    <tr>
                                        <center>
                                            <td colspan="6" class="alinha-centro">Não há módulos ainda.</td>
                                        </center>
                                    </tr>
                                    {/BLC_SEMMODULOSDISPONIVEIS} {MODULO_TABLE}
                                    <div class="row" style="padding-top: 10px;">

                                        <div class="panel-group" id="accordion" role="tablist"
                                             aria-multiselectable="true">
                                            <div class="panel panel-custom">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#{URLMODULO}" aria-expanded="true"
                                                           aria-controls="collapseOne"> <i
                                                                    class="glyphicon glyphicon-plus"></i> {NOMEMODULO}

                                                            <div class="pull-right">

                                                                <a href="{IDMODULO}" id="add" class="add"
                                                                   style="color: #fff;" data-toggle="modal"
                                                                   data-target=".bs-upload"><span>Adicionar</span> </a>
                                                                <a
                                                                        href="{URLEDITAR}" style="color: #fff;"><span
                                                                            id="editarmodulo"
                                                                            class="modulo-icon glyphicon glyphicon-pencil"></span>
                                                                </a> <a href="{URLEXCLUIR}" style="color: #fff;"><span
                                                                            onclick="return confirm('Deseja realmente ')"
                                                                            id="delete"
                                                                            class="modulo-icon glyphicon glyphicon-trash"></span>
                                                                </a>

                                                            </div>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="{IDMODULO}" class="panel-collapse collapse"
                                                     role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        {BLC_CONTEUDODISPONIVEL}

                                                        <div class="list col-md-12">

                                                            <form>
                                                                <div class="col-sm-8">
                                                                    <input type="hidden" id="codarquivosmodulo"
                                                                           name="codarquivosmodulo" value="{CODARQUIVO}"
                                                                           readonly="readonly"/>
                                                                    <h5>{AULANOME}</h5>

                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <a data-id="{CODARQUIVO}"
                                                                       class="btn btn-info btn-xs editar"> <i
                                                                                class="fa fa-pencil"></i> Edit
                                                                    </a> <a class="btn btn-danger btn-xs deletar"
                                                                            data-id="{CODARQUIVO}"> <i
                                                                                class="fa fa-trash-o"></i>
                                                                        Delete
                                                                    </a> <a href="{URLVER}" target="_blank"
                                                                            id="popveraula"
                                                                            class="btn btn-success btn-xs"><i
                                                                                class="fa fa-reply"></i>
                                                                        Ver </a>
                                                                </div>
                                                            </form>

                                                            <br>

                                                        </div>
                                                        {/BLC_CONTEUDODISPONIVEL}

                                                        {BLC_SEMCONTEUDODISPONIVEL}
                                                        <div>

                                                            <h5>Não há cursos ainda.</h5>

                                                        </div>
                                                        {/BLC_SEMCONTEUDODISPONIVEL}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {/MODULO_TABLE}

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                     aria-labelledby="profile-tab">
                                    <div class="informacoes-sobre-cursos">
                                        {BLC_INFORMACOES}
                                        <ul>
                                            <li>Nome: {NOMECURSO}</li>
                                            <li>Resumo: {RESUMO}</li>
                                            <li>Duração do Curso: {DURACAO}</li>
                                            <li>Data Inicio: {DATAINICIO}</li>
                                            <li>Data Final: {DATAFINAL}</li>
                                            <li>Valor: {VALOR}</li>
                                        </ul>
                                        {/BLC_INFORMACOES}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Large modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bs-example-modal-lg">Novo Módulo
                    </button>
                </div>
            </div>

            <div class="col-sm-4 col-xs-12">
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


        </div>

    </div>

    <form action="{SALVAMODULO}" method="post" class="form-horizontal">
        <input type="hidden" name="codproduto" id="codproduto"
               value="{CODPRODUTO}">
        <div class="modal fade bs-example-modal-lg" tabindex="-1"
             role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Novo Módulo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h4>{nomeproduto}</h4>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"
                                   for="tipousuario">Status: <span class="required">*</span>:
                            </label>
                            <div class="controls col-md-4 col-sm-4 col-xs-12">
                                <select name="statusmodulo" class="form-control"
                                        id="statusmodulo">
                                    <option value="R" {statusmodulo_R}>Rascunho</option>
                                    <option value="P" {statusmodulo_P}>Publicado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"
                                   for="nomemodulo">Nome</label>
                            <div class="controls col-md-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" id="nomemodulo"
                                       name="nomemodulo" value="{nomemodulo}"
                                       placeholder="Digite o nome do módulo" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"
                                   for="nomemodulo">Descrição</label>
                            <div class="controls col-md-6 col-sm-4 col-xs-12">
				<textarea class="form-control" id="descricaomodulo"
                          name="descricaomodulo"
                          placeholder="Digite as informações para este módulo">{descricaomodulo}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </div>
            </div>
        </div>

    </form>
</div>


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

<div class="col-md-8 panelupload" id="panelupload">
    <div class="x_panel">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Upload de arquivos</h4>
        </div>
        <div class="modal-body">
            <form id="formUpload" class="form-horizontal " method="post"
                  enctype="multipart/form-data">
                <input type="hidden" id="codmodulo" name="codmodulo" value=""
                       readonly="readonly"/>
                <div class="form-group">
                    <label for="aula" class="col-lg-2 control-label">Título</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="aula" id="aula"
                               placeholder="Nome da aula" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-lg-2 control-label">Status</label>
                    <div class="col-lg-3">
                        <select class="form-control" id="status" name="status">
                            <option value="D" selected="selected">Rascunho</option>
                            <option value="A">Publicado</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo_aula" class="col-lg-2 control-label">Conteúdo</label>
                    <div class="col-lg-5">
                        <select name="tipo_aula" id="tipo_aula" class="form-control"
                                required="required">
                            <option value="">Selecione</option>
                            <optgroup label="Vídeo Aula">
                                <option value="storage">Enviar Vídeo</option>
                            </optgroup>
                            <optgroup label="Outros">
                                <option value="pdf">Enviar PDF / Word / Power Point / Excel /
                                    Arquivos de Texto
                                </option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="formato-aula">
                    <label for="tipo-aula" class="col-lg-2 control-label">Aula</label>
                    <div class="col-lg-10">
                        <div id="div-storage">
                            <div class="form-group">
                                <input type="file" id="uploads" name="arquivo" required="required"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <div class="progress">
                            <div class="progress-bar progress-bar-success myprogress" role="progressbar"
                                 style="width:0%">0%
                            </div>
                        </div>
                    </div>

                    <div class="msg"></div>
                </div>
                <div class="form-group">
                    <label for="descricao" class="col-lg-2 control-label">Descrição</label>
                    <div class="col-lg-10">
					<textarea class="form-control autosize" name="descricao"
                              id="descricao"
                              placeholder="Escreva alguma nota sobre esta aula"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="uploadFile" type="button" class="btn btn-primary">Enviar</button>
                </div>

            </form>
        </div>
    </div>
</div>







