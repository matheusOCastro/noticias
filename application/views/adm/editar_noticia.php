<form action="<?php echo(base_url())?>adm/gravar_edicao_noticia" method="post">
   <?php 
    echo form_fieldset('<h1><span class="glyphicon glyphicon-map-marker"></span> Edição de Noticias</h1>');
        if(validation_errors()){
            echo '<div role="alert" class="alert alert-danger alert-dismissible fade in">';
            echo '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>';
            echo '<h4 id="erro_titulo">Ops! Verifique o seu formulário!</h4>';
            echo '<p>Encontramos algumas pendências no cadastro:</p>';
            echo '<ul class="Unordered">';
            echo validation_errors('<li>', '</li>');
            echo '</ul>';
            echo '</div>';
        }
        
        if($this->session->flashdata('mensagem')){
            echo $this->session->flashdata('mensagem');
        }
    ?>
    <?php 
        foreach ($noticia as $noticia) { 
            
        
    ?>
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="id">*ID</label>
                <input type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?php echo($autor->idusuario)?>" disabled>
                <input type="hidden" name="idnoticia" class="form-control" id="idnoticia" placeholder="ID" value="<?php echo($autor->idusuario)?>">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="titulo">*Titulo</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="TITULO" value="<?php echo($poco->utme)?>">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="utmn">*UTMN</label>
                <input type="text" name="utmn" class="form-control" id="utmn" placeholder="UTMN" onkeypress="return SomenteNumeroCoord(event)" value="<?php echo($poco->utmn)?>"disabled>
                <input type="hidden" name="oldutmn" class="form-control" id="oldutmn" placeholder="UTMN" value="<?php echo($poco->utmn)?>">
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="latitudese">*Latitude</label>
                <input type="text" name="latitudese" class="form-control" id="latitudese" placeholder="Latitude" onkeypress="return SomenteNumeroCoord(event)" value="<?php echo($poco->latitudese)?>">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="longitudes">*Longitude</label>
                <input type="text" name="longitudes" class="form-control" id="longitudes" placeholder="Longitude" onkeypress="return SomenteNumeroCoord(event)" value="<?php echo($poco->longitudes)?>">
            </div>
        </div>
    
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="ponto">Ponto</label>
                <input type="text" name="ponto" class="form-control" id="ponto" placeholder="Ponto" value="<?php echo($poco->ponto)?>">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="profundidade">Profundidade</label>
                <input type="text" name="profundidade" class="form-control" id="profundidade" placeholder="Profundidade" onkeypress="return SomenteNumeroDouble(event)" value="<?php echo($poco->profundidade)?>">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="uso_agua">*Uso da Água</label>
                <select name="uso_agua" class="form-control" id="uso_agua">
                    <option selected value="0">Indisponível</option>
                    <option value="Abastecimento doméstico">Doméstico</option>
                    <option value="Abastecimento doméstico/animal">Doméstico/animal</option>
                    <option value="Abastecimento doméstico/irrig.">Doméstico/irrigação</option>
                    <option value="Abastecimento industrial">Industrial</option>
                    <option value="Abastecimento múltiplo">Múltiplo</option>
                    <option value="Abastecimento urbano">Urbano</option>
                    <option value="Doméstico/irrigação/animal">Doméstico/irrigação/animal</option>
                    <option value="Outros (lazer,etc.)">Outros(lazer,etc.)</option>
                    <option value="Pecuária">Pecuária</option>
                    <option value="Sem uso">Sem uso</option>
                </select>
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="situacao">*Situação</label>
                <select name="situacao" class="form-control" id="situacao">
                    <option selected value="0">Indisponível</option>
                    <option value="Abandonado">Abandonado</option>
                    <option value="Bombeando">Bombeando</option>
                    <option value="Colmatado">Colmatado</option>
                    <option value="Equipado">Equipado</option>
                    <option value="Fechado">Fechado</option>
                    <option value="Não instalado">Não Instalado</option>
                    <option value="Não utilizável">Não Utilizável</option>
                    <option value="Obstruído">Obstruído</option>
                    <option value="Parado">Parado</option>
                    <option value="Precário">Precário</option>
                    <option value="Seco">Seco</option>
                </select>
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="municipios_cod_ibge">*Município</label>
                <?php
                    echo "<select name='municipios_cod_ibge' class='form-control' id='municipios_cod_ibge'>";
                        if (count($conscity)) {
                            foreach ($conscity as $conscity) {
                                echo "<option value='".$conscity->cod_ibge . "'>" .$conscity->nome . "</option>";
                            }
                        }
                    echo "</select><br/>";
                ?>
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="bacia_varzea_cod_bacia">*Bacia</label>
                <select name="bacia_varzea_cod_bacia" class="form-control" id="bacia_varzea_cod_bacia">
                    <option selected value="U100">Rio da Várzea</option>
                </select>
            </div>
        </div>
    </div>
    
    <img src="<?php echo(base_url())?>assets/img/hr.png" WIDTH="100%" height="1" ALT="hr">
    
    <h4><b>Capacidade do Poço</b></h4>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="vazao_estabilizacao">Vazão de Establização</label>
                <input type="text" name="vazao_estabilizacao" class="form-control" id="vazao_estabilizacao" placeholder="Vazão de Estabilização" onkeypress="return SomenteNumeroDouble(event)" value="<?php echo($poco->vazao_estabilizacao)?>">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="nivelestatico">Nível Estático</label>
                <input type="text" name="nivelestatico" class="form-control" id="nivelestatico" placeholder="Nível Estático" onkeypress="return SomenteNumeroDouble(event)" value="<?php echo($poco->nivelestatico)?>">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="niveldinamico">Nível Dinâmico</label>
                <input type="text" name="niveldinamico" class="form-control" id="niveldinamico" placeholder="Nível Dinâmico" onkeypress="return SomenteNumeroDouble(event)" value="<?php echo($poco->niveldinamico)?>">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="cap_especifica">Capacidade Específica</label>
                <input type="text" name="cap_especifica" class="form-control" id="cap_especifica" placeholder="Capacidade Específica" onkeypress="return SomenteNumeroDouble(event)" value="<?php echo($poco->cap_especifica)?>">
            </div>
        </div>
    </div>
    
    <button type="submit" class="btn btn-success btn-md">Salvar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
    <?php }?>
</form>
