<?php 
    include ("header.php"); 
    include("conectar.php");   
	//echo $_GET["id"] . "<p>";
	$user = $_GET["id"];
	$sql = "SELECT * FROM usuarios WHERE idUsuario = '$user'";
	
    $resultado = mysqli_query($conexao,$sql);
	
	$arResultado = mysqli_fetch_assoc($resultado);
	
	header('Content-Type: text/html; charset=utf-8');
    
?>
<body>
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/main.js"></script>
   
    <header>
      <nav class="navbar navbar-default">
         <div class="container">
            <div class="navbar-brand">
               Processo Seletivo da Agência Espacial Brasileira(AEB)
            </div>
         </div>
      </nav>
   </header>

   <div class="container margem-topo">
      <div class="panel-body">

    <div class="page-header">
               <h3>Dados do usuário: <?= $arResultado['nome'];?> </h3>
    </div><!--fechar div page-header-->
     
		<div class="form-group">
            <label for="nome">Identificação: </label>  
            <?= $arResultado['idUsuario'];?>
						
       </div><!--fechar div form-group-->
	   
       <div class="form-group">
            <label for="nome">E-mail: </label>  
            <?= $arResultado['email'];?> 
       </div><!--fechar div form-group-->
	   
	   <div class="form-group">
            <label for="nome">Telefone: </label>  
            <?= $arResultado['telefone'];?> 
       </div><!--fechar div form-group-->
	   
	   <div class="form-group">
            <label for="nome">CPF: </label>  
            <?= $arResultado['cpf'];?> 
       </div><!--fechar div form-group-->

       <div class="form-group">
            <label for="nome">Definição de Senha: </label>  
            <?= $arResultado['senha'];?> 
       </div><!--fechar div form-group-->
       
        
            
            
					 
					<a class="btn btn-warning" href="usuarios.php?>">
                      <span class="fa fa-angle-double-left"> VOLTAR</span>
                              
					</a> 
					
                  </div>
				  </div>
				  
				  
              
			   
     </body>

</html>