<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrativo - Eduac</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url()."assets/" ?>apple-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url()."assets/" ?>favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/" ?>assets/scss/style.css">
    <link href="<?php echo base_url()."assets/" ?>assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('painel')?>">Plataforma Eduac</a>
                <a class="navbar-brand hidden" href="<?php echo site_url('painel')?>"> ED </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo site_url('painel') ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Cursos</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-mortar-board"></i>Cursos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo site_url('painel/produto') ?>">Todos os Cursos</a></li>
                            <li><a href="<?php echo site_url('painel/produto/adicionar') ?>">Novo</a></li>
                            <li><a href="<?php echo site_url('painel/departamento') ?>">Categorias</a></li>
                            <li><a href="<?php echo site_url('painel/tipoatributo') ?>">Vitrine</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Financeiro</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Financeiro</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo site_url('painel/formapagamento') ?>">Formas de Pagamento</a></li>
                            <li><a href="<?php echo site_url('painel/carrinho') ?>">Carrinho</a></li>
                            <li><a href="<?php echo site_url('painel/atributo/adicionar') ?>">Novo</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Pessoas</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-users"></i>Pessoas</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="<?php echo site_url('painel/comprador') ?>">Alunos</a></li>
                            <li><a href="<?php echo site_url('painel/usuario') ?>">Equipe</a></li>
                            <li><a href="<?php echo site_url('painel/permissoes') ?>">Grupos e Permissões</a></li>
                        </ul>
                    </li>




                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="<?php echo base_url()."assets/" ?>#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url()."assets/" ?>images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url()."assets/" ?>#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="<?php echo base_url()."assets/" ?>#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="<?php echo base_url()."assets/" ?>#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="<?php echo site_url('painel/login/sair') ?>"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->



        {MENSAGEM_SISTEMA_ERRO}
        {MENSAGEM_SISTEMA_SUCESSO}
        {CONTEUDO}


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="<?php echo base_url()."assets/" ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/main.js"></script>


    <script src="<?php echo base_url()."assets/" ?>assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/dashboard.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/widgets.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url()."assets/" ?>assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
