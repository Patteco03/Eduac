<div class="container">
    <div class="row">
		
        
        <div class="col-md-12">
        <h4>{NOMEMODULO}</h4>
        <br>
        <h5>{DESCRICAOMODULO}</h5>
        <div class="table-responsive">

        <br>
        <ol class="breadcrumb breadcrumb-arrow">
          <li><a href="<?php echo ci_site_url('portaldoaluno') ; ?>">Portal do Aluno</a></li>
          <li class="active"><span>Download Cursos</span></li>
        </ol>


                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                       <th>Visualizar</th>
                       <th>Baixar</th>
                       <th>Descrição</th>
                       <th>Tipo</th>
                   </thead>
    <tbody>
    
    
    
    {BLC_DADOS}
    <tr>
	    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button name="{URLARQUIVO}" class="btn btn-primary btn-xs verimagem" data-title="visual" data-toggle="modal" data-target="#visual" id="verimagem" > <span class="glyphicon glyphicon-eye-open" style="color: #fff;"></span></button></p></td>
	    <td><p data-placement="top" data-toggle="tooltip" title="Download"><a href="{URLDOWNLOAD}" title="download do arquivo"><button  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-download" style="color: #fff;"></span></button> </a></p></td>
      <td>{AULANOME}</td>
      <td>{TIPOAULA}</td>
     </tr>
    {/BLC_DADOS}
    
     {SEM_BLCDADOS}
     <td colspan="5">
     	<div class="center">Não possui aulas ainda</div>
     </td>
     
     {/SEM_BLCDADOS}
    
    
   
        
    </tbody>
        
</table>
                
            </div>    
        </div>
	</div>
</div>


<div class="modal fade bs-example-modal-lg" id="visual" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h5 class="modal-title custom_align" id="Heading">Visualizador de arquivos</h5>
      </div>
          <div class="modal-body">
          <iframe id="visualizacaoid" width="100%" height="600" type='application/pdf' frameborder="0" scrolling="no"></iframe>
          
      </div>
          <div class="modal-footer ">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    