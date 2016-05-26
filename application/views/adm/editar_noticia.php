<form action="<?php echo(base_url())?>adm/gravar_edicao_noticia" method="post">
   <?php 
    echo form_fieldset('<h1><span class="glyphicon glyphicon-pencil"></span> Edição de Noticias</h1>');
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
                <input type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?php echo($noticia->idnoticias)?>" disabled>
                <input type="hidden" name="idnoticia" class="form-control" id="idnoticia" placeholder="ID" value="<?php echo($noticia->idnoticias)?>">
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-group">
                <label for="titulo">*Titulo</label>
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="TITULO" value="<?php echo($noticia->titulo)?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="noticia">*Noticia</label>
                <textarea rows="4" cols="50" name="noticia" class="form-control" id="noticia"><?php echo($noticia->corpo)?></textarea>
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
                        reset($autor);
                        if (count($autor)) {
                            foreach ($autor as $autor_cons) {
                                echo "<option value='".$autor_cons->idusuario . "'>" .$autor_cons->nomeautor . "</option>";
                            }
                        }
                    echo "</select><br/>";
                ?>
            </div>
        </div>
               
    </div>
    
    <button type="submit" class="btn btn-success btn-md">Salvar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
    <?php }?>
</form>
