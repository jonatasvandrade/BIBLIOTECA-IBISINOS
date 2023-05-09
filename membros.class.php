<?php
require_once('conexao/conexao.php');

class Membros{
    public $nome;
    public $email;
    public $telefone;
    public $endereco;
    public $cidade;
    public $estado;
    public $cpf;
    public $ativo;
    public $codigo;

    function __construct($nome, $email, $telefone, $endereco, $cidade, $estado, $cpf, $ativo, $codigo){
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cpf = $cpf;
        $this->ativo = $ativo;
        $this->codigo = $codigo;
    } 

    function ConectaMembro(){
        CriaConexao();
    }

    function verificaAtivo(){
		if($this->ativo == ''){
			$this->ativo =	'N';
		}
	}

    function CadastraMembros(){
        //ConectaMembro();
        $mysqli = new mysqli("localhost", "root", "", "sistema");
        $consultaCriarMembro = "INSERT INTO membros (nome, email, telefone, endereco, cidade, estado, cpf, ativo) values ('".$this->nome."', '".$this->email."', '".$this->telefone."', '".$this->endereco."', '".$this->cidade."', '".$this->estado."', '".$this->cpf."', '".$this->ativo."')";
        $insertMembro = $mysqli->query($consultaCriarMembro);

        $recuperaMembro = $mysqli->query("SELECT codigo_membro FROM membros WHERE email = '$this->email' ORDER BY codigo_membro DESC LIMIT 1");
        echo $recuperaMembro->num_rows;
        if($recuperaMembro->num_rows > 0){
                $resposta="Inserido com sucesso";
                echo $resposta;
        }else{

            $resposta ="Erro ao inserir";
            echo $resposta;

        }
    }

    function AtualizaMembro(){
        //ConectaMembro();
        $mysqli = new mysqli("localhost", "root", "", "sistema");
        $consultaAtualizarMembros = "UPDATE membros SET nome = '$this->nome', email = '$this->email', telefone = '$this->telefone', endereco = '$this->endereco', cidade = '$this->cidade', estado = '$this->estado', cpf = '$this->cpf', ativo = '$this->ativo' WHERE codigo_membro = '$this->codigo'";
        $alterarMembros = $mysqli->query($consultaAtualizarMembros);
        echo $consultaAtualizarMembros."teste";
        
        /*
        $recuperaMembro = $mysqli->query("SELECT codigo_membro FROM membros WHERE email = '$this->email' ORDER BY codigo_membro DESC LIMIT 1");
        echo $recuperaMembro->num_rows;
        if($recuperaMembro->num_rows > 0){
                $resposta="Inserido com sucesso";
                echo $resposta;
        }else{

            $resposta ="Erro ao inserir";
            echo $resposta;

        }*/
    }

    //Funções secundárias

    function verificaMembro(){
		$consulta_membro = mysqli_query ("SELECT codigo_membro FROM Membros  WHERE  membro = '$this->login'" );
		$verifica_membro = mysqli_num_rows($consulta_membro);
		if($verifica_membro > 0){
			return true;
		}
		 return false;
	}

    function verificaEmail(){
		$consulta_email = mysqli_query ("SELECT codigo_membro FROM Membros  WHERE  email = '$this->email'" );
		$verifica_email = mysqli_num_rows($consulta_email);
		if($verifica_email > 0){
			return true;
		}
		return false;
	}

    function verificaEmailAtualizacao(){
		$verifica_email_atualizacao = mysqli_query("SELECT codigo_membro FROM Membros WHERE email = '$this->email' AND codigo_membro <> '$this->codigo'  ;");
			if(mysqli_num_rows($verifica_email_atualizacao) >= 1){
				return false;
			}
			return true;	
				
	}
	
	function verificaMembroAtualizacao(){
		$verifica_membro_atualizacao = mysqli_query("SELECT codigo_membro FROM Membros WHERE membro = '$this->login' AND codigo_membro <> '$this->codigo'  ;");
			if(mysqli_num_rows($verifica_membro_atualizacao) >= 1){
				return false;
			}
			return true;	
				
	}

    function deletaMembro(){
        $sql = mysqli_query("DELETE FROM membros WHERE codigo_membro='$codigo'");  
	    header("Location:administradores.php");
    }

}