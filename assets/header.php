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
    <title>
        <?= ucfirst($url_title) ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="../image/icone.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;
            text-decoration: none;
        }

        :root {
            --black1: #131314;
            --black2: #0f0d1a;
            --white: #f5f5f5;
            --gray: rgb(172, 172, 172);
            --gray1: #999;
            --purple: #15151e;
        }

        body {
            min-height: 100vh;
            overflow: auto;
            background: var(--black1);
        }

        a {
            color: var(--gray1);
            text-decoration: none;
        }

        a:hover {
            color: var(--gray1);
        }

        .navbar-nav {
            list-style: inside;
        }

        .linear {
            background-color: var(--purple);
            height: 25px;
        }

        .navbar-expand-lg {
            background-color: #1c1c1c;
        }

        .logo-head {
            background-color: #1c1c1c;
            padding: 25px;
        }

        .form-search {
            height: 40px;
            border-radius: 40px;
            padding: 20px;
            font-size: 12px;
            background: #121212;
            color: #b8cbcd;
        }

        .title-menu {
            color: var(--white);
            text-transform: uppercase;
            font-weight: bold;
            font-size: 15px;
            font-family: monospace;
        }

        .home {
            margin: 10px;
        }

        .icons {
            margin: 5px;
        }

        .table-responsive {
            min-height: 500px;
            background: #1a1a1a;
            padding: 20px;
            box-shadow: 0 7px 25px rgb(0 0 0 / 50%);
            border-radius: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 96%;
        }

        .title-table {
            color: #0098ad;
            font-weight: bold;
            text-transform: uppercase;
            font-family: monospace;
            font-size: 15px;
            margin-left: 35px;
        }

        .btn-all-teams {
            padding: 5px 25px;
            background: var(--black1);
            text-decoration: none;
            color: var(--white);
            border-radius: 20px;
            font-size: small;
            text-transform: uppercase;
            font-family: monospace;
        }

        .btn-all {
            text-align: end;
        }

        .table tr {
            color: var(--gray1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table-responsive .table table tr td {
            padding: 5px 6px;
            text-align: center;
            text-transform: uppercase;
            font-family: monospace;
            padding-right: 6px;
        }

        .table>:not(caption)>*>* {
            padding-right: 18px;
        }

        .table>thead {
            vertical-align: middle;
            text-align: center;
        }

        .table>tbody {
            vertical-align: middle;
            text-align: center;
            text-transform: uppercase;
            font-size: 12px;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-style: none;
        }

        .table-responsive table thead td {
            font-weight: 600;
            text-transform: uppercase;
            font-family: monospace;
            color: rgb(118 123 187);
            font-size: 13px;
        }

        .table-responsive table tbody tr:hover {
            background: #11101a;
            color: var(--white);
        }

        td:nth-child(3) {
            white-space: nowrap;
        }

        td:last-child {
            white-space: nowrap;
        }

        footer {
            background-color: #1a1a1a;
        }

        .btn-1 {
            padding: 10px 20px;
            background: var(--black1);
            text-decoration: none;
            color: var(--white);
            border-radius: 20px;
            font-size: small;
            text-transform: uppercase;
            font-family: monospace;
        }

        .btn-2 {
            padding: 10px 20px;
            background: var(--black1);
            text-decoration: none;
            color: var(--white);
            border-radius: 20px;
            font-size: small;
            text-transform: uppercase;
            font-family: monospace;
        }

        .all-table {
            background: #1a1a1a;
            box-shadow: 0 7px 25px rgb(0 0 0 / 50%);
            border-radius: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 96%;
            min-height: auto;
        }

        .all-table table tbody tr:hover {
            background: #11101a;
            color: var(--white);
        }

        img.list-champ {
            padding-right: 120px;
            height: 25px;
            display: flex;
            margin-bottom: -20px;
            margin-left: -5px;
        }

        .champion-icon {
            white-space: nowrap;
        }

        @media (max-width: 1320px) {
            .title-table {
                margin-left: 12px;
            }

            .btn-all {
                text-align: initial;
                white-space: nowrap;
            }

        }

        @media (max-width: 380px) {
            .title-table {
                margin-left: 12px;
            }

            .btn-all {
                text-align: initial;
                white-space: nowrap;
            }

        }
    </style>
</head>

<body>