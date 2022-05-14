<?php
 //código para validação do acesso ao contéudo restrito, por meio do uso das variáveis de sessão. Esta validação deve estar presente em TODAS as páginas de conteúdo reservado
 //código para validação do acesso ao contéudo restrito, para não acontencer do usuário conseguir acessar através da URL a página
 //deverá ter um toda página restrita
 session_start();

 //teste para validarmos o acesso do usuário ao conteúdo restrito
 if(!isset($_SESSION['conectado']) OR $_SESSION['conectado'] != true) //operador de inversão !(não), é como um or/and | // SE você não encontrar a váriavel de sessão conectado entre aqui (embaixo) OU a sessão é diferente de true
  {
  //temos um acesso indevido do usuário. Encerramos a aplicação
  exit("<p> Você deve efetuar o cadastro ou passar pela validação de login. Aplicação encerrada! <a href='cadastro.php' title='Retornar ao cadastro'> Ir para o cadastro de usuário </a>");
  }

?>


