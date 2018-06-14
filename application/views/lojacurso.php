

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
                <h1 class="titlehead rightareaheader"><i class="icon-map-marker"></i> Call Us Now 1-318-107-432</h1>
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
    {BLC_DADOS}
    <!-- begin filter -->
    <div class="row space-bot">
        <div class="c12">
            <div id="nav">
                <ul>
                    <li><a href="" data-filter="*" class="selected">Todos os cursos</a></li>
                    <li><a href="" data-filter=".cat1">Classic</a></li>
                    <li><a href="" data-filter=".cat2">Elegant</a></li>
                    <li><a href="" data-filter=".cat3">Modern</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end filter -->
    <div class="row space-top">
        <div id="content">
            <!-- image 1 -->
            <div class="boxfourcolumns cat1 cat3">
                <div class="boxcontainer">
						<span class="gallery">
						<a data-gal="prettyPhoto[gallery1]" href="http://www.youtube.com/watch?v=QX2yt95Yu90"><img src="http://placehold.it/350x150&text=any.size.you+wish" alt="Add Title" class="imgOpa"/></a>
						</span>
                    <h1><a href="#">Dalya</a></h1>
                    <p>
                        porta acean pulvinar
                    </p>
                </div>
            </div>
        </div>
    </div>
    {/BLC_DADOS}
    {BLC_SEMDADOS}
    <div class="row space-bot">
        <div class="c12">
            <div class="wrapaction">
                <div class="c12">
                    <h1 class="subtitles">Sem cursos cadastrados.</h1>
                </div>
            </div>
        </div>
    </div>
    {/BLC_SEMDADOS}
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