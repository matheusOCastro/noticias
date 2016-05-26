<form action=cadastrar_noticia method="post">
   <?php 
    echo form_fieldset('<h1><span class="glyphicon glyphicon-pencil"></span> Cadastro de novas notícias</h1>');
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
        <div class="col-sm-8">
            <div class="form-group">
                <label for="titulo">*Titulo</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="TITULO">

            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="noticia">*Notícia</label>
                <textarea rows="4" cols="50" name="noticia" class="form-control" id="noticia"></textarea>
            </div>
        </div>    
    </div>
    
    <div class="row">
                
        <div class="col-sm-3">
            <div class="form-group">
                <label for="assunto">*Assunto</label>
                <select name="assunto" class="form-control" id="assunto">
                    <option selected value="1">Política</option>
                    <option value="2">Economia</option>
                    <option value="3">Educação</option>
                    <option value="4">Esportes</option>
                    <option value="5">Mundo</option>
                    <option value="6">Música</option>
                    <option value="7">Tecnologia</option>
                </select>
            </div>
        </div>
        
        <div class="col-sm-5">
            <div class="form-group">
                <label for="autor">*Autor</label>
                <?php
                    echo "<select name='autor' class='form-control' id='autor'>";
                        if (count($lista_autor)) {
                            foreach ($lista_autor as $autor) {
                                echo "<option value='".$autor->idusuario . "'>" .$autor->nomeautor . "</option>";
                            }
                        }
                    echo "</select><br/>";
                ?>
            </div>
        </div>
               
    </div>
    
    
    <button type="reset" class="btn btn-default btn-md">Limpar &nbsp;<span class="glyphicon glyphicon-repeat"></span></button>
    <button type="submit" class="btn btn-success btn-md">Cadastrar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
</form>

<img src="<?php echo(base_url()) ?>assets/img/hr.png" WIDTH="100%" height="3" ALT="hr">

<div class="registros">
    <h4><span class="glyphicon glyphicon-search"></span> Pesquisar Notícias</h4>
    <form action="<?php echo(base_url())?>adm/noticias" method="post">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="constitulo">Titulo</label>
                    <input type="text" name="constitulo" class="form-control" id="constitulo" placeholder="Titulo">
                </div>
            </div>

            <div class="col-sm-4">
                <div class="form-group">
                    <label for="consautor">Autor</label>
                    <?php
                        echo "<select name='consautor' class='form-control' id='consautor'>";
                    ?>        
                        <option value="%">Todos</option>
                        <?php
                        reset($lista_autor);
                            if (count($lista_autor)) {
                                foreach ($lista_autor as $cons_autor) {
                                    echo "<option value='".$cons_autor->idusuario . "'>" .$cons_autor->nomeautor . "</option>";
                                }
                            }
                        echo "</select><br/>";
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
        
            <div class="col-sm-3">
            <div class="form-group">
                <label for="consassunto">Assunto</label>
                <select name="consassunto" class="form-control" id="consassunto">
                    <option selected value="%">Todos</option>
                    <option value="1">Política</option>
                    <option value="2">Economia</option>
                    <option value="3">Educação</option>
                    <option value="4">Esportes</option>
                    <option value="5">Mundo</option>
                    <option value="6">Música</option>
                    <option value="7">Tecnologia</option>
                </select>
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
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Publicação</th>
                    <th>Assunto</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                    if(count($lista_noticia) <= 0){
                        echo '<tr>';
                        echo '<td colspan="5" class="text-center">Nenhum registro encontrado</td>';
                        echo '</tr>';
                    }else{
                        foreach ($lista_noticia as $lista_noticia) { 
                ?>
                <tr>
                    <td><?php echo $lista_noticia->titulo; ?></td>
                    <td><?php echo $lista_noticia->nomeautor; ?></td>
                        <?php $originalDate = $lista_noticia->dt_publicacao;
                              $newDate = date("d/m/Y", strtotime($originalDate));
                        ?>
                    <td><?php echo $newDate; ?></td>
                    <td><?php echo $lista_noticia->nome; ?></td>
                    <td width="220" class="text-center">
                        <a href="<?php echo base_url('adm/inativar_noticia/'.$lista_noticia->idnoticias); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Deletar noticia?');"><span class="glyphicon glyphicon-trash"></span> Inativar</a>
                        <a href="<?php echo base_url('adm/editar_noticia/'.$lista_noticia->idnoticias); ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    
    <?php
        //echo ($paginacao);
    ?>
</div>
