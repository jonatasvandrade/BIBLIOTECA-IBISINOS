<?php
	require("phpmailer/class.phpmailer.php"); //inclui a página class.phpmailer.php
	@$logout = $_REQUEST['logout'];  
  	@$recup_user = $_REQUEST['recup_user'];
	$token = $_REQUEST['token']; 
	$host="localhost";
	$user="root";
	$pass="";
	$banco="gerenciador";
	$conexao = mysql_connect($host , $user , $pass ) or die(mysql_error());
	mysql_select_db($banco) or die (mysql_error());	
	echo $recup_user;
	
	if($logout==1){
		
		session_start();
		//unset($_SESSION['usuario']);
		session_destroy();
		header('Location: login.php');
		
	}elseif($recup_user != "" /*&& $token = "recuperacao"*/ ){
		$recup = mysql_query("SELECT * FROM administradores WHERE usuario='$recup_user';",$conexao) or die('ERROR');
		$recup_row = mysql_fetch_array($recup, MYSQL_BOTH);
		$verificacao = mysql_num_rows($recup);
		if($verificacao == 1){
		}
		
			$mail = new PHPMailer(); //instancia o objeto PHPMailer
			$mail->IsSMTP(); //informa que foi trabalhar com SMTP
			$mail->Host = "10.10.10.13"; //o endereço do meu servidor smtp
			$mail->SMTPAuth = true; //informo que o servidor SMTP requer autenticação
			$mail->Username = "no-reply"; //informo o usuário para autenticação no SMTP
			$mail->Password= '$rpl'; //informo a senha do usuário para autenticação no SMTP
			$mail->From = "jonataso13@hotmail.com"; //informo o e-mail Remetente
			$mail->FromName = 'Suporte SecInfo'; //o nome do que irá aparecer para a pessoa que vai receber o e-mail
			$mail->AddAddress($recup_row['email']); //e-mail do destinatário
			$mail->WordWrap = 50; //informo a quebra de linha no e-mail (isso é opcional)
			$mail->IsHTML(true); //informo que o e-mail é em HTML (opcional)
			$mail->Subject = "Sua senha do SecInfo"; //informo o assunto do e-mail
			$mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Formul&aacute;rio de Contato</title>
			</head>
			<body>
			
			<table align="center" cellpadding="0" cellspacing="0" border="0" width="800">
				<tr>
					<td>
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="630">
							<tr>
								<td align="left" width="115" height="50"><img src="templates/topo.jpg"/></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align="center">
						<table align="center" border="0" cellpadding="0" cellspacing="0" width="630">
							<tr>
								<td align="left">&nbsp;</td>
								<td height="10" colspan="7" align="left" valign="top">
								<!--<font color="#DF9B00" size="2" face="Arial">-->
								<font color="#666" size="2" face="Arial">
									<p>Sua senha é '.$recup_row['senha'].'</p>
								</font>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table align="center" cellpadding="0" cellspacing="0" border="0" width="630">
							<tr>
								<td align="left" width="115" height="3"><img src="templates/rodape.jpg"/></td>
							</tr>
						</table>
					</td>
				</tr>      
			</table>
			</body>
			</html>'; //aqui vai o corpo do e-mail em HTML
			$mail->Send(); //Enfim, envio o e-mail.
			$vv=$mail->Send();
			if(isset($vv)){
				echo 'enviou';	
			}
	
	}
	else{ 
		$usuario = $_POST['login_user'];
		$senha = $_POST['login_pass'];
	
		if($usuario!='' && $senha !=''){
			if (!ereg ("[^áéíóúÁÉÍÓÚãõÃÕçÇ~!#@$%^&*()_+=-.]", $usuario && $senha)) {
				
				$login = mysql_query("SELECT * FROM administradores WHERE usuario='$usuario' AND senha='$senha' AND ativo='S' ;",$conexao) or die('ERROR');
				$login_row = mysql_fetch_array($login, MYSQL_BOTH);
				
				$confirmacao = mysql_num_rows($login);
				
				if($confirmacao==1 ){
					session_start('Logar');
					$_SESSION['div.usuario.logado'] = true;
					$_SESSION['div.usuario.codigo'] = $login_row["codigo_administrador"];
					$_SESSION['div.usuario.usuario'] = $usuario;
					$_SESSION['div.usuario.nome'] = $login_row["nome"];
					$_SESSION['div.usuario.email'] = $login_row["email"];
					header('Location: default.php');
				  } else {
					 $m = "Login inv&aacute;lido!";
					header('Location: login.php');
				  }
			}else{ 
				header('Location: login.php');
			}
		}else{ 
				header('Location:login.php');
			}

	}
	
	






?>