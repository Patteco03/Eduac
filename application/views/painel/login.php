
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel - Login</title>
  <meta name="description" content="Eduac - Painel de Login">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="apple-touch-icon" href="<?php echo base_url()."assets/"?>apple-icon.png">
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/css/normalize.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/css/cs-skin-elastic.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url()."assets/"?>ssets/css/bootstrap-select.less"> -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"?>assets/scss/style.css">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-logo">
          <a href="index.html">
            <img class="align-content" src="images/logo.png" alt="">
          </a>
        </div>
        <div class="login-form">
          
          <h2><?php echo $this->session->flashdata('erro'); ?></h2> 

          <form action="<?php echo site_url('painel/login/verifica');?>" method="post">
            <div class="form-group">
              <label>Usuário</label>
              <input type="text" class="form-control" name="username" placeholder="Usuário">
            </div>
            <div class="form-group">
              <label>Senha</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>
            <div class="social-login-content">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="<?php echo base_url()."assets"?>assets/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="<?php echo base_url()."assets"?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url()."assets"?>assets/js/plugins.js"></script>
  <script src="<?php echo base_url()."assets"?>assets/js/main.js"></script>


</body>
</html>
