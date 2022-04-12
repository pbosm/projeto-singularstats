<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Login de usuário - Cadastro </title> 
  <link rel="stylesheet" href="formata-cadastro-usuario.css">
</head> 

<body> 

<div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h2>Cadastro de usuário</h2>
                        </div>


	<form action="cadastro.php" method="post">

		 <label class="alinha"> Nome completo: </label>
		 <input type="text" name="nome" autofocus required> <br> <br>
		
		 <label class="alinha"> E-mail: </label>
		 <input type="email" name="email" required> <br> <br>
		
		 <label class="alinha"> Login: </label>
		 <input type="text" name="login" required > <br> <br>
		
		 <label class="alinha"> Senha: </label>
		 <input type="password" name="senha" required> <br> <br>
		
		 <button class="buttonClass" type="submit" name="cadastrar"> Cadastrar usuário </button>
	
    </form>
  
	
	<?php

  //includes de conexão com o banco de dados
  require_once "./includes/dados-conexao.inc.php";
  require_once "./includes/definir-charset.inc.php";

  if(isset($_POST['cadastrar']))
   {
   require_once "./includes/cadastrar.inc.php";
   }

  require_once "./includes/desconectar.inc.php";		
	?>
  
                  </div>
            </div>
      </div>
</div>

</body>
</html>