<?php include("topo.php") ?>
<?php
	/*@$filtro_nome = $_SESSION["div.filtro.locacoes.nome"];
	@$filtro_usuario = $_SESSION["div.filtro.locacoes.usuario"];
	@$filtro_email = $_SESSION["div.filtro.locacoes.email"];
	@$paginacao = $_SESSION["div.filtro.locacoes.paginacao"];
	if(trim($paginacao) == ""){
		$paginacao = 1;	
	}*/
	
?>

<!--TITULO COM BOTOES-->
<h2 style="float:left;">Locações</h2>
<a href="locacoes-form.php"><button type="button" class="btn btn" style="float:right;margin-top:17px;margin-right:5px;"><i class="icon-plus icon-dark"></i>&nbsp;Adicionar</button></a>
<button type="button" id="botao_filtrar" class="btn" onClick="javascript:$(this).button('toggle');" style="float:right;margin-top:17px;margin-right:5px;"><i id="imagem_filtrar" class="icon-filter icon-white"></i>&nbsp;Filtrar</button>
<br style="clear:both;">
<hr><br>

<!--ALERTA-->
<div id="alerta_delete" class="alert alert-error" style="margin:auto;display:none;margin-bottom:15px;">
	<button type="button" class="close" onclick="fechaAlerta('alerta_delete');">&times;</button>
	<h4 id="alerta_delete_titulo"></h4>
	<div id="alerta_delete_itens" style="margin-top:-21px;">
	</div>
</div>

<!--PESQUISAR-->	
<div id="box_filtrar" class="well" style="display: none;">
	<form class="form-inline" style="margin-bottom: 0px;" onSubmit="javascript: executa_filtro();">
		<div style="margin-bottom:15px;">
			<div class="filtro_item">
				<label>Nome</label><br>
				<input type="text" maxlength="50" name="nome" id="nome" value="" style="width:410px;  height:30px; text-transform:uppercase;">
			</div>
         <div class="filtro_item">
				<label>Usu&aacute;rio</label><br>
				<input type="text" maxlength="50" name="usuario" id="usuario" value="" class="span3" style=" height:30px; text-transform:uppercase;">
			</div>
        
		</div>
      <div class="filtro_item">
				<label>Email</label><br>
				<input type="text" maxlength="50" name="email" id="email" value="" class="span3" style="height:30px; text-transform:uppercase;">
			</div>
        
		<br style="clear:both;"><hr><br>
		<a href="javascript:void(0);" onClick="javascript: pesquisar();" class="btn btn-primary" style="float:right;"><i class="icon-search icon-white"></i>&nbsp;Pesquisar</a>
		<a href="javascript:void(0);" onClick="javascript: limpar();" class="btn" style="float:right;margin-right:5px;"><i class="icon-remove icon-dark"></i>&nbsp;Limpar</a>
		<br style="clear: both;">
	</form>
</div>


<!--TABELA-->
<table class="table table-hover table-condensed table-bordered" style="font-size:14px;">
	<thead>
		<tr>
			<th width="25%">Nome</th>
			<th width="25%">Usu&aacute;rio</th>
         <th width="25%">E-mail</th>
         <th width="4%" style="text-align:center;">Ativo</th>
		</tr>
	</thead>
    <tbody>
		<tr>
			<td width="25%">Nome</td>
			<td width="25%">Usu&aacute;rio</td>
             <td width="25%">E-mail</td>
             <td width="4%" style="text-align:center;">Ativo</td>
		</tr>
	</tbody>
    
	<tbody id="conteudo_grid">
    
	</tbody>
</table>

<!--NUMERO DE REGISTROS-->
<div id="numero_registros"></div>

<!--PAGINACAO-->
<div id="paginacao" class="pagination pagination-centered"></div>

<script>

//oculta janela modal
$("#validate-modal-alert").modal("hide").removeClass("hidden");

//carrega os dados da grid via ajax
$("#conteudo_grid").load('locacoes_ajax.php', function(response, status, xhr) {
	if (status == "success")
	{ }
});

//CONFIGURA A PAGINAÇÃO

var pagina_atual = '';

//EXECUTA A PAGINAÇÃO
paginacao('locacoes_ajax.php','<?php echo $paginacao; ?>');

//SETA OS FILTROS
config_form(document.getElementById('nome'),'<?php /*echo $filtro_nome;*/ ?>');
config_form(document.getElementById('usuario'),'<?php /*echo $filtro_usuario;*/ ?>');
config_form(document.getElementById('email'),'<?php /*echo $filtro_email;*/ ?>');

//LIMPA FILTROS
function limpar(){
	config_form(document.getElementById('nome'),'');
	config_form(document.getElementById('usuario'),'');
	config_form(document.getElementById('email'),'');
}

//SUBMIT DOS FILTROS
function executa_filtro(){
	pesquisar();
	return false;
}

//EXECUTA OS FILTROS
function pesquisar(){
	var url = '';
	url = 'filtro=sim&nome='+$("input[name='nome']").val()+'&email='+$("input[name='email']").val()+'&usuario='+$("input[name='usuario']").val();
	paginacao('locacoes_ajax.php?'+url,pagina_atual);
	$("#botao_filtrar").button('toggle');
}
</script>



<?php /*include("rodape.php")*/ ?>