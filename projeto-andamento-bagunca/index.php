<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Login </title> 
  <link rel="stylesheet" type="text/css" href="index.pagina.css">
</head> 

<body> 

<div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h2>Login</h2>
               </div>

               <form action="index.php" method="post">
              
               <label class="alinha"> Login: </label>
		           <input type="text" name="login"> <br> <br>

               <label class="alinha"> Senha: </label>
		           <input type="password" name="senha">
		           <br> <br>
		
		           <button class="buttonClass" type="submit" name="logar"> Efetuar login </button>
     
               <button class="buttonClass">
               <a type="submit" name="cadastro" href="cadastro.php"> Cadastrar usuário </a> 
               </button>

               <button class="buttonClass">
               <a type="submit" name="cadastro-time" href="cadastro-time.php"> Cadastrar dados do time </a>
               </button>
               
               </form>

               <?php

                //acrescentar as includes de conexão com o banco de dados 
                require_once "./includes/dados-conexao.inc.php";
                require_once "./includes/definir-charset.inc.php";
              

                if(isset($_POST['logar']))
                {
                require_once "./includes/logar.inc.php";
                }

              require_once "./includes/desconectar.inc.php";		
                  
               ?>

               </div>
            </div>
      </div>
</div>
	

</body>
</html>