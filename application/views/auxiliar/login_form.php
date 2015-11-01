<?php 

if (!isset ($_GET['retorno'])){
	$_GET['retorno'] = '';
}else{
	$retorno = $_GET['retorno'];	
}

if(isset($retorno)){
	if($retorno == 'campos-vazios'){
		echo "<script> sweetAlert('Oops...', 'Usuário e/ou senha em branco!', 'error')</script>";
	}else if($retorno == 'erro'){
		echo "<script> sweetAlert('Oops...', 'Usuário e/ou senha incorretos!', 'error')</script>";
	}
}
?>

<div class="form-group col-sm-4">

<form action=acao method="post">
  <div class="form-group">
    <label for="login">Usuário</label>
    <input type="text" name="login" class="form-control" id="login" placeholder="Usuário">
  </div>
  <div class="form-group">
    <label for="senha">Password</label>
    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
  </div>
  
  <button type="submit" class="btn btn-success btn-md">Logar &nbsp;<span class="glyphicon glyphicon-ok"></span></button>
</form>
</div>
