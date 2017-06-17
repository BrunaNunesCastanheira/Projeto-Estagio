	<?php

		
	    //1- Recuperar dados HTML
	$nome = $_POST["nome"];
	$idUser = $_POST["idUser"];
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
	
		
	//CONECTAR NO BANCO DE DADOS	
		$conexao = mysql_connect("localhost", "root", "");
	
	// VERIFICAR SE A CONEXAO FOI REALIZADA COM SUCESSO
		if(!$conexao){
			echo "<p>Não foi possível realizar a conexão com BD!";
		}
		
	// SELECIONAR O BANDO DE DADOS QUE SERÁ UTILIZADO
		$schema = mysql_select_db("aeb_user", $conexao);

	// VERIFICAR SE O BD FOI SELECIONADO COM SUCESSO
		if(!$schema){
			echo "<p>Não foi possível selecionar o BD!";
		}
	
// 6. CRIAR SCRIPT SQL

	$sql = "UPDATE usuarios SET nome = '$nome',telefone='$telefone',
	cpf='$cpf', email='$email', senha='$senha'
	WHERE idUsuario='$idUser'";
	
	

// 7. EXECUTAR SCRIPT SQL	
	$resultado = mysql_query($sql,$conexao);
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS	
	//NSA
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	if($resultado == TRUE){
		$msg = "Usuário atualizado com sucesso.";
		header("Location: usuarios.php?m=$msg");
		exit;
	}else{
		$msg = "Não foi possível atualizar os dados do visitante. Verifique!<br/>";
		$msg .= mysql_error();//msg de erro do BD
		header("Location: usuarios.php?m=$msg&i=$idUser");
		exit;
	}


	mysql_close($conexao);}
else{
		$msg =  "As senhas são incompatíveis!";
		header("Location: usuarios.php?m=$msg");
		exit;
	}
     ?>
