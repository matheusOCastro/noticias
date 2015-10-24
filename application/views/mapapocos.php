
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<?php
    require_once 'application/models/Filtra_pocos.php'; 
?>

<script type="text/javascript">
    var $array_js = '<?php echo $string_array;?>';
    if ($array_js.length<24){
        sweetAlert("Oops...", "Nenhum dado encontrado!", "error");
        //document.write('<div class="alert alert-danger" role="alert">...</div>');
    }
</script>
<script type="text/javascript" src="assets/js/cidadespocos.js"></script>

<div class="titulo" style="color: #fff">
    <hl><img class='hidden-xs' src="assets/img/mapa.png" alt=""align="left"></hl>
    <center><img class='visible-xs' src='assets/img/mapa.png' width="150" alt=""></center>
    <center><h1><?php echo('Poços Perfurados na Bacia do Rio da Várzea') ?></h1></center>
    
</div>

<div class="filtro" style="color: #fff"> 
    <fieldset>
        <legend style="color: #fff">Selecione o filtro desejado: <br></legend>
        <form action=mapapocos method=post id="filtro">
            <div class="col-sm-4">
                <INPUT TYPE="checkbox" NAME="todos" VALUE="todos" onchange="submit()" <?php echo($_POST['todos']);?>>Todos<br>
                <?php echo ('<b>Qualidade </b><br>');?>
                <INPUT TYPE="checkbox" NAME="humano" VALUE="humano" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['humano']);?>> Consumo Humano<br>
                <INPUT TYPE="checkbox" NAME="animais" VALUE="animais" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['animais']);?>> Dessedentação de Animais<br>
                <INPUT TYPE="checkbox" NAME="irrigacao" VALUE="irrigacao" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['irrigacao']);?>> Irrigação<br>
                <INPUT TYPE="checkbox" NAME="recreacao" VALUE="recreacao" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['recreacao']);?>> Recreação<br>
            </div>
            
            <div class="col-sm-5">
                <?php echo ('<b><br>&nbsp;&nbsp;&nbsp;Situação </b><br>');?>
                <div class="col-sm-4">
                    <INPUT TYPE="checkbox" NAME="bombeando" value="Bombeando" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['bombeando']);?>/> Bombeando<br>
                    <INPUT TYPE="checkbox" NAME="abandonado" VALUE="Abandonado" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['abandonado']);?>/> Abandonado<br>
                    <INPUT TYPE="checkbox" NAME="nutil" VALUE="Não utilizável" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['nutil']);?>> Não Utilizável<br>
                    <INPUT TYPE="checkbox" NAME="ninstal" VALUE="Não Instalado" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['ninstal']);?>> Não Instalado<br>
                </div>
                <div class="col-sm-4">
                    <INPUT TYPE="checkbox" NAME="fechado" VALUE="Fechado" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['fechado']);?>> Fechado<br>
                    <INPUT TYPE="checkbox" NAME="precario" VALUE="Precário" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['precario']);?>> Precário<br>
                    <INPUT TYPE="checkbox" NAME="obstruido" VALUE="Obstruído" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['obstruido']);?>> Obstruído<br>
                    <INPUT TYPE="checkbox" NAME="colmatado" VALUE="Colmatado" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['colmatado']);?>> Colmatado<br>
                </div>
                <div class="col-sm-4">
                    <INPUT TYPE="checkbox" NAME="parado" VALUE="Parado" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['parado']);?>> Parado<br>
                    <INPUT TYPE="checkbox" NAME="seco" VALUE="Seco" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['seco']);?>> Seco<br>
                    <INPUT TYPE="checkbox" NAME="equipado" VALUE="Equipado" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['equipado']);?>> Equipado<br>
                    <INPUT TYPE="checkbox" NAME="indisp" VALUE="Indisponpível" onchange="submit()" onclick="form.todos.checked=null" <?php echo($_POST['indisp']);?>> Indisponível<br>
                </div>
                
            </div>
            <div class="col-sm-1">
                
                <?php echo ('<b><br>&nbsp;Visualização </b><br>');?>
                <a href="<?php echo base_url('/graficopocos')?>"><img src="assets/img/grafico.png" width="100" height="100"></a>
                    
            </div>
           <input type="submit" name="enviar" value="Enviar" style="visibility: hidden"/>
           
        </form>
    </fieldset>
</div>

<div>

    <p><img width="100%" src="assets/img/legenda.png" alt="Legendas dos poços perfurados"></p>
</div>

<div id="map-canvas" style=" height: 600px; margin-bottom: 20px"></div> 