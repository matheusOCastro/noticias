<form action=acao method="post">
    <?php 
    echo form_fieldset('<h1><span class="glyphicon glyphicon-tint"></span> Novas Análises</h1>');
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
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="utme">*UTME</label>
                <input type="text" name="utme" class="form-control" id="utme" placeholder="UTME">

            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="utmn">*UTMN</label>
                <input type="text" name="utmn" class="form-control" id="utmn" placeholder="UTMN">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="">Consultar poço:</label>
                <br><a href="<?php echo base_url('adm/cons_poco/'); ?>" class="btn btn btn-info"><span class="glyphicon glyphicon-search"></span> Pesquisar</a>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="ponto">Ponto</label>
                <input type="text" name="ponto" class="form-control" id="ponto" placeholder="Ponto">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="sodio">Sódio</label>
                <input type="text" name="sodio" class="form-control" id="sodio" placeholder="Sódio">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="potassio">Potássio</label>
                <input type="text" name="potassio" class="form-control" id="potassio" placeholder="Potássio">
            </div>
        </div>
    
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="calcio">Cálcio</label>
                <input type="text" name="calcio" class="form-control" id="calcio" placeholder="Cálcio">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="magnesio">Magnésio</label>
                <input type="text" name="magnesio" class="form-control" id="magnesio" placeholder="Magnésio">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="cloretos">Cloretos</label>
                <input type="text" name="cloretos" class="form-control" id="cloretos" placeholder="Cloretos">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="sulfatos">Sulfatos</label>
                <input type="text" name="sulfatos" class="form-control" id="sulfatos" placeholder="Sulfatos">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="carbonatos">Carbonatos</label>
                <input type="text" name="carbonatos" class="form-control" id="carbonatos" placeholder="Carbonatos">
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="bicarbonatos">Bicarbonatos</label>
                <input type="text" name="bicarbonatos" class="form-control" id="bicarbonatos" placeholder="Bicarbonatos">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="condutividade_eletrica">Condutividade Elétrica</label>
                <input type="text" name="condutividade_eletrica" class="form-control" id="condutividade_eletrica" placeholder="Condutividade Elétrica">
            </div>
        </div>
        
        <div class="col-sm-1">
            <div class="form-group">
                <label for="ph">PH</label>
                <input type="text" name="ph" class="form-control" id="ph" placeholder="PH">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="fluor">Fluor</label>
                <input type="text" name="fluor" class="form-control" id="fluor" placeholder="Fluor">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="dureza">Dureza</label>
                <input type="text" name="dureza" class="form-control" id="dureza" placeholder="Dureza">
            </div>
        </div>
        <div class="col-sm-1">
            <div class="form-group">
                <label for="alcalinidade">&nbsp;&nbsp;&nbsp;&nbsp;Alcalinidade</label>
                <input type="checkbox" name="alcalinidade" class="form-control" id="alcalinidade" placeholder="Alcalinidade">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="solidos_tot_dissolvidos">Solidos Totais Dissolvidos</label>
                <input type="text" name="solidos_tot_dissolvidos" class="form-control" id="solidos_tot_dissolvidos" placeholder="Sólidos Totais Dissolvidos">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="temperatura">Temperatura</label>
                <input type="text" name="temperatura" class="form-control" id="temperatura" placeholder="Temperatura">
            </div>
        </div>
        
    </div>
    
    <div class="row">
        
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" name="data" class="form-control" id="data" placeholder="Data">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="responsavel">Responsável</label>
                <input type="text" name="responsavel" class="form-control" id="responsavel" placeholder="Responsável">
            </div>
        </div>
    </div>
    <button type="reset" class="btn btn-default btn-md">Limpar &nbsp;<span class="glyphicon glyphicon-repeat"></span></button>
    <button type="submit" class="btn btn-success btn-md">Cadastrar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>

    

</form>