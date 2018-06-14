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
                            <li><a href="#">Usuário</a></li>
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
                            <input type="hidden" name="codusuario" id="codusuario"
                            value="{codusuario}">
                            <!-- Left Block -->
                            <div class="col-lg-12">
                                <input type="hidden" name="idusuario" id="idusuario"
                                value="{id}">

                                <div class="control-group">
                                    <label class="control-label mb-1" for="nome">Nome: </label>
                                    <div class="controls">
                                        <input type="text" name="name" class="col-xs-6 form-control" id="nome" value="{name}" required>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label mb-1" for="naturalidade">Usuário: </label>
                                    <div class="controls">
                                        <input type="text" class="span3 form-control" name="username" id="username" value="{username}"
                                        required>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label mb-1" for="email">E-mail: </label>
                                    <div class="controls">
                                        <input type="text" class="span3 form-control" name="email" id="email" value="{email}" required>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label mb-1" for="email">Senha: </label>
                                    <div class="controls">
                                        <input type="password" class="span3 form-control" name="password" id="password" value="" required>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <br/>


                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div> <!-- /form-actions -->
                            </div>

                        </form>
                    </div> <!-- .buttons -->

                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->