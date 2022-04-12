<?php
  $login   = trim($conn->escape_string($_POST['login']));
  $senha   = trim($conn->escape_string($_POST['senha']));

  //antes de buscar estes dados no banco de dados, vamos cripitografá-los
  $senhaCripto = hash("sha512", $senha);
  $loginCripto = hash("sha512", $login);

  $sql = "SELECT login, senha FROM usuarios WHERE login = '$loginCripto' AND senha = '$senhaCripto'";

  $conn->query($sql);

  //testando se os dados estão corretos 
  if($conn->affected_rows <= 0)
   {
   exit("<p> Dados de login incorretos. Tente novamente! </p>");
   }

  //variável de sessão
  session_start();
  $_SESSION["conectado"] = true;

  header("location: pagina-home.php"); //tudo certo, indo para essa página <