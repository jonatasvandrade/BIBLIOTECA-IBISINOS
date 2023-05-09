<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<link rel="shortcut icon" href="imagens/favicon_.png" />
		
		<!--
		<script type="text/javascript" src="jquery/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="jquery/jquery-ui-1.8.23.custom.min.js"></script>

	    <script type="text/javascript" src="jquery/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="jquery/jquery.cycle.all.min.js"></script>
	    -->
	    
		<script src="http://code.jquery.com/jquery-latest.js"></script>
	    <script src="bootstrap/js/bootstrap.min.js"></script>
	    
	    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	    
	    <link rel="stylesheet" type="text/css" href="css/style.css"/>
   
		<title>Divelog</title>
	</head>
	
	<script>
	function troca_form(de,para)
	{
		document.getElementById('login'+de).style.display = 'none';
		document.getElementById('login'+para).style.display = 'block';
		
		if(de == "Login")
		{ document.getElementById('recup_user').value = document.getElementById('login_user').value; }
		else
		{ document.getElementById('login_user').value = document.getElementById('recup_user').value; }
	}
	
	function fechaAlerta(aid)
	{
		document.getElementById(aid).style.display = 'none';
	}
	
	function valida_login()
	{
		if(document.getElementById('login_user').value == '')
		{ document.getElementById('alerta1').style.display = 'block'; return false; }
		
		if(document.getElementById('login_pass').value == '')
		{ document.getElementById('alerta1').style.display = 'block'; return false; }
		
		return true;
	}
	
	function valida_recuperacao()
	{
		var erro = 0;
		
		if(document.getElementById('recup_user').value == '')
		{ erro = erro + 1; }
		
	//	if(document.getElementById('recup_email').value == '')
	//	{ erro = erro + 1; }
		
	//	if(erro == 2)
		if(erro == 1)
		{ document.getElementById('alerta1').style.display = 'block'; return false; }
		
		return true;
	}
	</script>
	
	<body>
		
		
		
		<br style="clear:both;">
		
		<div id="menu" style="background:#ebebeb;">
			<div class="cont_menu" >
				<div class="logo_login"><img src="imagens/18bimtz.png" style="height:60px;margin-left:50%;margin-top:-2px;border-radius:3px;" /></div><!--tirar style e width para logo final .jpg style="margin-left:30px;margin-top:7px;" width="170"-->
			</div>
		</div>
		
		<br style="clear:both;">
		
		<div id="container_login">
      	<div id="loginLogin" class="login_form">
				<!--FORM DEFAULT-->
				<form action="login-autentica.php" method="post" style="width:250px;margin:auto;">
					
               <legend>Login</legend>
					
					<div class="input-prepend">
					  <span class="add-on"><i class="icon-user icon-dark"></i></span><input class="span2" name="login_user" size="16" id="login_user" value="" type="text" placeholder="Usu&aacute;rio" style="width:210px;text-transform:uppercase;">
					</div>
					<div class="input-prepend">
					  <span class="add-on"><i class="icon-lock icon-dark"></i></span><input class="span2" name="login_pass" size="16" id="login_pass" type="password" placeholder="Senha" style="width:210px;text-transform:uppercase;">
					</div>
               <div class="input-prepend" style="height:30px;">
					  &nbsp;
					</div>
					<div class="esqueci_senha"><a href="#" onclick="javascript:troca_form('Login','Senha');">Esqueci minha senha</a></div>
					<button type="submit" class="btn btn-primary" style="float:right;margin-top:10px;">Entrar</button>
					<input type="text" name="token" value="login" style="display:none;"/>
				</form>
			</div>
			
			<div id="loginSenha" class="login_form" style="display:none; width:100%">
				<!--FORM DEFAULT-->
				<form action="login-autentica.php" method="post" target="iframe_login" onsubmit="javascript: return valida_recuperacao();" style="width:250px;margin:auto;">
					<legend>Recuperar Dados</legend>
					
					<div class="input-prepend" style="margin-bottom:5px;">
					  <span class="add-on"><i class="icon-user icon-dark"></i></span><input class="span2" size="16" type="text" name="recup_user" id="recup_user" placeholder="Usu&aacute;rio" style="width:210px;text-transform:uppercase;">
					</div>
               <div style="text-align:justify;font-size:12px;margin-bottom:30px;">Digite seu nome de usu&aacute;rio ou seu e-mail abaixo para receber seus dados de acesso.</div>
					<!--
					<div class="input-prepend">
					  <span class="add-on"><i class="icon-envelope icon-dark"></i></span><input class="span2" size="16" name="recup_email" id="recup_email" type="text" placeholder="E-mail" style="width:210px;">
					</div>
					-->
					<div class="esqueci_senha"><a href="#" onclick="javascript:troca_form('Senha','Login');">Fazer Login</a></div>
					<button type="submit" class="btn btn-primary" style="float:right;margin-top:10px;">Enviar</button>
					<input type="text" name="token" value="recuperacao" style="display:none;"/>
				</form>
			</div>
			
		</div>
		
		<div id="alerta1" class="alert alert-error" style="width:370px;margin:auto;display:none;margin-bottom:15px;">
			<button type="button" class="close" onclick="fechaAlerta('alerta1');">&times;</button>
			<h4>Ops! Usu&aacute;rio n&atilde;o encontrado.</h4>
			Verifique os dados informados e tente novamente...
		</div>
		
		<div id="alerta2" class="alert alert-info" style="width:370px;margin:auto;display:none;">
			<button type="button" class="close" onclick="fechaAlerta('alerta2');">&times;</button>
			<h4>Ops! Problemas com seu login.</h4>
			Seu usu&aacute;rio parece estar inativo, contate um administrador...
		</div>
		
		<div id="alerta3" class="alert alert-info" style="width:370px;margin:auto;display:<%=ses_exp%>;">
			<button type="button" class="close" onclick="fechaAlerta('alerta3');">&times;</button>
			<h4>Ops! Sua sess&atilde;o expirou.</h4>
			Parece que voc&ecirc; ficou muito tempo inativo, refa&ccedil;a seu login...
		</div>
      
      <div id="alerta4" class="alert alert-error" style="width:370px;margin:auto;display:none;margin-bottom:15px;">
			<button type="button" class="close" onclick="fechaAlerta('alerta4');">&times;</button>
			<h4>Ops! Filial n&atilde;o encontrada.</h4>
			Verifique os dados informados e tente novamente...
		</div>
		
		<iframe name="iframe_login" style="display:none;"></iframe>
      
      
		<script>
      </script>
		
   


