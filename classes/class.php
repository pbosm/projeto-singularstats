<?php

    class Stats {

        public function getLastGames() 
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();
        
            $sql = "SELECT teamname, league, split, DATE_FORMAT(datahora,'%d/%m/%Y'), side, result=1, kills, deaths, firstdragon, dragons, firstherald, heralds, barons, firsttower, towers, towersenemy, totalgold FROM `cblol`
            where position in (SELECT position FROM `cblol` WHERE position = 'team')
            and league in (select league from `cblol` where league != 'LPL')
            order by datahora desc
            limit 15";
            $code = $conn->prepare($sql, array());
            $code->execute(); 

            $sqltop = "SELECT champion FROM `cblol`
            where position in (SELECT position FROM `cblol` WHERE position = 'top')
            order by datahora desc";
            $codetop = $conn->prepare($sqltop, array());
            $codetop->execute(); 

            $sqljng = "SELECT champion FROM `cblol`
            where position in (SELECT position FROM `cblol` WHERE position = 'jng')
            order by datahora desc";
            $codejng = $conn->prepare($sqljng, array());
            $codejng->execute();                                

            $sqlmid = "SELECT champion FROM `cblol`
            where position in (SELECT position FROM `cblol` WHERE position = 'mid')
            order by datahora desc";
            $codemid = $conn->prepare($sqlmid, array());
            $codemid->execute();

            $sqlbot = "SELECT champion FROM `cblol`
            where position in (SELECT position FROM `cblol` WHERE position = 'bot')
            order by datahora desc";
            $codebot = $conn->prepare($sqlbot, array());
            $codebot->execute();

            $sqlsup = "SELECT champion FROM `cblol`  
            where position in (SELECT position FROM `cblol` WHERE position = 'sup')
            order by datahora desc";
            $codesup = $conn->prepare($sqlsup, array());
            $codesup->execute();

            while ($registro = $code->fetch()) {

                $teamname    =  $registro[0];
                $league      =  $registro[1];
                $split       =  $registro[2];
                $datahora    =  $registro[3];                                                                  
                $side        =  $registro[4];
                $result      =  $registro[5];
                $kills       =  $registro[6];
                $death       =  $registro[7];
                $fdragon     =  $registro[8];
                $dragons     =  $registro[9];
                $farauto     =  $registro[10];
                $arautos     =  $registro[11];
                $barons      =  $registro[12];
                $ftorre      =  $registro[13];
                $torres      =  $registro[14];
                $torresenemy =  $registro[15];
                $totalgold   =  $registro[16];

                $teamname       = htmlentities($teamname, ENT_QUOTES, "UTF-8");
                $league         = htmlentities($league, ENT_QUOTES, "UTF-8");
                $split          = htmlentities($split, ENT_QUOTES, "UTF-8");
                $datahora       = htmlentities($datahora, ENT_QUOTES, "UTF-8");
                $side           = htmlentities($side, ENT_QUOTES, "UTF-8");
                $result         = htmlentities($result, ENT_QUOTES, "UTF-8");
                $kills          = htmlentities($kills, ENT_QUOTES, "UTF-8");
                $death          = htmlentities($death, ENT_QUOTES, "UTF-8");
                $fdragon        = htmlentities($fdragon, ENT_QUOTES, "UTF-8");
                $dragons        = htmlentities($dragons, ENT_QUOTES, "UTF-8");
                $farauto        = htmlentities($farauto, ENT_QUOTES, "UTF-8");
                $arautos        = htmlentities($arautos, ENT_QUOTES, "UTF-8");
                $barons         = htmlentities($barons, ENT_QUOTES, "UTF-8");
                $ftorre         = htmlentities($ftorre, ENT_QUOTES, "UTF-8");
                $torres         = htmlentities($torres, ENT_QUOTES, "UTF-8");
                $torresenemy    = htmlentities($torresenemy, ENT_QUOTES, "UTF-8");
                $totalgold      = htmlentities($totalgold, ENT_QUOTES, "UTF-8");

                if ($registro[5] == 0){
                    $result = 'lose';
                } else {
                    $result = 'win';
                }

                if($registrotop = $codetop->fetch()) {
                    $championtop   =  $registrotop[0];
                    $championtop    = htmlentities($championtop, ENT_QUOTES, "UTF-8");
                } if($registrojng = $codejng->fetch()) {
                    $championjng   =  $registrojng[0];
                    $championjng    = htmlentities($championjng, ENT_QUOTES, "UTF-8");
                } if($registromid = $codemid->fetch()) {
                    $championmid   =  $registromid[0];
                    $championmid    = htmlentities($championmid, ENT_QUOTES, "UTF-8");
                } if($registrobot = $codebot->fetch()) {
                    $championbot   =  $registrobot[0];
                    $championbot    = htmlentities($championbot, ENT_QUOTES, "UTF-8");
                } if($registrosup = $codesup->fetch()) {
                    $championsup   =  $registrosup[0];
                    $championsup    = htmlentities($championsup, ENT_QUOTES, "UTF-8");
                }

                echo "<tr>
                <td> $teamname</td>
                <td> $league</td>
                <td> $split</td>
                <td> $datahora </td>
                <td> $side </td>
                <td> $result </td>
                <td> $kills </td>
                <td> $death </td>
                <td> $fdragon </td>
                <td> $dragons </td>
                <td> $farauto </td>
                <td> $arautos </td>
                <td> $ftorre  </td>
                <td> $torres  </td>
                <td> $torresenemy </td>
                <td> $barons </td>
                <td> $totalgold</td>
                <td> <img class='champion' src='./image/".$championtop.".png'><br>$championtop </td>
                <td  class='champion-icon'> <img class='champion' src='./image/".$championjng.".png'><br>$championjng </td>
                <td> <img class='champion' src='./image/".$championmid.".png'><br>$championmid </td>
                <td> <img class='champion' src='./image/".$championbot.".png'><br>$championbot </td>
                <td> <img class='champion' src='./image/".$championsup.".png'><br>$championsup </td>
                </td>";
            }
        }
    }
?>