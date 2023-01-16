<?php require_once "../includes/header.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="#"><img class='logo mb-2' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="330"></a>
        </div>
        <div class="col-sm-5">
            <form class="col-sm d-inline-block" action="../busca/buscatimes.php" method="POST">
                <input class="form-search me-2" name="pesquisar" type="search" placeholder="Pesquisar times"
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
                        echo "Times com as inicias ", $pesquisar;
                    } ?>
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
                $searchteamns2 = new Teams();

                $searchteamns2->getSearchTeams2();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "../includes/footer.php"; ?>