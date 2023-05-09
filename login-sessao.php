<?php
//Inicia a sessão
session_start('Logar');
  
//Verifica se há dados ativos na sessão
if(empty($_SESSION["div.usuario.logado"])){
	//Caso não exista dados registrados, exige login
	header("Location:login.php");
}
 ?>