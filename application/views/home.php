<script async defer
        src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>
 
<script type="text/javascript" src="assets/js/cidades.js">
   
</script>

<div class="titulo" style="color: #fff">
    <hl><img class='hidden-xs' src="assets/img/mapa.png" alt=""align="left"></hl>
    <center><img class='visible-xs' src="assets/img/mapa.png" width="150" alt="" /></center>
    <center><h1><?php echo('Municípios Pertencentes à Bacia do Rio da Várzea') ?></h1></center>
</div>
<div id="map-canvas" style=" height: 550px; margin-bottom: 5px"></div>
<?php echo('Fonte: População (IBGE-2014) ---  Poços Profundos (CPRM-2015)'); ?>