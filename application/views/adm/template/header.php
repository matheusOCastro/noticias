<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/img/favicon.png" type="image/png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Visualização de Análise de Água">
    <meta name="author" content="SI">
    <script type="text/javascript" src='<?php echo base_url(); ?>assets/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
	tinymce.init({
            selector: '#noticia',
            theme: 'modern',
            width: 750,
            height: 300,
            plugins: [
              'advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker',
              'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking',
              'save table contextmenu directionality template paste image'
            ],
            
            content_css: 'css/content.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
    </script>

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
                            <img class='hidden-xs' src='<?php echo base_url(); ?>assets/img/logo.png' width="460" alt="news" />
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
                            <li <?=echoActiveClassIfRequestMatches("noticias")?>><a class="glyphicon glyphicon-pencil" href="<?php echo base_url('/adm/noticias')?>">&nbsp;NOTÍCIAS </a></li>
                            <li <?=echoActiveClassIfRequestMatches("autor")?>><a class="glyphicon glyphicon-user" href="<?php echo base_url('/adm/autor')?>">&nbsp;AUTORES </a></li>
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
