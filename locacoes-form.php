<?php include("topo.php") ?>
<script src="js/funcoes.js"></script>
<?php
/*	include_once('conexao.php');*/
?>


<?php
/*	
		@$codigo = $_REQUEST['codigo'];*/
		$nome='';
		$usuario='';
		$senha='';
		$email='';
		$ativo='';
		$excluir='';
		/*if($codigo!=""){
		$resultado = mysql_query("SELECT * FROM administradores WHERE codigo_administrador=".$codigo.";",$conexao);
		while ($row = mysql_fetch_array($resultado, MYSQL_BOTH)) {
			$nome=$row["nome"];
			$usuario=$row["usuario"];
			$senha=$row["senha"];
			$email=$row["email"];
			$ativo=$row["ativo"];
			}
		}
		
	*/
?>
<script>
function valida_form()
{
	var msg = '';
	var erro = 0;
	
	if(document.getElementById('nome').value == '')
	{
		document.getElementById('nome_div').className = 'control-group error';
		erro = erro+1;
		if(erro == 1)
		{ msg = 'O campo nome &eacute; um campo obrigat&oacute;rio.'; }
		else
		{ msg = msg+'<br>O campo nome &eacute; um campo obrigat&oacute;rio.'; }
	}
	
	if(document.getElementById('email').value == '')
	{
		document.getElementById('email_div').className = 'input-prepend control-group error';
		erro = erro+1;
		if(erro == 1)
		{ msg = 'O campo email &eacute; um campo obrigat&oacute;rio.'; }
		else
		{ msg = msg+'<br>O campo email &eacute; um campo obrigat&oacute;rio.'; }
	}else{
		if(!ValidaEmail(document.getElementById('email').value)){
			document.getElementById('email_div').className = 'input-prepend control-group error';
			erro = erro+1;
			if(erro == 1)
			{ msg = 'O email informado n&atilde;o &eacute; v&aacute;lido.'; }
			else
			{ msg = msg+'<br>O campo email &eacute; um campo obrigat&oacute;rio.'; }
		}
	}
	
	if(document.getElementById('usuario').value == '')
	{
		document.getElementById('usuario_div').className = 'input-prepend control-group error';
		erro = erro+1;
		if(erro == 1)
		{ msg = 'O campo usuario &eacute; um campo obrigat&oacute;rio.'; }
		else
		{ msg = msg+'<br>O campo usuario &eacute; um campo obrigat&oacute;rio.'; }
	}
	
	if(document.getElementById('senha').value == '')
	{
		document.getElementById('senha_div').className = 'input-prepend control-group error';
		erro = erro+1;
		if(erro == 1)
		{ msg = 'O campo senha &eacute; um campo obrigat&oacute;rio.'; }
		else
		{ msg = msg+'<br>O campo senha &eacute; um campo obrigat&oacute;rio.'; }
	}
	
	if(msg != '')
	{
		document.getElementById('alerta_form_itens').innerHTML = msg;
		$("#alerta_form").fadeIn(300);
		return false;
	}
	
	document.getElementById('alerta_form').style.display = 'none';
	return true;
}

function digito(aid)
{
	if(aid == 'usuario' || aid == 'senha' || aid == 'email')
	{ document.getElementById(aid+'_div').className = 'input-prepend'; }
	else
	{ document.getElementById(aid+'_div').className = ''; }
}

$("#validate-modal-alert").modal("hide").removeClass("hidden");
	
</script>

<!--FORM DEFAULT-->
<form id="form_usuarios" name="form_usuarios" action="administradores-update.php" target="iframe_usuarios" method="post" onsubmit="javascript: return valida_form();" style="">

	<!--TITULO COM BOTOES-->
	<h2 style="float:left;">Administradores</h2>
	<a href="administradores.php"><button type="submit" class="btn btn-success" value="salvar" id="btn_salvar_top" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-ok icon-white"></i>&nbsp;Salvar</button></a>
	<a href="administradores.php" class="btn" id="btn_voltar_top" style="float:right;margin-top:17px;margin-right:5px;"><i class="icon-chevron-left icon-dark"></i>&nbsp;Voltar</a>
	<br style="clear:both;">
	<hr><br>
	
	<!--ALERTA-->
	<div id="alerta_delete" class="alert alert-error" style="margin:auto;display:none;margin-bottom:15px;">
		<button type="button" class="close" onclick="fechaAlerta('alerta_delete');">&times;</button>
		<h4 id="alerta_delete_titulo"></h4>
		<div id="alerta_delete_itens" style="margin-top:-21px;">
		</div>
	</div>
	
	<!--ALERTA-->
	<div id="alerta_form" class="alert alert-error" style="margin:auto;display:none;margin-bottom:15px;">
		<button type="button" class="close" onclick="fechaAlerta('alerta_form');">&times;</button>
		<div id="alerta_form_itens">
		</div>
	</div>

