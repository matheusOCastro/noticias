<form action=cadastrar_autor method="post">
   <?php 
    echo form_fieldset('<h1><span class="glyphicon glyphicon-user"></span> Cadastro de novos autores</h1>');
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
                <label for="nome">*Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="NOME">

            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="login">*Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="LOGIN">
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="form-group">
                <label for="senha">*Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="SENHA">
            </div>
        </div>
    </div>
    
       
    <button type="reset" class="btn btn-default btn-md">Limpar &nbsp;<span class="glyphicon glyphicon-repeat"></span></button>
    <button type="submit" class="btn btn-success btn-md">Cadastrar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
</form>

<img src="<?php echo(base_url()) ?>assets/img/hr.png" WIDTH="100%" height="3" ALT="hr">

<div class="registros">
    <h4><span class="glyphicon glyphicon-search"></span> Pesquisar Autores</h4>
    <form action="<?php echo(base_url())?>adm/autor" method="post">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="autorcons">Nome</label>
                    <input type="text" name="autorcons" class="form-control" id="autorcons" placeholder="NOME">
                </div>
            </div>
            
            <div class="col-sm-1">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-success btn-md">Consultar &nbsp;<span class="glyphicon glyphicon-search"></span></button>
            </div>
            
        </div>
            
            
        
        </div>
            
    </form>
    
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Autor</th>
                </tr>
            </thead>
            
            <tbody>
                <?php 
                    if(count($autor_cons) <= 0){
                        echo '<tr>';
                        echo '<td colspan="5" class="text-center">Nenhum registro encontrado</td>';
                        echo '</tr>';
                    }else{
                        foreach ($autor_cons as $autor_cons) { 
                ?>
                <tr>
                    <td><?php echo $autor_cons->nomeautor; ?></td>
                    <td width="220" class="text-center">
                        <a href="<?php echo base_url('adm/inativar_autor/'.$autor_cons->idusuario); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Deletar Autor?');"><span class="glyphicon glyphicon-trash"></span> Inativar</a>
                        <a href="<?php echo base_url('adm/editar_autor/'.$autor_cons->idusuario); ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    
    <?php
        //echo ($paginacao);
    ?>
</div>
