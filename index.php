<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="index.php"><img class='logo' src="./image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="350"></a>
        </div>
        <div class="col-sm-5">
            <form class="col-sm d-inline-block" action="./busca/buscatimes.php" method="POST">
                <input class="form-search me-2" name="pesquisar" type="search" placeholder="Pesquisar times" aria-label="Search">
            </form>
        </div>
    </div>
</div>

<?php require_once "./assets/menuIndex.php"; ?>

<div class="table-responsive mt-5">
    <table class="table mt-4">
        <div class="row">
            <div class="col-10">
                <h3 class="title-table mt-2">
                    Ultimos 15 jogos
                </h3>
            </div>
            <div class="col btn-all">
                <a href="./paginas/times.php" class="btn-all-teams btn-block">Ver todos times</a>
            </div>
        </div>

        <thead>
            <tr>
                <td>Time</td>
                <td>Liga</td>
                <td>Split</td>
                <td>Data</td>
                <td>Side</td>
                <td>Resultado</td>
                <td>Kills</td>
                <td>Mortes</td>
                <td>First dragão</td>
                <td>Dragões</td>
                <td>First arauto</td>
                <td>Arautos</td>
                <td>First torre</td>
                <td>Torres destruidas</td>
                <td>Torres perdidas</td>
                <td>Barons</td>
                <td>Total gold</td>
                <td>Pick TOP</td>
                <td>Pick JNG</td>
                <td>Pick MID</td>
                <td>Pick BOT</td>
                <td>Pick SUP</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once "./classes/class.php";
                $home = new Stats();

                $home->getLastGames();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "./assets/footer.php"; ?>