<?php
$url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], 'busca/'));
$url_title = explode("paginas/", $url);
$url_title = rtrim(end($url_title), "1.php");

if($url_title == 'busca/buscacham') {
    $url_title = 'Buscando campeão';
} else if ($url_title == 'busca/buscatimes') {
    $url_title = 'Buscando time';
} else if ($url_title == 'busca/buscajogadores'){
    $url_title = 'Buscando jogadores';
} else if ($url_title == 'campeoes') {
    $url_title = 'Campeões';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= ucfirst($url_title) ?> </title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" href="./image/icone.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="../image/icone.png">
</head>

<body>