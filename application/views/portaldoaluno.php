  <script type="text/javascript">
    $(document).ready(function(){
      var content = $('#content');

    //pre carregando o gif
    loading = new Image(); loading.src = 'loading.gif';
    $('#menu a').on('click', function( e ){
      e.preventDefault();
      content.html( '<img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />' );

      var href = $( this ).attr('href');
      $.ajax({
        url: href,
        success: function( response ){
          //forçando o parser
          var data = $( '<div>'+response+'</div>' ).find('#content').html();

          //apenas atrasando a troca, para mostrarmos o loading
          window.setTimeout( function(){
            content.fadeOut('slow', function(){
              content.html( data ).fadeIn();
            });
          }, 500 );
        }
      });

    });
  });
</script>

<!-- HEADER
  ================================================== -->
  <div class="undermenuarea">
    <div class="boxedshadow">
    </div>
    <div class="grid">
      <div class="row">
        <div class="c4">
          <h1 class="titlehead">Meu Portal</h1>
        </div>
        <div class="c8">
          <h1 class="titlehead rightareaheader"><i class="icon-map-marker"></i>{DATEHORA}</h1>
        </div>
      </div>
    </div>
  </div>
<!-- CONTENT
  ================================================== -->
  <div class="grid">
    <div class="shadowundertop">
    </div>
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
            <li><a href="#">
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
            <li><a href="">
              <i class="icon-off"></i> Sair
            </a></li>
          </ul>
        </div>
      </div><!-- end sidebar -->
      
      <!-- MAIN CONTENT -->
      <div class="c9">
        <div id="content">
          <h1>Bem Vindo!</h1>
          <p>Essa eh a home desse nome pseudo-site.</p>
        </div><!-- /content -->
      </div><!-- end main content -->     
    </div>
  </div><!-- end grid -->

