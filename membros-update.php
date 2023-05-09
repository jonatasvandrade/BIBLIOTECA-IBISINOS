<?php
include('membros.class.php');
CriaConexao();

$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$telefone = $_REQUEST['telefone'];
$endereco = $_REQUEST['endereco'];
$cidade = $_REQUEST['cidade'];
$estado = $_REQUEST['estado'];
$cpf = $_REQUEST['cpf'];
$ativo = $_REQUEST['ativo'];
@$codigo = $_REQUEST['codigo']; 

@$membros = new Membros($nome, $email, $telefone, $endereco, $cidade, $estado, $cpf, $ativo, $codigo);

if($_REQUEST['codigo'] == ""){
    $membros->verificaAtivo();
    $membros->CadastraMembros();	
}else{
    
    $membros->verificaAtivo();   
    $membros->AtualizaMembro();
}


?>