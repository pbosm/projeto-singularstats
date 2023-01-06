<?php require_once "../includes/headerTeam1.php"; ?>

<div class="linear"></div>
<div class="logo-head text-center">
    <div class="row">
        <div class="col-sm-7">
            <a href="index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats"
                    width="350"></a>
        </div>
    </div>
</div>

<?php require_once "../includes/menuTeam.php"; ?>

<div class="content">
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-6">
                <div class="text-center rounded p-4">
                    <div class="logoteam mt-3">
                        <img src="../image/pain.png" alt="<?php $nameteam ?>" title="<?php $nameteam ?>"
                            width="200">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="text-center rounded p-4">
                    <div class="teamroster mt-3">
                        <img class='team' src="../image/painroster.png" alt="<?php $nameteam ?>"
                            title="<?php $nameteam ?>" height="200" width="150">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="text-center rounded p-4">
            <div class="table-responsive info w-100">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <td>Line up</td>
                            <td>Posição</td>
                            <td>Games</td>
                            <td>Winratio</td>
                            <td>KDA</td>
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
                            require_once "../classes/pageteams.php";
                            $playersStats = new StatsTeam();

                            $playersStats->getPlayersStats1($nameteam);
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 rounded p-4">
                    <div class="table-responsive-economy mt-3">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <?php
                                    require_once "../classes/pageteams.php";
                                    $economyTeam = new StatsTeam();

                                    $economyTeam->getEconomyTeam1($nameteam);
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 rounded p-4">
                    <div class="table-responsive-aggressive mt-3">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <?php
                                    require_once "../classes/pageteams.php";
                                    $aggressiveTeam = new StatsTeam();

                                    $aggressiveTeam->getAggressiveTeam1($nameteam);
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 rounded p-4">
                    <div class="table-responsive-objective mt-3">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <?php
                                    require_once "../classes/pageteams.php";
                                    $objectiveTeam = new StatsTeam();

                                    $objectiveTeam->getObjectiveTeam1($nameteam);
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once "../includes/footer.php"; ?>