<div style="float:left;">
	
 
	
		<input type="text" maxlength="200" name="codigo" id="codigo" value="<?php echo '$codigo'; ?>" onkeypress="digito('codigo');" onkeydown="digito('nome');" style="width:425px; display:none; height:30px; text-transform:uppercase;">
	
   
   
   
	<div style="float:left;">
		<label>Nome</label>
		<div id="nome_div" class="">
			<input type="text" maxlength="200" name="nome" id="nome" value="<?php echo $nome; ?>" onkeypress="digito('nome');" onkeydown="digito('nome');" style="width:425px; height:30px; text-transform:uppercase;">
		</div>
	</div>
   
   <br style="clear:both;"/>
   
   <div style="float:left;margin-right:20px;">
		<label>Usu&aacute;rio</label>
		<div id="usuario_div" class="input-prepend">
			<span class="add-on"><i class="icon-user icon-dark"></i></span><input type="text" maxlength="50" name="usuario"  id="usuario" value="<?php echo $usuario; ?>" onkeypress="digito('usuario');" onkeydown="digito('usuario');" style="width:169px; height:30px; text-transform:uppercase;">
		</div>
	</div>
   
   <div style="float:left;">
		<label>Senha</label>
		<div id="senha_div" class="input-prepend">
			<span class="add-on"><i class="icon-lock icon-dark"></i></span><input type="password" maxlength="50" name="senha"  id="senha" value="<?php echo $senha; ?>" onkeypress="digito('senha');" onkeydown="digito('senha');" style="width:180px;height:30px;text-transform:uppercase;">
		</div>
	</div>
   
   <br style="clear:both;"/>
   
   <div style="float:left;">
		<label>E-mail</label>
		<div id="email_div" class="input-prepend">
			<span class="add-on"><i class="icon-envelope icon-dark"></i></span><input type="text" maxlength="200" name="email"  id="email" value="<?php echo $email; ?>" onkeypress="digito('email');" onkeydown="digito('email');" style="width:399px;height:30px;text-transform:uppercase;">
		</div>
	</div>
   
   <br style="clear:both;"/>
   
 
   
   <div style="float:left;margin-top:29px;">
      <label class="checkbox" >
        <input type="checkbox" name="ativo" <?php if($ativo=='S'){echo 'checked';} ?> value="S" > Ativo
		</label>
   </div>
   
</div>

	<input type="text" name="codigo_usuario" value="" style="display:none;">
	
	<br style="clear:both;"/><br>
	
	<hr>
	<a href="administradores.php"><button type="submit" class="btn btn-success" id="btn_salvar_bottom" value="salvar" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-ok icon-white"></i>&nbsp;Salvar</button></a>
	<a href="administradores.php"><button type="submit" class="btn btn-success" id="btn_continuar" value="continuar" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-ok icon-white"></i>&nbsp;Salvar e continuar</button></a>
	<a href="administradores.php"><button type="submit" class="btn btn-success" id="btn_novo" value="novo" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-plus icon-white"></i>&nbsp;Salvar e adicionar novo</button></a>
	
	<a href="#"	><button type="button" class="btn btn-danger" id="btn_remover" data-toggle="modal" data-target="#remove-modal-alert" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-trash icon-white"></i>&nbsp;Remover</button></a>
	
	<a href="administradores.php" class="btn" id="btn_voltar_bottom" style="float:right;margin-top:17px;margin-right:5px;"><i class="icon-chevron-left icon-dark"></i>&nbsp;Voltar</a>

</form>

<br style="clear:both;"/><br>

<iframe name="iframe_usuarios" style="display:none; width:500px;"></iframe>

<div class="modal hidden" id="remove-modal-alert">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4>Remover item </h4>
	</div>
	<div class="modal-body">
		<p>Voc&ecirc; tem certeza que deseja remover este item?</p>
	</div>
	<div class="modal-footer">
		<a id="cancel-remove-items-confirm" data-dismiss="modal" class="btn">N&atilde;o, manter este item</a>
		<a id="remove-items-confirm"  class="btn btn-danger"  href="administradores-delete.php?codigo=<?php echo '$codigo' ?>" >Sim, remover o item</a>
	</div>
</div>



<?php 'include("rodape.php")' ?>