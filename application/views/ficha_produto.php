<!-- HEADER
================================================== -->
<div class="undermenuarea">
    <div class="boxedshadow">
    </div>
    <div class="grid">
        <div class="row">
            <div class="c8">
                <h1 class="titlehead">Sobre</h1>
            </div>
            <div class="c4">
                <h1 class="titlehead rightareaheader"><i class="icon-map-marker"></i> Rio Branco-AC</h1>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT
================================================== -->
<div class="grid">
    <div class="shadowundertop">
    </div>
    <div class="row space-top">
        <div class="c12 space-top">
            <h1 class="maintitle ">
                <span>Informações Adicionais</span>
            </h1>
        </div>
        <!-- BEGIN TEAM STYLE 2
		================================================== -->
        <div class="c4">
            <p>
                <img src="{FOTOPRINCIPAL}" style="border-bottom: 5px solid #eee;" alt="{NOMEPRODUTO}">
            </p>
        </div>
        <div class="c4">
            <h5><h5>{NOMEPRODUTO} / Duração:  {DURACAO} Meses</h5>
            <p>
                 {DESCRICAOBASICA}
            </p>
            <p>
            </p>
            <ul class="social-links">
                <li class="twitter-link">
                    <a href="#" class="twitter has-tip" target="_blank" title="Follow Us on Twitter">Twitter</a>
                </li>
                <li class="facebook-link">
                    <a href="#" class="facebook has-tip" target="_blank" title="Join us on Facebook">Facebook</a>
                </li>
                <li class="google-link">
                    <a href="#" class="google has-tip" title="Google +" target="_blank">Google</a>
                </li>
                <li class="dribbble-link">
                    <a href="#" class="dribbble has-tip" title="Dribbble" target="_blank">Dribbble</a>
                </li>
                <li class="linkedin-link">
                    <a href="#" class="linkedin has-tip" title="Linkedin" target="_blank">Linkedin</a>
                </li>
                <li class="pinterest-link">
                    <a href="#" class="pinterest has-tip" title="Pinterest" target="_blank">Pinterest</a>
                </li>
            </ul>
            <div class="clear"></div>
            <p>
            </p>
        </div>
        <div class="c4">
            <ul id="skill">
                <li><span class="bar progressorange" style="width:100%;"></span>
                    <h3>Andamento do curso</h3>
                </li>
                <li><span class="bar progressgreen" style="width:80%;"></span>
                    <h3>Aulas Disponíveis 80%</h3>
                </li>
            </ul>
        </div>
        <!-- END TEAM STYLE 1
		================================================== -->
    </div>

    <div class="row space-top">
        <div class="c12">
            <h1 class="maintitle ">
                <span>CURSOS RELACIONADOS</span>
            </h1>
        </div>
        <!-- BEGIN TEAM STYLE CAROUSEL
		================================================== -->
        <div class="c12">
            <div class="list_carousel">
                <div class="carousel_nav">
                    <a class="prev" id="car_prev" href="#"><span>prev</span></a>
                    <a class="next" id="car_next" href="#"><span>next</span></a>
                </div>
                <div class="clearfix">
                </div>
                <ul id="recent-projects">
                    <!--featured-projects 1-->
                    {BLC_CURSOSPRESENCIAIS}
                    <li>
                        <div class="featured-projects">
                            <div class="featured-projects-image">
                                <a href="{URLPRODUTO}"><img class="imgOpa" src="{URLFOTO}" alt="{NOMEPRODUTO}"></a>
                            </div>
                            <div class="featured-projects-content">
                                <h1><a href="{URLPRODUTO}">{NOMEPRODUTO}</a></h1>
                                <p>
                                    {FICHAPRODUTO}
                                </p>
                                <div class="col-sm-12" class="block-preco">
                                    {BLC_PRECOPROMOCIONAL}
                                    <span class="valorantigo"> <i> de R$ {VALORANTIGO} </i> </span> <br>
                                    {/BLC_PRECOPROMOCIONAL}
                                    <span class="numvezes"> até 12X de R$ {VALORPR} </span><br>
                                    <span class="valorAu"> ou à vista por R$ {VALOR}  </span><br><br>
                                </div>

                                <form action="<?php echo site_url('carrinho/adicionar') ;?>" method="post">
                                    <input type="hidden" value="{CODPRODUTO}" name="codproduto">
                                    <div class="ph-float">
                                        <button type="submit" class='btn btn-success'>Comprar <i class="icon-plus" aria-hidden="true"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    {/BLC_CURSOSPRESENCIAIS}
                </ul>
                <div class="clearfix">
                </div>
            </div>
        </div>
        <!-- END TEAM STYLE CAROUSEL
		================================================== -->

    </div>
</div><!-- end grid -->