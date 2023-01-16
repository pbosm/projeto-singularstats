<?php require_once "../includes/header.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="../index.php"><img class='logo mb-2' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="330"></a>
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
                <h3 class="title-table mt-2 mb-4">
                    Jogadores - 2 semestre
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
                <td>Winratio</td>
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
                $playerssplit2 = new Players();

                $playerssplit2->getPlayersSplit2();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "../includes/footer.php"; ?>