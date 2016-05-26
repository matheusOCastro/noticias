<form action="<?php echo(base_url())?>adm/gravar_edicao_autor" method="post">
    <?php 
    echo form_fieldset('<h1><span class="glyphicon glyphicon-tint"></span> Edição de Autores</h1>');
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
        foreach ($autor as $autor) { 
            
        
    ?>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label for="id">*ID</label>
                <input type="text" name="id" class="form-control" id="id" placeholder="ID" value="<?php echo($autor->idusuario)?>" disabled>
                <input type="hidden" name="idusuario" class="form-control" id="idusuario" placeholder="ID" value="<?php echo($autor->idusuario)?>">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="nome">*Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="NOME" value="<?php echo($autor->nomeautor)?>">
            </div>
        </div>
        
        
    </div>
    <div class="row">
        
        <div class="col-sm-4">
            <div class="form-group">
                <label for="login">*Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="LOGIN" value="<?php echo($autor->login)?>">
            </div>
        </div>
       
            
    </div>
    
    <button type="submit" class="btn btn-success btn-md">Editar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
<?php }?>
</form>