<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="icon" href="<?php echo base_url(); ?>/assets/img/favicon.png" type="image/png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Visualização de Análise de Água">
    <meta name="author" content="SI">

    <title>Visualização de Análise de Água</title>
    
    
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
          
       
        <div class="container">
            <div class="row">
                <div class="col-sm-4" style='vertical-align: top;'>
                    <div class="logo" style='padding: 10px; padding-bottom: 10px; text-align: left;'>
                        <a href="<?php echo base_url(); ?>" title="UFSM" rel="home">
                            <img class='hidden-xs' src='<?php echo base_url(); ?>assets/img/ufsmlogo2.png' width="320" alt="UFSM" />
                            <center><img class='visible-xs' src='<?php echo base_url(); ?>assets/img/ufsmlogo2.png' width="250" alt="UFSM" /></center>

                        </a>
                        <a href="<?php echo base_url(); ?>" title="UFSM" rel="home">
                            <img class='hidden-xs' src='<?php echo base_url(); ?>assets/img/larh2.png' width="320" alt="LARH" />
                            <center><img class='visible-xs' src='<?php echo base_url(); ?>assets/img/larh2.png' width="250" alt="LARH" /></center>

                        </a>

                    </div>

                </div>

                <div class="col-sm-7">
                    <div class="hidden-xs" style="color: #000; font-family:chaparral pro ;text-align: center; font-size: 50px; margin-top: 30px;">
                    Sistema de Visualização de Qualidade da Água Subterrânea

                    </div>
                    <div class="visible-xs" style="color: #000; font-family:chaparral pro ;text-align: center; font-size: 30px; margin-top: 30px;">
                    Sistema de Visualização de Qualidade da Água Subterrânea

                    </div>

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
                            <li <?=echoActiveClassIfRequestMatches("pocos")?>><a class="glyphicon glyphicon-map-marker" href="<?php echo base_url('/adm/pocos')?>">&nbsp;POÇOS </a></li>
                            <li <?=echoActiveClassIfRequestMatches("analises")?>><a class="glyphicon glyphicon-tint" href="<?php echo base_url('/adm/analises')?>">&nbsp;ANÁLISES </a></li>
                        </ul>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="glyphicon glyphicon-remove-circle" href="<?php echo base_url('/adm/logout')?>">&nbsp;LOGOUT </a></li>
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
