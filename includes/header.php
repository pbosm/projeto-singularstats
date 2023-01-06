<?php
$url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], 'busca/'));
$url_title = explode("paginas/", $url);
$url_title = rtrim(end($url_title), "1.php");

if ($url_title == 'busca/buscacham') {
    $url_title = 'Buscando campeão';
} else if ($url_title == 'busca/buscatimes') {
    $url_title = 'Buscando time';
} else if ($url_title == 'busca/buscajogadores') {
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

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="../image/icone.png">

    <title>
        <?= ucfirst($url_title) ?>
    </title>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/aa4b28b8ec.js" crossorigin="anonymous"></script>
    
</head>

<body>