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

                            <!-- Left Block -->
                            <div class="col-md-8">

                                <div class="card">
                                    <div class="x_panel tile">
                                        <input type="hidden" name="codproduto" id="codproduto"
                                        value="{codproduto}">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label" for="nomeproduto">Nome <span
                                                    class="required">*</span>:
                                                </label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="nomeproduto"
                                                    name="nomeproduto" value="{nomeproduto}"
                                                    placeholder="Defina o nome para o curso" required="required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="resumoproduto">Resumo <span
                                                    class="required">*</span>:
                                                </label>
                                                <div class="controls">
                                                    <textarea id="froala-editor" class="form-control" name="resumoproduto"
                                                    style="height: 150px;"
                                                    placeholder="Defina um breve resumo sobre curso"
                                                    id="resumoproduto" required="required">{resumoproduto}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="fichaproduto">Ficha <span
                                                    class="required">*</span>: Max(300)
                                                </label>
                                                <div class="controls">
                                                    <textarea class="form-control" name="fichaproduto"
                                                    maxlength="300" placeholder="Mais detalhes sobre o curso"
                                                    id="fichaproduto" required="required">{fichaproduto}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="codtipoatributo">Escolha uma
                                                Vitrine:</label>
                                                <div class="controls">
                                                    <select name="codtipoatributo" class="form-control"
                                                    id="codtipoatributo"
                                                    {des_tipoatributo} class="set-quantidade-sku">
                                                    <option value="">Não especificado</option>
                                                    {BLC_TIPOATRIBUTOS}
                                                    <option value="{CODTIPOATRIBUTO}" {sel_codtipoatributo}>{NOME}</option>
                                                    {/BLC_TIPOATRIBUTOS}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="codtipoatributo">Duração do
                                            curso:</label>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="duracao"
                                                name="duracao" placeholder="(em meses)" value="{duracao}"
                                                required="required">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label class="control-label" for="codtipoatributo">Data Início:</label>
                                            <div class="controls">
                                                <input type="text" class="form-control set-date" id="datainicio"
                                                name="datainicio" value="{datainicio}" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label class="control-label" for="codtipoatributo">Data Final:</label>
                                            <div class="controls">
                                                <input type="text" class="form-control set-date" id="datafinal"
                                                name="datafinal" value="{datafinal}" required="required">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12 col-sm-12 col-xs-12"  style="padding-left: 0px; padding-right: 0px">
                                    <div class="x_panel tile">

                                        <div class="form-group">
                                            <label class="control-label col-sm-12 col-xs-12" for="professores"> <center>  <h4>  Selecão de Professores </h4> </center>
                                            </label>
                                            {BLC_SELECAOPROFESSORES}
                                            <div class="controls col-sm-4 col-xs-12">
                                                <label for="professores-{CODPROFESSOR}" class="checkbox">
                                                    <input {chk_professor} name="professor[]"
                                                    class="sleprofessor" type="checkbox"
                                                    id="professores-{CODPROFESSOR}" value="{CODPROFESSOR}">
                                                    <img class="img-responsive" src="{FIGUREPROFESSOR}" alt="{NOMEPROFESSOR}" width="100" height="100"> {NOMEPROFESSOR}
                                                </label>
                                            </div>
                                            {/BLC_SELECAOPROFESSORES}
                                        </div>
                                    </div>

                                </div>

                            </div><!-- /# card -->

                        </div>



                        <!-- Right Block -->
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header">
                                     <button type="submit" class="btn bt">{ACAOBUTTON}</button>
                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <div class="x_panel tile">
                                        <div class="form-group">
                                            <label class="control-label" for="valor">Valor <span
                                                class="required">*</span>:
                                            </label>
                                            <div class="controls">
                                                <input type="text" class="form-control set-numeric" id="valor"
                                                name="valor" value="{valor}" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="valorpromocional">Valor
                                            Promocional:</label>
                                            <div class="controls">
                                                <input type="text" class="form-control set-numeric"
                                                id="valorpromocional" name="valorpromocional"
                                                value="{valorpromocional}">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-xs-12">
                                    <div class="x_panel tile">
                                        <label class="control-label" for="dapartamento">Categorias:</label>
                                        <ul class="lista-departamentos">
                                            {BLC_DEPARTAMENTOPAI}
                                            <li><label for="departamento-{CODDEPARTAMENTO}" class="checkbox">
                                                <input {chk_departamentopai} name="departamento[]"
                                                class="set-departamento-pai" type="checkbox"
                                                id="departamento-{CODDEPARTAMENTO}" value="{CODDEPARTAMENTO}">
                                                {NOMEDEPARTAMENTO}
                                            </label>
                                        </li>
                                        <li>
                                            <ul class="lista-departamentos">
                                                {BLC_DEPARTAMENTOFILHO}
                                                <li><label for="departamento-{CODDEPARTAMENTOFILHO}"
                                                   class="checkbox"> <input
                                                   {chk_departamentofilho} name="departamento[]"
                                                   class="set-departamento-filho"
                                                   data-pai="{CODDEPARTAMENTOPAI}" type="checkbox"
                                                   id="departamento-{CODDEPARTAMENTOFILHO}"
                                                   value="{CODDEPARTAMENTOFILHO}"> {NOMEDEPARTAMENTOFILHO}
                                               </label></li>
                                               {/BLC_DEPARTAMENTOFILHO}
                                           </ul>
                                       </li>
                                       {/BLC_DEPARTAMENTOPAI}
                                   </ul>
                               </div>
                           </div>
                       </div><!-- /# card -->

                   </div>
               </form>
           </div> <!-- .buttons -->

       </div><!-- .row -->
   </div><!-- .animated -->
        </div><!-- .content -->