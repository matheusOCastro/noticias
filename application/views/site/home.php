<div class="titulo" style="color: #fff">
    <hl><img class='hidden-xs' src="assets/img/mapa.png" alt=""align="left"></hl>
    <center><img class='visible-xs' src="assets/img/mapa.png" width="150" alt="" /></center>
    <center><h1><?php echo('Municípios Pertencentes à Bacia do Rio da Várzea') ?></h1></center>
</div>

<script async defer src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>
<script type="text/javascript" src="assets/js/cidades.js"></script>


<div class="col-sm-7" id="map-canvas" style=" height: 700px; margin-bottom: 5px">
	
</div>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
    var $arrayGrafico_js_pie = '<?php echo $pieGra;?>';
</script>
<script type="text/javascript" src="assets/js/graficos.js"></script>

<div class="col-sm-5" id="piechart" style="height: 375px;"></div>

<!------------------------------------------------------------------->

<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">
    var $arrayGrafico_js_column = '<?php echo $columnGra;?>';
</script>
<script type="text/javascript" src="assets/js/graficos.js"></script>

<div class="col-sm-5" id="columnchart" style="height: 325px;"></div>

<div class="row">
    <div class="col-sm-6" >
	<?php echo('Fonte: População (IBGE-2014) ---  Poços Profundos (CPRM-2015)'); ?>
    </div>
</div>