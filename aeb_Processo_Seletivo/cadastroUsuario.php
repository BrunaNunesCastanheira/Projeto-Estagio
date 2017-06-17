<?php
//cadastro com sucesso deve levar para a pagina: cliente_cadastrado.php
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

    //1- Recuperar dados HTML
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["tel"];
	$cpf = $_POST["cpf"];
	$senha = $_POST["senha"];
	$senha2 = $_POST["senha2"];
	
	
	
    //2- Validar campos obrigatórios

	if(($nome == "")
	    OR ($email == "")
		OR ($telefone == "")
		OR ($cpf == "")
		OR ($senha == "")
		OR ($senha2 =="")) 
	{
		$msg =  "Campo obrigatório não preenchido!";
		header("Location: usuarios.php?m=$msg");
		exit;
	}
	
	if ($senha == $senha2){
	
		
	include ("conectar.php");
	
	mysqli_query($conexao,"insert into usuarios (nome,telefone,cpf,email,senha) values('$nome','$telefone','$cpf','$email','$senha')");
	$msg =  "Usuário cadastrado com sucesso";
		header("Location: usuarios.php?m=$msg");
	}
	else{
		$msg =  "As senhas são incompatíveis!";
		header("Location: usuarios.php?m=$msg");
		exit;
	}
	
	?>
