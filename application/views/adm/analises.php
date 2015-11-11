<script type="text/javascript" src="<?php echo(base_url()) ?>assets/js/mascaras.js"></script>
<form action=<?php echo(base_url())?>adm/cadastrar_analise method="post">
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
                <input type="text" name="utme" class="form-control" id="utme" placeholder="UTME" onkeypress="return SomenteNumeroCoord(event)" value="<?php echo($utme)?>">

            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="utmn">*UTMN</label>
                <input type="text" name="utmn" class="form-control" id="utmn" placeholder="UTMN" onkeypress="return SomenteNumeroCoord(event)" value="<?php echo($utmn)?>">
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
                <input type="text" name="sodio" class="form-control" id="sodio" placeholder="Sódio" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="potassio">Potássio</label>
                <input type="text" name="potassio" class="form-control" id="potassio" placeholder="Potássio" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
    
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="calcio">Cálcio</label>
                <input type="text" name="calcio" class="form-control" id="calcio" placeholder="Cálcio" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="magnesio">Magnésio</label>
                <input type="text" name="magnesio" class="form-control" id="magnesio" placeholder="Magnésio" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="cloretos">Cloretos</label>
                <input type="text" name="cloretos" class="form-control" id="cloretos" placeholder="Cloretos" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="sulfatos">Sulfatos</label>
                <input type="text" name="sulfatos" class="form-control" id="sulfatos" placeholder="Sulfatos" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="carbonatos">Carbonatos</label>
                <input type="text" name="carbonatos" class="form-control" id="carbonatos" placeholder="Carbonatos" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="bicarbonatos">Bicarbonatos</label>
                <input type="text" name="bicarbonatos" class="form-control" id="bicarbonatos" placeholder="Bicarbonatos" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="condutividade_eletrica">Condutividade Elétrica</label>
                <input type="text" name="condutividade_eletrica" class="form-control" id="condutividade_eletrica" placeholder="Condutividade Elétrica" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
        <div class="col-sm-1">
            <div class="form-group">
                <label for="ph">PH</label>
                <input type="text" name="ph" class="form-control" id="ph" placeholder="PH" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="fluor">Fluor</label>
                <input type="text" name="fluor" class="form-control" id="fluor" placeholder="Fluor" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
        <div class="col-sm-2">
            <div class="form-group">
                <label for="dureza">Dureza</label>
                <input type="text" name="dureza" class="form-control" id="dureza" placeholder="Dureza" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        <div class="col-sm-1">
            <div class="form-group">
                <label for="alcalinidade">&nbsp;&nbsp;&nbsp;&nbsp;*Alcalinidade</label>
                <input type="checkbox" name="alcalinidade" class="form-control" id="alcalinidade" placeholder="Alcalinidade" value="sim">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="solidos_tot_dissolvidos">Solidos Totais Dissolvidos</label>
                <input type="text" name="solidos_tot_dissolvidos" class="form-control" id="solidos_tot_dissolvidos" placeholder="Sólidos Totais Dissolvidos" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <label for="temperatura">Temperatura</label>
                <input type="text" name="temperatura" class="form-control" id="temperatura" placeholder="Temperatura" onkeypress="return SomenteNumeroDouble(event)">
            </div>
        </div>
        
    </div>
    
    <div class="row">
        
        
        <div class="col-sm-3">
            <div class="form-group">
                <label for="data">*Data</label>
                <input type="date" name="data" class="form-control" id="data" placeholder="Data" value="<?php echo date('Y-m-d'); ?>">
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

<img src="<?php echo(base_url()) ?>assets/img/hr.png" WIDTH="100%" height="3" ALT="hr">

<div class="registros">
    <h4><span class="glyphicon glyphicon-search"></span> Pesquisar Análises</h4>
    <form action="<?php echo(base_url())?>adm/analises" method="post">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="poco_utme">UTME</label>
                    <input type="text" name="poco_utme" class="form-control" id="poco_utme" placeholder="UTME" onkeypress="return SomenteNumeroCoord(event)">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="poco_utmn">UTMN</label>
                    <input type="text" name="poco_utmn" class="form-control" id="poco_utmn" placeholder="UTMN" onkeypress="return SomenteNumeroCoord(event)">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" name="data" class="form-control" id="data" placeholder="Data">
                </div>
            </div>
            
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-success btn-md">Consultar &nbsp;<span class="glyphicon glyphicon-search"></span></button>
            </div>
        </div>
    
    </form>
    
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>UTME</th>
                    <th>UTMN</th>
                    <th>Data</th>
                    <th>Responsável</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                    if(count($analise) <= 0){
                        echo '<tr>';
                        echo '<td colspan="5" class="text-center">Nenhum registro encontrado</td>';
                        echo '</tr>';
                    }else{
                        foreach ($analise as $analise) { 
                ?>
                <tr>
                    <td><?php echo $analise->poco_utme; ?></td>
                    <td><?php echo $analise->poco_utmn; ?></td>
                    <td><?php echo $analise->data; ?></td>
                    <td><?php echo $analise->responsavel; ?></td>
                    <td width="160" class="text-center">
                        <a href="<?php echo base_url('adm/inativar_analise/'.$analise->sequencia); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Inativar Análise?');"><span class="glyphicon glyphicon-trash"></span> Inativar</a>
                        <a href="<?php echo base_url('adm/editar_analise/'.$analise->sequencia); ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    
    <?php
        //echo ($paginacao);
    ?>
</div>