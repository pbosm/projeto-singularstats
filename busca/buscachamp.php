<?php require_once "../assets/header.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="#"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="350"></a>
        </div>
        <div class="col-sm-5">
            <form class="col-sm d-inline-block" action="../busca/buscachamp.php" method="POST">
                <input class="form-search me-2" name="pesquisar" type="search" placeholder="Pesquisar campeão"
                    aria-label="Search">
            </form>
        </div>
    </div>
</div>

<?php require_once "../assets/menu.php"; ?>

<div class="all-table table-responsive mt-3">
    <table class="table mt-4">
        <div class="row">
            <div class="col-10">
                <?php $pesquisar = $_POST['pesquisar']; ?>
                <h3 class="title-search mb-4" style="color: #0098ad;">
                    <?php
                    if ($pesquisar == null) {
                        $pesquisar = '';
                    } else {
                        echo "Campeãos com as inicias ", $pesquisar;
                    } ?>
                </h3>
            </div>
            <div class="col btn-all">
                <a class="btn-1" href="../paginas/campeoes1.php">1 split</a>
                <a class="btn-2" href="../paginas/campeoes.php">2 split</a>
            </div>
        </div>
        <thead>
            <tr>
                <td>Campeão</td>
                <td>Jogos</td>
                <td>Jogos blueside</td>
                <td>Jogos redside</td>
                <td>Winratio</td>
                <td>Kills</td>
                <td>Mortes</td>
                <td>Assistência</td>
                <td>KDA</td>
                <td>Participação no FB</td>
                <td>Dano por minuto</td>
                <td>CS por minuto</td>
                <td>Gold por minuto</td>
                <td>XP diff aos 15</td>
                <td>Gold diff aos 15</td>
                <td>CS diff aos 15</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                require_once "../classes/champ.php";
                $searchchamp2 = new Champ();

                $searchchamp2->getSearchChamp2();
                ?>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once "../assets/footer.php"; ?>