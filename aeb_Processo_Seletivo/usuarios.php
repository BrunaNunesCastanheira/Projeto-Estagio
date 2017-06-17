<?php 
    include ("header.php"); 
    include("conectar.php");        
?>
<body>
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/main.js"></script>
  


  <div class="container">
    <header>
      
        
            
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 align="center">Processo seletivo de estágio</h3><h1 align="center"> Agência Espacial Brasileira (AEB)</h1>  
				</div>
			</div>
			
        
     
   </header>

  
  <div class="panel-body">

    <div class="page-header">
               <h3>Cadastro de Usuários:</h3>
    </div><!--fechar div page-header-->
      <form method="POST" action="cadastroUsuario.php">
	  <?php 
						if(isset($_GET['m'])){
						echo $_GET['m'];
						}
				?><br>

        <div class="form-group">
            <label for="nome">Usuário: </label>  
            <input type="text" class="form-control" id="nome" name="nome"> 
       </div><!--fechar div form-group-->
       
       <div class="form-group">
            <label for="email">E-mail: </label>  
            <input type="email" class="form-control"  id="email" name="email"> 
       </div><!--fechar div form-group-->
	   
	   <div class="form-group">
            <label for="tel">Telefone: </label>  
            <input type="text" class="form-control"  id="tel" name="tel"> 
       </div><!--fechar div form-group-->
	   
	   <div class="form-group">
            <label for="cpf">CPF: </label>  
            <input type="text" class="form-control"  id="cpf" name="cpf"> 
       </div><!--fechar div form-group-->

       <div class="form-group">
            <label for="senha">Definição de Senha: </label>  
            <input type="password" class="form-control" id="senha" name="senha"> 
       </div><!--fechar div form-group-->

       <div class="form-group">
            <label for="senha2">Confirmação de Senha: </label>  
            <input type="password" class="form-control" id="senha2" name="senha2"> 
       </div><!--fechar div form-group-->

       <input type="submit" class="btn btn-success" name="button" value="Cadastrar">
      </form>
       <div class="page-header">
               <h3>Listagem dos Usuários:</h3>
			   
			   <?php 
						if(isset($_GET['m'])){
						echo $_GET['m'];
						}
			
						$consulta = "Select idUsuario,nome,senha from usuarios";
						$resultado = mysqli_query($conexao, $consulta) or die("Falha na execução da consulta");
				?><br>
				
    </div><!--fechar div page-header-->
		
    <div class="table-responsive">
	
    <table class='table table-bordered table-hover'>
      <thead>
      <tr class="active">
        <th>Identificação</th>
        <th>Usuário</th>
        <th>Senha</th>
        <th class="text-center">Ação</th>
      </tr>
      </thead>
	  
	  <?php 
						while ($linha = mysqli_fetch_assoc($resultado)) {
                        $vidUser = $linha["idUsuario"];
                        $vnome = $linha["nome"];
						$vsenha = $linha["senha"];?>
	  
	  <tbody>
      <tr>
        <td><?=$vidUser?></td>
        <td><?=$vnome?></td>
        <td><?=$vsenha?></td>
        <td class="text-center">
            <a class="btn btn-primary" href="visualizarUsuario.php?id=<?=$vidUser?>">
                <span class="fa fa-eye"> Visualizar</span> 
            </a>
            
			<a class="btn btn-info" href="editar_Usuario.php?id=<?=$vidUser?>">
                <span class="fa fa-refresh"> Editar</span>
            </a>
                       
                        
            <a class="btn btn-danger" href="excluindo.php?id=<?=$vidUser?>">             
                            <span class="fa fa-trash"> Excluir</span> 
            </a>
              
        </td>
      </tr>
	  <?php } ?> 
	  </tbody>
    </table>

    </div><!--fechar "table-responsive"-->
   </div><!--fechar div panel-body-->


 </div><!--fechar div container-->

 

</body>