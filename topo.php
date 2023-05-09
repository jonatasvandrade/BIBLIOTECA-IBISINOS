<?php /*include_once("login-sessao.php")*/; 
/*include_once('conexao.php');*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>	
   <head>
<style>
#btn{
	margin-bottom:10px;		
	
}
.redes-sociais-cases{
	width:48px;
	height:48px;
	float:left;
	margin-left:5px;
}

.case-facebook{
	width:48px;
	height:48px;
	background:url(../imagens/case-facebook.fw.png) #075594;
	cursor:pointer;
}


.case-facebook:hover{
	background-position:0 -48px;	
}
.case-linkedin{
	width:48px;
	height:48px;
	background:url(../imagens/case-linkedin.fw.png) #075594;
	cursor:pointer;
}
.case-linkedin:hover{
	background-position:0 -48px;	
}

.case-twitter{
	width:48px;
	height:48px;
	background:url(../imagens/case-twitter.fw.png) #075594;
	cursor:pointer;
	
}


.case-twitter:hover{
	background-position:0 -48px;	
}

.case-doc{
	width:48px;
	height:48px;
	background:url(../imagens/case-doc.fw.png) #075594;
	cursor:pointer;
	
}


.case-doc:hover{
	background-position:0 -48px;	
}

.case-link{
	width:48px;
	height:48px;
	background:url(../imagens/case-link.fw.png) #075594;
	cursor:pointer;
	
}


.case-link:hover{
	background-position:0 -48px;	
}

.case-slideshare{
	width:48px;
	height:48px;
	background:url(../imagens/case-slideshare.fw.png) #075594;
	cursor:pointer;
	
}


.case-slideshare:hover{
	background-position:0 -48px;	
}

.case-google-plus{
	width:48px;
	height:48px;
	background:url(../imagens/case-google-plus.fw.png) #075594;
	cursor:pointer;
	
}


.case-google-plus:hover{
	background-position:0 -48px;	
}

.redes-sociais-link{
	width:300px;
	height:48px;
	margin-top:5px;
}

.info-redes-sociais{
	width:215px;
	height:100px;	
	float:left;
	color:#075594;
	margin-left:10px;
	margin-bottom:5px;
	font-size:16px;
}

.info-redes-sociais p{
	font-size:12px;
	color:#666;
}

.redes-sociais-cases2{
	width:220px;
	height:220px;
	background:#ebebeb;
	float:left;
	margin-left:5px;

}
</style>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>BIBLIOTECA IBISINOS</title>
		
		<!--<link rel="shortcut icon" href="imagens/geral/fav.png" />-->
		<!--
		<script type="text/javascript" src="jquery/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="jquery/jquery-ui-1.8.23.custom.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="jquery/jquery.cycle.all.min.js"></script>
		-->
     

      <script type="text/javascript" src="jquery/jquery.js"></script>
     	<script src="bootstrap/js/bootstrap.min.js"></script>
      <script src="js/mascaras_validacoes.js"></script>
      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/funcoes.js"></script>
      <script src="js/config_form.js"></script>
   
              
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
      
        
      
    
      
	</head>
	<script>
	function fechaAlerta(aid){
		$("#"+aid).fadeOut(300);
	}
	
	function confirma_exclusao(url, tabela, chave_campo, chave_valor, campo_exibicao, pagina, from){
		//alert('?tabela='+tabela+'&chave_campo='+chave_campo+'&chave_valor='+chave_valor+'&pagina='+pagina+'&from='+from);
		iframe_exclusao.location.href = url+'.php?tabela='+tabela+'&chave_campo='+chave_campo+'&chave_valor='+chave_valor+'&pagina='+pagina+'&from='+from;
	}
	
	function confirma_exclusao_banner(url, tabela, chave_campo, chave_valor, campo_exibicao, pagina, from,idioma){
		//alert('?tabela='+tabela+'&chave_campo='+chave_campo+'&chave_valor='+chave_valor+'&pagina='+pagina+'&from='+from);
		iframe_exclusao.location.href = url+'.php?tabela='+tabela+'&chave_campo='+chave_campo+'&chave_valor='+chave_valor+'&pagina='+pagina+'&from='+from+'&idioma='+idioma;
	}
	
	$.fn.datepicker.dates['en'] = {
		 days: ["Domingo", "Segunda", "Terca", "Quarta", "Quinta", "Sexta", "Sabado", "Domingo"],
		 daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"],
		 daysMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"],
		 months: ["Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
		 monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]
	};
	
		
	</script>
  <body style="">
		<iframe name="iframe_exclusao" style="display:none;width:100%;"></iframe>
		<div id="menu" style="background:#ebebeb;">
			<div class="cont_menu">
				<a href="../index.php" target="_blank" style="cursor:pointer; width:120px;"><div class="logo"><img src="imagens/logo.png" style="width: 50px; margin-top:5px; margin-left:15px; border-radius:3px;"/></div></a>
				<div class="navbar navbar-static" style="width:880px;float:right;">
					<div class="navbar-inner">
						<div class="container">
							<ul class="nav" role="navigation">
                                <li style="width:90px;"><ul class="nav pull-right nav-pills">
								<li style="width:60px;" id="fat-menu" class="dropdown">
                                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Livros</a>
                                        <ul class="dropdown-menu " >
                                            <li><a tabindex="-1" href="livros.php">&nbsp;Teologia</a></li>
                                            <li><a tabindex="-1" href="livros.php">&nbsp;Leitura</a></li>
                                            <li><a tabindex="-1" href="alivros.php">&nbsp;Infanto-juvenil</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                            	</li>
                                <li style="width:65px;"><a href="administradores.php">Usuários</a></li>
								<li style="width:65px;"><a href="locacoes.php">Locações</a></li> 
								<li style="width:65px;"><a href="membros.php">Membros</a></li> 
								<!--<li><a href="administradores.php">Administradores</a></li>-->
                        
                        	</ul>
							<ul class="nav pull-right nav-pills">
								<li id="fat-menu" class="dropdown">
								<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php /*echo substr($_SESSION['div.usuario.nome'],0,8);*/ ?>&nbsp;<b class="caret"></b></a>
									<ul class="dropdown-menu " >
										<li><a tabindex="-1" href="administradores.php"><i class="icon-user"></i>&nbsp;Administradores</a></li>
                                        <li><a tabindex="-1" href="login-autentica.php?logout=1"><i class="icon-off"></i>&nbsp;Encerrar sess&atilde;o</a></li>
									</ul>
								</li>
							</ul>
                     
						<!--<div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>-->
                  	<!--<ul class="nav pull-right">
								<li id="fat-menu" class="dropdown">
								<a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">abc<b class="caret"></b></a>
									<ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
										<li><a tabindex="-1" href="processa_login.asp?token=logout"><i class="icon-off"></i>&nbsp;Encerrar sess&atilde;o</a></li>
									</ul>
								</li>
							</ul>-->
                  </div>
					</div>
				</div>
			</div>
		</div>
		<br style="clear:both;">
		<div id="container">
      
