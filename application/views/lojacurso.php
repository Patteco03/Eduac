

<!-- HEADER
================================================== -->
<div class="undermenuarea">
    <div class="boxedshadow">
    </div>
    <div class="grid">
        <div class="row">
            <div class="c8">
                <h1 class="titlehead">Loja</h1>
            </div>
            <div class="c4">
                <h1 class="titlehead rightareaheader"><i class="icon-map-marker"></i> Rio Branco-AC </h1>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT
================================================== -->
<div class="grid">
    <div class="shadowundertop"></div>
    <div class="row">
        <div class="c12">
            <h1 class="maintitle space-top">
                <span>Sua loja Virtual</span>
            </h1>
        </div>
    </div>
    <!-- begin filter -->
    <div class="row space-bot">
        <div class="c12">
            <div id="nav">
                <ul>
                    <li><a href="" data-filter="*" class="selected">Todos os cursos</a></li>
                    {BLC_CATEGORIAS}
                    <li><a href="" data-filter=".cat{ID}">{NOME}</a></li>
                    {/BLC_CATEGORIAS}
                </ul>
            </div>
        </div>
    </div>
    <!-- end filter -->
    <div class="row space-top">
        <div id="content">
            {BLC_DADOS}
            <!-- image 1 -->
            <div class="boxfourcolumns {DEP}cat{codprodutodepartamento} {/DEP}">
                <div class="boxcontainer">
						<span class="gallery">
						<a  href="{URLSEO}"><img src="{IMAGEMDESTACADA}" alt="Add Title" class="imgOpa"/></a>
						</span>
                    <h1><a href="{URLSEO}">{NOME}</a></h1>
                    <p>
                        {FICHA}
                    </p>
                    <hr>
                    <div class="col-sm-12" class="block-preco">
                        {BLC_PRECOPROMOCIONAL}
                        <span class="valorantigo"> <i> de R$ {VALORANTIGO} </i> </span> <br>
                        {/BLC_PRECOPROMOCIONAL}
                        <span class="numvezes"> até 12X de R$ {VALORPR} </span><br>
                        <span class="valorAu"> ou à vista por R$ {VALOR}  </span><br><br>
                    </div>
                    <p>
                    <form action="<?php echo site_url('carrinho/adicionar') ;?>" method="post">
                        <input type="hidden" value="{CODPRODUTO}" name="codproduto">

                        <div class="ph-float">
                            <button type="submit" class='btn btn-success'>Comprar <i class="icon-plus" aria-hidden="true"></i></button>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
            {/BLC_DADOS}
            {BLC_SEMDADOS}
            <div class="wrapaction">
                <div class="c12">
                    <h1 class="subtitles">Sem cursos cadastrados!</h1>
                </div>
            </div>
            {/BLC_SEMDADOS}
        </div>
    </div>
</div><!-- end grid -->

<!-- JAVASCRIPTS
================================================== -->
<!-- all -->

<!-- filterable -->
<script src="<?php echo base_url()."assets/site/" ?>js/jquery.isotope.min.js"></script>

<!-- gallery -->
<script src="<?php echo base_url()."assets/site/" ?>js/jquery.prettyPhoto.js"></script>

<!-- CALL opacity on hover images -->
<script type="text/javascript">
    $(document).ready(function(){
        $("img.imgOpa").hover(function() {
                $(this).stop().animate({opacity: "0.6"}, 'slow');
            },
            function() {
                $(this).stop().animate({opacity: "1.0"}, 'slow');
            });
    });
</script>

<!-- CALL filtering -->
<script>
    $(document).ready(function(){
        var $container = $('#content');
        $container.imagesLoaded( function(){
            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
        });
        $('#nav a').click(function(){
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
            return false;
        });

        $('#nav a').click(function (event) {
            $('a.selected').removeClass('selected');
            var $this = $(this);
            $this.addClass('selected');
            var selector = $this.attr('data-filter');

            $container.isotope({
                filter: selector
            });
            return false; // event.preventDefault()
        });

    });
</script>

<!-- CALL lightbox prettyphoto -->
<script type="text/javascript">
    $(document).ready(function(){
        $("a[data-gal^='prettyPhoto']").prettyPhoto({social_tools:'', animation_speed: 'normal' , theme: 'dark_rounded'});
    });
</script>

</body>
</html>