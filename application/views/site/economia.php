<div class="titulo" style="color: #fff">
    <hl><img class='hidden-xs' src="assets/img/economia.png" alt="" width="130" align="left"></hl>
    <center><img class='visible-xs' src="assets/img/economia.png" width="130" alt="" /></center>
    <center><h1><?php echo('Economia') ?></h1></center>
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
    <div class="col-sm-4">
        <div class="noticias" style="color: #fff">
            <center><h3><?php echo('Últimas notícias') ?></h3></center>
        </div>
        <?php 
            foreach ($titulos as $titulos) { 
                echo"<b>";
                echo $titulos->titulo;
                echo"</b>";
                echo "<br>";
                echo "--------------------------------------------";
                echo "<br>";
            }

        ?>
    </div>
    
</div>
