<?php 
include("topo.php"); 
require_once('conexao/conexao.php');

		CriaConexao();

		@$codigo = $_REQUEST['codigo'];
		if($codigo == ""){
			$nome='';
			$email='';
			$cidade= '';
			$endereco='';
			$cpf='';
			$ativo='';
			$estado='';
			$bairro = '';
			$excluir='';
			$telefone = '';
		}elseif($codigo!=""){

			//BuscaMembro($codigo);
			$mysqli = new mysqli("localhost", "root", "", "sistema");
			$query = "SELECT * FROM membros WHERE codigo_membro=".$codigo.";";
			$result = $mysqli->query($query);
			$row = $result->fetch_array(MYSQLI_BOTH);
			
			$nome = $row['nome'];
			$email= $row['email'];
			$cidade= $row['cidade'];
			$cpf= $row['cpf'];
			$endereco=$row['endereco'];
			$ativo= $row['ativo'];
			$estado= $row['estado'];
			$excluir= $row['excluido'];
			$telefone = $row['telefone'];
				
		}
		
	
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
	
	
	if(msg != '')
	{
		document.getElementById('alerta_form_itens').innerHTML = msg;
		$("#alerta_form").fadeIn(300);
		return false;
	}
	
	document.getElementById('alerta_form').style.display = 'none';
	return true;
}

$("#validate-modal-alert").modal("hide").removeClass("hidden");
	
</script>

<!--FORM DEFAULT-->
<form id="form_usuarios" name="form_usuarios" action="membros-update.php" target="iframe_usuarios" method="post" onsubmit="javascript: return valida_form();" style="">

	<!--TITULO COM BOTOES-->
	<h2 style="float:left;">Membros</h2>
	<a href="membros.php"><button type="submit" class="btn btn-success" value="salvar" id="btn_salvar_top" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-ok icon-white"></i>&nbsp;Salvar</button></a>
	<a href="membros.php" class="btn" id="btn_voltar_top" style="float:right;margin-top:17px;margin-right:5px;"><i class="icon-chevron-left icon-dark"></i>&nbsp;Voltar</a>
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
	
 
	
	<input type="text" maxlength="200" name="codigo" id="codigo" value="<?php echo $codigo; ?>" onkeypress="digito('codigo');" onkeydown="digito('codigo');" style="width:425px; display:block; height:30px; text-transform:uppercase;">
	
   
   
   
	<div style="float:left;">
		<label>Nome</label>
		<div id="nome_div" class="">
			<input type="text" maxlength="100" name="nome" id="nome" value="<?php echo $nome; ?>" onkeypress="digito('nome');" onkeydown="digito('nome');">
		</div>
	</div>
   
   <br style="clear:both;"/>
   
   <div style="float:left;">
		<label>E-mail</label>
		<div id="email_div">
			<input type="text" maxlength="50" name="email" class="campo-form" type="email"  id="email" value="<?php echo $email; ?>" onkeypress="digito('email');" onkeydown="digito('email');">
		</div>
	</div>
	<div style="float:left;">
		<label>Telefone</label>
		<div id="telefone_div">
			<input type="text" name="telefone" class="campo-form"  id="telefone" onkeyup="handlePhone(event)" maxlength="15" value="<?php echo $telefone; ?>">
		</div>
	</div>
	<div style="float:left;">
		<label>Endereço</label>
		<div id="endereco_div">
			<input type="text" name="endereco" class="campo-form"  id="endereco" value="<?php echo $endereco; ?>" onkeypress="digito('endereco');" onkeydown="digito('endereco');">
		</div>
	</div>
	<div style="float:left;">
		<label>Bairro</label>
		<div id="bairro_div">
			<input type="text" maxlength="50" name="bairro" class="campo-form"  id="bairro" value="<?php echo @$bairro; ?>" onkeypress="digito('bairro');" onkeydown="digito('bairro');">
		</div>
	</div>
	<div style="float:left;">
		<label>Cidade</label>
		<div id="cidade_div">
			<input type="text" maxlength="50" name="cidade" class="campo-form"  id="cidade" value="<?php echo $cidade; ?>" onkeypress="digito('cidade');" onkeydown="digito('cidade');">
		</div>
	</div>
	<div style="float:left;">
		<label>Estado</label>
		<div id="estado_div">
			<input type="text" maxlength="2" name="estado"  id="estado" value="<?php echo $email; ?>" onkeypress="digito('estado');" onkeydown="digito('estado');">
		</div>
	</div>
	<div style="float:left;">
		<label>CPF</label>
		<div id="cpf_div">
			
			<input type="text" maxlength="14" name="cpf"  id="cpf" value="<?php echo @$cpf; ?>" onkeypress="digito('cpf');" onkeydown="digito('cpf');">
		</div>
	</div>
	
   <br style="clear:both;"/>
   <script type="text/javascript">
	$(document).ready(function () { 
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
	</script>
 
   
   <div style="float:left;margin-top:29px;">
      <label class="checkbox" >
        <input type="checkbox" id="ativo" name="ativo" <?php if($ativo=='S'){echo 'checked';} ?> value="S"/> Ativo
		</label>
   </div>
   
</div>

	<input type="text" name="codigo_usuario" value="" style="display:none;">
	
	<br style="clear:both;"/><br>
	
	<hr>
	<button type="submit" class="btn btn-success" id="btn_salvar_bottom" value="salvar" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-ok icon-white"></i>&nbsp;Salvar</button>
	<a href="membros.php"><button type="submit" class="btn btn-success" id="btn_continuar" value="continuar" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-ok icon-white"></i>&nbsp;Salvar e continuar</button></a>
	<a href="membros.php"><button type="submit" class="btn btn-success" id="btn_novo" value="novo" name="btn" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-plus icon-white"></i>&nbsp;Salvar e adicionar novo</button></a>
	
	<a href="#"	><button type="button" class="btn btn-danger" id="btn_remover" data-toggle="modal" data-target="#remove-modal-alert" style="float:right;margin-top:17px;margin-right:5px;display:<%=visivel%>;"><i class="icon-trash icon-white"></i>&nbsp;Remover</button></a>
	
	<a href="membros.php" class="btn" id="btn_voltar_bottom" style="float:right;margin-top:17px;margin-right:5px;"><i class="icon-chevron-left icon-dark"></i>&nbsp;Voltar</a>

</form>

<br style="clear:both;"/><br>

<iframe name="iframe_usuarios" style="display:block; width:500px;"></iframe>

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
		<a id="remove-items-confirm"  class="btn btn-danger"  href="membros-delete.php?codigo=<?php echo '$codigo' ?>" >Sim, remover o item</a>
	</div>
</div>



<?php 'include("rodape.php")' ?>