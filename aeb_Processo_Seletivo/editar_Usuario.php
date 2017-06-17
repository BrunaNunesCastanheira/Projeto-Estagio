<?php

	// recuperando id
	//Notice: Undefined index: id in C:\xampp\htdocs\visitantes\editar_Visitantes.php on line 5
	$idUser = $_GET["id"];
		
	//3- Conectar BD
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
	
	//5- Criar script SQL
	$sql = "SELECT * FROM usuarios WHERE idUsuario = '$idUser'";
	
	//6- Executar scrit no BD
	$resultado = mysql_query($sql, $conexao);
	
	//7- Converter formato para PHP
	$arResultado = mysql_fetch_assoc($resultado);
	

		
?>


			
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link  href="css/master.css" rel="stylesheet">
   <link  href="css/font-awesome.min.css" rel="stylesheet">

   <title>Editar Usuário</title>

   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link  href="css/master.css" rel="stylesheet">
</head>

<body>

   <header>
      <nav class="navbar navbar-default">
         <div class="container">
            <div class="navbar-brand">
               Processo seletivo de estágio da Agência Espacial Brasileira (AEB)
            </div>
         </div>
      </nav>
   </header>
 <div class="panel-body">

    <div class="page-header">
               <h3>Editar Usuário: <?= $arResultado['nome'];?></h3>
    </div><!--fechar div page-header-->
      <form method="POST" action="editando.php">
				<?php 
					if(isset($_GET['m'])){
					echo $_GET['m'];
					}
				?><br>

        <div class="form-group">
            <label for="nome">Usuário: </label>  
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $arResultado['nome'];?>"> 
       
            <input type="hidden" class="form-control" id="idUser" name="idUser" value="<?php echo $arResultado['idUsuario'];?>"> 
       
	   </div><!--fechar div form-group-->
       
       <div class="form-group">
            <label for="email">E-mail: </label>  
            <input type="email" class="form-control"  id="email" name="email" value="<?php echo $arResultado['email'];?>"> 
       </div><!--fechar div form-group-->
	   
	   <div class="form-group">
            <label for="tel">Telefone: </label>  
            <input type="text" class="form-control"  id="tel" name="tel" value="<?php echo $arResultado['telefone'];?>"> 
       </div><!--fechar div form-group-->
	   
	   <div class="form-group">
            <label for="cpf">CPF: </label>  
            <input type="text" class="form-control"  id="cpf" name="cpf" value="<?php echo $arResultado['cpf'];?>"> 
       </div><!--fechar div form-group-->

       <div class="form-group">
            <label for="senha">Definição de Senha: </label>  
            <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $arResultado['senha'];?>"> 
       </div><!--fechar div form-group-->

       <div class="form-group">
            <label for="senha2">Confirmação de Senha: </label>  
            <input type="password" class="form-control" id="senha2" name="senha2" value="<?php echo $arResultado['senha'];?>"> 
       </div><!--fechar div form-group-->

       <input type="submit" class="btn btn-success" name="button" value="EDITAR">
      </form>
	  <a class="btn btn-warning" href="usuarios.php?>">
            <span class="fa fa-angle-double-left"> VOLTAR </span> 
        </a>
     
</div>


		
		
         </div>

		</div>
		
		 
		 
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>