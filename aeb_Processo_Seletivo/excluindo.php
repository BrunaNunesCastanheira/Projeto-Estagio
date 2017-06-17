<?php
// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
	$id = $_GET['id'];
	
	echo $id;
	
	
// 3. VALIDAR OS DADOS ENVIADOS PELO FORMULÁRIO(VALIDAÇÕES)
	// 3.1. VERIFICAR SE OS CAMPOS ESTÃO PREENCIDOS
	if($id == ""){
		$msg = "Nenhum usuário foi selecionado. Verifique!";
		header("Location: usuarios.php?m=$msg");
		exit;
	}	
//5. BANCO DE DADOS
include_once ("conectar.php");
// 6. CRIAR SCRIPT SQL	
	$s = "delete from usuarios where idUsuario = $id";
	echo $s;
		
// 7. EXECUTAR SCRIPT SQL
	$resultado = mysqli_query($conexao,$s);
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS
	if($resultado == true){
		$msg = "Excluido com sucesso.";		
		header("Location: usuarios.php?m=$msg");
		exit;
	}else{
		$msg = "Nao foi possivel excluir. Verifique!<br/>";
		$msg .= mysql_error();//msg de erro do BD		
		header("Location: usuarios.php?m=$msg&i=$id");
		exit;
	}

	
// 11. FECHAR CONEXÃO COM O BD
	mysqli_close($conexao);
?>
