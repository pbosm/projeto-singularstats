<?php require_once "../includes/header.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="../index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="350"></a>
        </div>
        <div class="col-sm-5">
            <form class="col-sm d-inline-block" action="../busca/buscatimes1.php" method="POST">
                <input class="form-search me-2" name="pesquisar" type="search" placeholder="Pesquisar times"
                    aria-label="Search">
            </form>
        </div>
    </div>
</div>

<?php require_once "../includes/menu.php"; ?>

<div class="table-responsive mt-5">
    <table class="table mt-4">
        <div class="row">
            <div class="col-10">
                <h3 class="title-table mt-2 mb-4">
                    Times - 1 semestre
                </h3>
            </div>
            <div class="col btn-all">
                <a class="btn-1 mt-5" href="../paginas/times1.php">1 split</a>
                <a class="btn-2 mt-5" href="../paginas/times.php">2 split</a>
            </div>
        </div>
        <thead>
            <tr>
                <td>Time</td>
                <td>Total jogos</td>
                <td>Duração media das partidas</td>
                <td>Jogos blueside</td>
                <td>Win ratio blueside</td>
                <td>Jogos redside</td>
                <td>Win ratio redside</td>
                <td>Win ratio</td>
                <td>First torre</td>
                <td>First torre blueside</td>
                <td>First torre redside</td>
                <td>First blood</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once "../classes/teams.php";
                $teamssplit1 = new Teams();

                $teamssplit1->getTeamsSplit2();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "../includes/footer.php"; ?>