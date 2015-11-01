<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<?php
    require_once 'application/models/Filtra_grafico.php'; 
?>
<script type="text/javascript">
    var $arrayGrafico_js = '<?php echo $array_grafico;?>';
</script>
<script type="text/javascript" src="assets/js/graficos.js"></script>

<div class="titulo" style="color: #fff">
    <hl><img class='hidden-xs' src="assets/img/grafico.png" width="150" alt=""align="left"></hl>
    <center><img class='visible-xs' src='assets/img/grafico.png' width="150" alt="" /></center>
    <center><h1><?php echo ('Poços Perfurados na Bacia do Rio da Várzea') ?></h1></center>
</div>

<div class="filtro" style="color: #fff"> 
    <fieldset>
        <legend style="color: #fff">Selecione o filtro desejado: <br></legend>
        <form action=graficopocos method=post id="filtro">
            <div class="col-sm-4">
                <?php echo ('<b>Filtro </b><br>');?>
                <INPUT TYPE="checkbox" NAME="situacao" VALUE="situacao" onchange="submit()" onclick="form.qualidade.checked=null" <?php echo($_POST['situacao']);?>> Situacao<br>
                <INPUT TYPE="checkbox" NAME="qualidade" VALUE="qualidade" onchange="submit()" onclick="form.situacao.checked=null" <?php echo($_POST['qualidade']);?>> Qualidade<br>
            </div>
            
            <div class="col-sm-5">
                
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4">
                    
                </div>
                
            </div>
            <div class="col-sm-1">
                
                <?php echo ('<b>&nbsp;Visualização </b><br>');?>
                <a href="<?php echo base_url('/mapapocos')?>"><img src="assets/img/mapa.png" width="120" height="100"></a>
                    
            </div>
           <input type="submit" name="enviar" value="Enviar" style="visibility: hidden"/>
           
        </form>
    </fieldset>
</div>
<div id="piechart" style="height: 500px;"></div>