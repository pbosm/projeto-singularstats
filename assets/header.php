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
    <meta charset="utf-8">
    <title> <?= ucfirst($url_title) ?> </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="../image/icone.png">
</head>

<body>