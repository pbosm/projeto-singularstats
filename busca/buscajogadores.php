<?php require_once "../includes/header.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="#"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="350"></a>
        </div>
        <div class="col-sm-5">
            <form class="col-sm d-inline-block" action="../busca/buscajogadores.php" method="POST">
                <input class="form-search me-2" name="pesquisar" type="search" placeholder="Pesquisar jogadores"
                    aria-label="Search">
            </form>
        </div>
    </div>
</div>

<?php require_once "../includes/menu.php"; ?>

<div class="all-table table-responsive mt-5">
    <table class="table mt-4">
        <div class="row">
            <div class="col-10">
                <?php $pesquisar = $_POST['pesquisar']; ?>
                <h3 class="title-search mb-4" style="color: #0098ad; font-size: 15px;">
                    <?php
                    if ($pesquisar == null) {
                        $pesquisar = '';
                    } else {
                        echo "Jogadores com as inicias ", $pesquisar;
                    } ?>
                </h3>
            </div>
            <div class="col btn-all">
                <a class="btn-1" href="../paginas/jogadores1.php">1 split</a>
                <a class="btn-2" href="../paginas/jogadores.php">2 split</a>
            </div>
        </div>
        <thead>
            <tr>
                <td>Player</td>
                <td>Time</td>
                <td>Posição</td>
                <td>Games</td>
                <td>KDA</td>
                <td>Média de abates</td>
                <td>Média de mortes</td>
                <td>Média de assistência</td>
                <td>Média de participação</td>
                <td>Dano por minuto</td>
                <td>Porcentagem de dano</td>
                <td>Ward por minuto</td>
                <td>Participação no FirstBlood</td>
                <td>CS por minuto</td>
                <td>GOLD por minuto</td>
                <td>XP diff aos 15</td>
                <td>GOLD diff aos 15</td>
                <td>CS diff aos 15</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once "../classes/players.php";
                $searchplayers2 = new Players();

                $searchplayers2->getSearchPlayers2();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "../includes/footer.php"; ?>