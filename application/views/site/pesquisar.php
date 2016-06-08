<div class="titulo" style="color: #fff">
    <hl><img class='hidden-xs' src="assets/img/search.png" alt="" width="130" align="left"></hl>
    <center><img class='visible-xs' src="assets/img/search.png" width="130" alt="" /></center>
    <center><h1><?php echo('Pesquisa') ?></h1></center>
</div>

<div class="row">
    <!--<div class="col-sm-2"></div>-->
    
    <div class="col-sm-8" style="vertical-align: top">
        <?php 
            foreach ($noticia as $noticia) { 
                echo"<b><h1>";
                echo $noticia->titulo;
                echo"</h1></b>";
                echo "<br>";
                
                echo $noticia->corpo;
                echo "<br><b>";
                echo "Autor: ";
                echo $noticia->nomeautor;
                echo " --- ";
                
                $originalDate = $noticia->dt_publicacao;
                $newDate = date("d/m/Y", strtotime($originalDate));
                
                echo "Publicação: ".$newDate;
                echo "</b><br>";
                echo "----------------------------------------------------------";
            }

        ?>
    </div>
</div>
