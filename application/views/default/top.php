<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Sistema Gerenciador de Arquivos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('others/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
            
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('others/css/style.css'); ?>" />
        
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="<?php echo base_url('others/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('others/bootstrap/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
    
    
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo base_url('home/index'); ?>"><img style="width: 90px;" src="<?php //echo base_url('others/img/'); ?>" /><i class="sprite-icon-dart-logo"></i></a>
        </div>

        <nav class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Usuários <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">                
                    <li><a href="<?php echo base_url('users/register'); ?>">Cadastrar</a></li>
                    <li><a href="<?php echo base_url('users/listUsers'); ?>">Todos Usuários</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('users/registerProfile'); ?>">Cadastrar Perfil</a></li>
                    <li><a href="<?php echo base_url('users/listProfiles'); ?>">Listar Perfis</a></li>
              </ul>
            </li>
            
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Categorias <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">                
                    <li><a href="<?php echo base_url('categories/register'); ?>">Cadastrar</a></li>
                    <li><a href="<?php echo base_url('categories/listCategories'); ?>">Ver Todos</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Drive <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <i class="sprite-icon-dd-tip"></i>
                <?php if (!$this->session->userdata('id')){?><li><a href="<?php echo base_url('drive/register'); ?>">Cadastrar</a></li><?php } ?>
                <li><a href="<?php echo base_url('drive/listDrives'); ?>">Meus Drives</a></li>

                                
              </ul>
            </li>
          </ul>
            
          <ul class="nav navbar-nav navbar-right">
            <li>
                <div class="navbar-search" >
                    <?php echo $this->session->userdata('name'); ?> <i class="material-icons">account_circle</i>
                    <!-- <a href="<?php //echo base_url('users/preRegistrantion'); ?>">Registrar-se</a> -->
                    <?php if ($this->session->userdata('id')){ ?><a href="<?php echo base_url('auth/logout'); ?>">Sair</a><?php }
                    else {
                        ?><a href="<?php echo base_url('auth/login'); ?>">Entrar</a><?php
                    }?>
              </div>
            </li>
            
            <!--
            <li><a href="https://twitter.com/dart_lang" class="btn"><i class="sprite-icon-social-twitter"></i></a></li>
            <li><a href="https://plus.google.com/+dartlang/posts" class="btn"><i class="sprite-icon-social-gplus"></i></a></li> -->
          </ul>
        </nav><!-- /.nav-collapse -->

      </div><!-- /.container -->
    </nav>
    
    <div style="width: 100%;" >
        <?php message(); ?>
    </div>