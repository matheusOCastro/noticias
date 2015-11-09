<div class="registros">
    <h4><span class="glyphicon glyphicon-search"></span> Pesquisar Poços</h4>
    <form action="<?php echo(base_url())?>adm/cons_poco" method="post">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="consutme">UTME</label>
                    <input type="text" name="consutme" class="form-control" id="consutme" placeholder="UTME" onkeypress="return SomenteNumeroCoord(event)">
                </div>
            </div>

            <div class="col-sm-2">
                <div class="form-group">
                    <label for="consutmn">UTMN</label>
                    <input type="text" name="consutmn" class="form-control" id="consutmn" placeholder="UTMN" onkeypress="return SomenteNumeroCoord(event)">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="conssituacao">Situação</label>
                    <select name="conssituacao" class="form-control" id="conssituacao">
                        <option selected value="%">Todos</option>
                        <option value="0">Indisponível</option>
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
                    <label for="consmunicipios_cod">Município</label>
                    <?php
                        echo "<select name='consmunicipios_cod' class='form-control' id='consmunicipios_cod'>";
                    ?>
                        <option value="%">Todos</option>
                    <?php
                            if (count($conscity)) {
                                foreach ($conscity as $conscity) {
                                    echo "<option value='".$conscity->cod_ibge . "'>" .$conscity->nome . "</option>";
                                }
                            }
                        echo "</select>";
                    ?>
                        
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
                    <th>Situação</th>
                    <th>Município</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                    if(count($poco) <= 0){
                        echo '<tr>';
                        echo '<td colspan="5" class="text-center">Nenhum registro encontrado</td>';
                        echo '</tr>';
                    }else{
                        foreach ($poco as $poco) { 
                ?>
                <tr>
                    <td><?php echo $poco->utme; ?></td>
                    <td><?php echo $poco->utmn; ?></td>
                    <td><?php echo $poco->situacao; ?></td>
                    <td><?php echo $poco->nome; ?></td>
                    <td width="220" class="text-center">
                        <a href="<?php echo base_url('adm/analises/'.$poco->utme.'/'.$poco->utmn); ?>" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-tint"></span> Selecioanar</a>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    
    <?php
        //echo ($paginacao);
    ?>
</div>
