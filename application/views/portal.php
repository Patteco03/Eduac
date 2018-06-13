
<!-- CONTENT
  ================================================== -->
  <div class="grid">
    <div class="row">
      <!-- SIDEBAR -->  
      <div class="c3">
        <div class="leftsidebar">
          <h2 class="title stresstitle">MENU</h2>
          <hr class="hrtitle">
          <img src="{URLFOTO}" class="imgOpa teamimage" alt="">
          <div class="teamdescription">
            <h1>{NOMECOMPRADOR}</h1>
          </div>
          <ul id="menu">
            <li><a href="{DOWNLOAD}">
              <i class="icon-book"></i>  Material de Aula
            </a></li>
            <li><a href="{FINANCEIRO}">
              <i class="icon-briefcase"></i> Extrato Financeiro
            </a></li>
            <li><a href="">
              <i class="icon-search"></i> Pesquisas
            </a></li>
            <li><a href="">
              <i class="icon-th"></i> Biblioteca
            </a></li>
            <li><a href="{OUVIDORIA}">
              <i class="icon-question-sign"></i> Ouvidoria
            </a></li>
            <li><a href="{EDITARFORM}">
              <i class="icon-user"></i> Meus Dados
            </a></li>
            <li><a href="{SAIR}">
              <i class="icon-off"></i> Sair
            </a></li>
          </ul>
        </div>
      </div><!-- end sidebar -->
      
      <!-- MAIN CONTENT -->
      <div class="c9">
        <div id="content">          
          <div class="c12">
            AVISOS
            <table id="mytable" class="table table-bordred table-striped">

             <thead>
              <th>TIPO</th>
              <th>AVISO</th>
            </thead>
            <tbody>
              {BLC_AVISO}
              <tr>
               <td>{TIPO}</td>
               <td>{AVISO}</td>
             </tr>
             {/BLC_AVISO}

             {SEM_BLCAVISO}
             <td colspan="5">
              <div class="center">Nenhum lembrete previsto.</div>
            </td>
            {/SEM_BLCAVISO}  
          </tbody>
        </table>
      </div>
      <hr>
      <div class="c12">
        AVISOS
        <table id="mytable" class="table table-bordred table-striped">

         <thead>
          <th>TIPO</th>
          <th>AVISO</th>
        </thead>
        <tbody>
          {BLC_AVISO}
          <tr>
           <td>{TIPO}</td>
           <td>{AVISO}</td>
         </tr>
         {/BLC_AVISO}

         {SEM_BLCAVISO}
         <td colspan="5">
          <div class="center">Nenhum lembrete previsto.</div>
        </td>
        {/SEM_BLCAVISO}  
      </tbody>
    </table>
  </div>
</div><!-- /content -->
</div><!-- end main content -->     
</div>
</div><!-- end grid -->

