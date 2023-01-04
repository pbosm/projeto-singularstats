<?php require_once "../assets/header.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="../index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="350"></a>
        </div>
        <div class="col-sm-5">
            <form class="col-sm d-inline-block" action="../busca/buscatimes.php" method="POST">
                <input class="form-search me-2" name="pesquisar" type="search" placeholder="Pesquisar times"
                    aria-label="Search">
            </form>
        </div>
    </div>
</div>

<?php require_once "../assets/menu.php"; ?>

<div class="all-table table-responsive mt-5">
    <table class="table mt-4">
        <div class="row">
            <div class="col-10">
                <h3 class="title-table mt-2 mb-4">
                    Torneios - 1 semestre
                </h3>
            </div>
            <div class="col btn-all">
                <a class="btn-1" href="../paginas/torneios1.php">1 split</a>
                <a class="btn-2" href="../paginas/torneios.php">2 split</a>
            </div>
        </div>
        <thead>
            <tr>
                <td>Região</td>
                <td>Split</td>
                <td>Número de jogos</td>
                <td>Duração das partidas</td>
                <td>Média de kills</td>
                <td>Winratio Blueside</td>
                <td>Winratio Redside</td>
                <td>Dragons por jogo</td>
                <td>Barons por jogo</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once "../classes/torneios.php";
                $torneios = new Torneios();

                $torneios->getTournamentSplit1();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "../assets/footer.php"; ?>