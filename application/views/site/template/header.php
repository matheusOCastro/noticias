<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="icon" href="<?php echo base_url(); ?>/assets/img/favicon.png" type="image/png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Visualização de Análise de Água">
    <meta name="author" content="SI">

    <title>MM News</title>

    
  </head>
    <header class="site-header">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <script src="assets/js/sweetalert.min.js"></script> 
        <link href="<?php echo base_url('assets/css/sweetalert.css');?>" rel="stylesheet">
        
        <link href="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/js/jquery.min.js'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/js/respond.min.js'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/js/html5shiv.min.js'); ?>" rel="stylesheet">
         
        <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="<?php echo base_url(); ?>home">MM News</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  
                  <ul class="nav navbar-nav navbar-right">
                      <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pesquisa">
                        </div>
                            <button type="submit" class="btn btn-default">Pesquisar</button>
                      </form>
                     <li <?=echoActiveClassIfRequestMatches("login")?>><a class="glyphicon glyphicon-user" href="<?php echo base_url('/login')?>">&nbsp;ADMINISTRAÇÃO </a></li>
                    
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav> 
       
        <div class="container">
            <div class="row">
                <div class="col-sm-4" style='vertical-align: top;'></div>

                <div class="col-sm-7">
                    <a href="<?php echo base_url()."home"; ?>" title="News" rel="home">
                            <img class='hidden-xs' src='<?php echo base_url(); ?>assets/img/logo.png' width="360" alt="news" />
                            <center><img class='visible-xs' src='<?php echo base_url(); ?>assets/img/logo.png' width="250" alt="news" /></center>

                        </a>

                </div>
                

            </div>

        </div>
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav" >
                        
                        <li <?=echoActiveClassIfRequestMatches("home")?>><a class="glyphicon glyphicon-home" href="<?php echo base_url('/home')?>">&nbsp;HOME </a></li>
                        <li <?=echoActiveClassIfRequestMatches("economia")?>><a class="glyphicon glyphicon-usd" href="<?php echo base_url('/economia')?>">&nbsp;ECONOMIA </a></li>
                        <li <?=echoActiveClassIfRequestMatches("educacao")?>><a class="glyphicon glyphicon-book" href="<?php echo base_url('/educacao')?>">&nbsp;EDUCACAO </a></li>
                        <li <?=echoActiveClassIfRequestMatches("esportes")?>><a class="glyphicon glyphicon-bullhorn" href="<?php echo base_url('/esportes')?>">&nbsp;ESPORTES </a></li>
                        <li <?=echoActiveClassIfRequestMatches("mundo")?>><a class="glyphicon glyphicon-globe" href="<?php echo base_url('/mundo')?>">&nbsp;MUNDO </a></li>
                        <li <?=echoActiveClassIfRequestMatches("musica")?>><a class="glyphicon glyphicon-music" href="<?php echo base_url('/musica')?>">&nbsp;MUSICA </a></li>
                        <li <?=echoActiveClassIfRequestMatches("politica")?>><a class="glyphicon glyphicon-briefcase" href="<?php echo base_url('/politica')?>">&nbsp;POLITICA </a></li>
                        <li <?=echoActiveClassIfRequestMatches("tecnologia")?>><a class="glyphicon glyphicon-phone" href="<?php echo base_url('/tecnologia')?>">&nbsp;TECNOLOGIA </a></li>
                      </ul>
                       


                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
    </header>
 <?php 

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI']);

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>     
    
        
        
     
    
<div class="container">
