<?php

$host     = "localhost"; //127.0.0.1
$usuario  = "root";
$senha    = "";
$bd       = "beise2";
                                                            //Essa forma funciona criando um banco de dados manualmente atráves de sites/app como PHPMYADMIN ou mysqli, e caso para as TABELAS também
if( $conn = mysqli_connect($host, $usuario, $senha, $bd) ) //conectando ao banco de dados $conn Key primay para chamadas do bd
    {
        //echo "Conectado!";
    } else 
        echo "Erro!";

        $conn->select_db($bd);


?>

 