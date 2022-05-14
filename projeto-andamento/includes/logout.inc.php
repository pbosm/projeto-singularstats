<?php
 //desconectar o usuário da nossa aplicação web
 $_SESSION = array();
 session_destroy();
 header("location: ../index.php");