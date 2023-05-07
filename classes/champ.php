<?php

    class Champ {

        public function getSearchChamp2() 
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();

            $pesquisar = $_POST['pesquisar'];

            $sql = "SELECT all champion, sum(champion=champion) 'Jogos', sum(champion=champion and side='blue') 'Jogos blueside', sum(champion=champion and side='red') 'Jogos redside', sum(result=1) / sum(champion=champion) * 100  'win ratio', sum(kills) 'kills', sum(deaths) 'mortes', sum(assists) 'assistencia', SUM(kills + assists) / SUM(deaths) 'KDA', avg(firstblood) * 100 'FB participação', avg(dpm) 'dano por minuto', avg(cspm) 'Cs por minuto', avg(earnedgpm)'Gold por minuto', avg(xpdiffat15)'xp aos 15', avg(golddiffat15)  'gold diff aos 15', avg(csdiffat15) 'cs diff aos 15'  FROM `cblol` where champion like '%$pesquisar%'
            and league in (SELECT league FROM `cblol` WHERE league = 'CBLOL') 
            and position in (SELECT position FROM `cblol` WHERE position != 'team')
            and split in (select split from `cblol` where split = 'split 2')
            GROUP BY champion order by sum(champion=champion) desc";
            $code = $conn->prepare($sql, array());
            $code->execute(); 

            while ($registro = $code->fetch()) 
            {                                       

                $champion       = $registro[0];
                $jogos          = $registro[1];
                $jogosblueside  = $registro[2];
                $jogosredside   = $registro[3];
                $winratio       = $registro[4];
                $kills          = $registro[5];
                $mortes         = $registro[6];
                $assist         = $registro[7];
                $kda            = $registro[8];
                $fbpart         = $registro[9];
                $dpm            = $registro[10];
                $cspm           = $registro[11];
                $goldpm         = $registro[12];
                $xp15           = $registro[13];
                $gold15         = $registro[14];
                $cs15           = $registro[15];

                $format_winratio    = number_format($winratio, 2);
                $format_kda         = number_format($kda, 2);
                $format_fbpart      = number_format($fbpart, 2, '.', '.');
                $format_dpm         = number_format($dpm, 2, '.', '.');
                $format_cspm        = number_format($cspm, 2, '.', '.');
                $format_goldpm      = number_format($goldpm, 2, '.', '.');
                $format_xp15      = number_format($xp15, 2, '.', '.');
                $format_gold15     = number_format($gold15, 2, '.', '.');
                $format_cs15      = number_format($cs15, 2, '.', '.');

                $champion       = htmlentities($champion, ENT_QUOTES, "UTF-8");
                $jogos          = htmlentities($jogos, ENT_QUOTES, "UTF-8");
                $jogosblueside  = htmlentities($jogosblueside, ENT_QUOTES, "UTF-8");
                $jogosredside   = htmlentities($jogosredside, ENT_QUOTES, "UTF-8");
                $winratio       = htmlentities($winratio, ENT_QUOTES, "UTF-8");
                $kills          = htmlentities($kills, ENT_QUOTES, "UTF-8");
                $mortes         = htmlentities($mortes, ENT_QUOTES, "UTF-8");
                $assist         = htmlentities($assist, ENT_QUOTES, "UTF-8");
                $kda            = htmlentities($kda, ENT_QUOTES, "UTF-8");
                $fbpart         = htmlentities($fbpart, ENT_QUOTES, "UTF-8");
                $dpm            = htmlentities($dpm, ENT_QUOTES, "UTF-8");
                $cspm           = htmlentities($cspm, ENT_QUOTES, "UTF-8");
                $goldpm         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $xp15           = htmlentities($xp15, ENT_QUOTES, "UTF-8");
                $gold15         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $cs15           = htmlentities($cs15, ENT_QUOTES, "UTF-8");

                echo "<tr>                                    
                            <td><img class='list-champ' src='../image/".$champion.".png'> $registro[0] </td> 
                            <td> $registro[1]</td>
                            <td> $registro[2]</td>
                            <td> $registro[3]</td>
                            <td> $format_winratio% </td>
                            <td> $registro[5]</td>
                            <td> $registro[6]</td>
                            <td> $registro[7]</td>
                            <td> $format_kda</td>
                            <td> $format_fbpart</td>
                            <td> $format_dpm</td>
                            <td> $format_cspm</td>
                            <td> $format_goldpm</td>
                            <td> $format_xp15</td>
                            <td> $format_gold15</td>
                            <td> $format_cs15</td>
                            </td>";
            }  
            
            return;
        }

        public function getSearchChamp1() 
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();

            $pesquisar = $_POST['pesquisar'];

            $sql = "SELECT all champion, sum(champion=champion) 'Jogos', sum(champion=champion and side='blue') 'Jogos blueside', sum(champion=champion and side='red') 'Jogos redside', sum(result=1) / sum(champion=champion) * 100  'win ratio', sum(kills) 'kills', sum(deaths) 'mortes', sum(assists) 'assistencia', SUM(kills + assists) / SUM(deaths) 'KDA', avg(firstblood) * 100 'FB participação', avg(dpm) 'dano por minuto', avg(cspm) 'Cs por minuto', avg(earnedgpm)'Gold por minuto', avg(xpdiffat15)'xp aos 15', avg(golddiffat15)  'gold diff aos 15', avg(csdiffat15) 'cs diff aos 15'  FROM `cblol` where champion like '%$pesquisar%'
            and league in (SELECT league FROM `cblol` WHERE league = 'CBLOL') 
            and position in (SELECT position FROM `cblol` WHERE position != 'team')
            and split in (select split from `cblol` where split = 'split 1')
            GROUP BY champion order by sum(champion=champion) desc";
            $code = $conn->prepare($sql, array());
            $code->execute(); 

            while ($registro = $code->fetch()) 
            {                                       

                $champion       = $registro[0];
                $jogos          = $registro[1];
                $jogosblueside  = $registro[2];
                $jogosredside   = $registro[3];
                $winratio       = $registro[4];
                $kills          = $registro[5];
                $mortes         = $registro[6];
                $assist         = $registro[7];
                $kda            = $registro[8];
                $fbpart         = $registro[9];
                $dpm            = $registro[10];
                $cspm           = $registro[11];
                $goldpm         = $registro[12];
                $xp15           = $registro[13];
                $gold15         = $registro[14];
                $cs15           = $registro[15];

                $format_winratio    = number_format($winratio, 2);
                $format_kda         = number_format($kda, 2);
                $format_fbpart      = number_format($fbpart, 2, '.', '.');
                $format_dpm         = number_format($dpm, 2, '.', '.');
                $format_cspm        = number_format($cspm, 2, '.', '.');
                $format_goldpm      = number_format($goldpm, 2, '.', '.');
                $format_xp15        = number_format($xp15, 2, '.', '.');
                $format_gold15      = number_format($gold15, 2, '.', '.');
                $format_cs15        = number_format($cs15, 2, '.', '.');

                $champion       = htmlentities($champion, ENT_QUOTES, "UTF-8");
                $jogos          = htmlentities($jogos, ENT_QUOTES, "UTF-8");
                $jogosblueside  = htmlentities($jogosblueside, ENT_QUOTES, "UTF-8");
                $jogosredside   = htmlentities($jogosredside, ENT_QUOTES, "UTF-8");
                $winratio       = htmlentities($winratio, ENT_QUOTES, "UTF-8");
                $kills          = htmlentities($kills, ENT_QUOTES, "UTF-8");
                $mortes         = htmlentities($mortes, ENT_QUOTES, "UTF-8");
                $assist         = htmlentities($assist, ENT_QUOTES, "UTF-8");
                $kda            = htmlentities($kda, ENT_QUOTES, "UTF-8");
                $fbpart         = htmlentities($fbpart, ENT_QUOTES, "UTF-8");
                $dpm            = htmlentities($dpm, ENT_QUOTES, "UTF-8");
                $cspm           = htmlentities($cspm, ENT_QUOTES, "UTF-8");
                $goldpm         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $xp15           = htmlentities($xp15, ENT_QUOTES, "UTF-8");
                $gold15         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $cs15           = htmlentities($cs15, ENT_QUOTES, "UTF-8");

                echo "<tr>                                    
                            <td><img class='list-champ' src='../image/".$champion.".png'> $registro[0] </td> 
                            <td> $registro[1]</td>
                            <td> $registro[2]</td>
                            <td> $registro[3]</td>
                            <td> $format_winratio% </td>
                            <td> $registro[5]</td>
                            <td> $registro[6]</td>
                            <td> $registro[7]</td>
                            <td> $format_kda</td>
                            <td> $format_fbpart</td>
                            <td> $format_dpm</td>
                            <td> $format_cspm</td>
                            <td> $format_goldpm</td>
                            <td> $format_xp15</td>
                            <td> $format_gold15</td>
                            <td> $format_cs15</td>
                            </td>";
            }  
        }

        public function getChampsSplit2() 
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();
            
            $sql = "SELECT all champion, sum(champion=champion) 'Jogos', sum(champion=champion and side='blue') 'Jogos blueside', sum(champion=champion and side='red') 'Jogos redside', sum(result=1) / sum(champion=champion) * 100  'win ratio', sum(kills) 'kills', sum(deaths) 'mortes', sum(assists) 'assistencia', SUM(kills + assists) / SUM(deaths) 'KDA', avg(firstblood) * 100 'FB participação', avg(dpm) 'dano por minuto', avg(cspm) 'Cs por minuto', avg(earnedgpm)'Gold por minuto', avg(xpdiffat15)'xp aos 15', avg(golddiffat15)  'gold diff aos 15', avg(csdiffat15) 'cs diff aos 15'  FROM `cblol` 
            where league in (SELECT league FROM `cblol` WHERE league = 'CBLOL') 
            and position in (SELECT position FROM `cblol` WHERE position != 'team')
            and split in (select split from `cblol` where split = 'split 2')
            GROUP BY champion order by sum(champion=champion) desc";
            $code = $conn->prepare($sql, array());
            $code->execute(); 

            while ($registro = $code->fetch()) 
            {                                       

                $champion       = $registro[0];
                $jogos          = $registro[1];
                $jogosblueside  = $registro[2];
                $jogosredside   = $registro[3];
                $winratio       = $registro[4];
                $kills          = $registro[5];
                $mortes         = $registro[6];
                $assist         = $registro[7];
                $kda            = $registro[8];
                $fbpart         = $registro[9];
                $dpm            = $registro[10];
                $cspm           = $registro[11];
                $goldpm         = $registro[12];
                $xp15           = $registro[13];
                $gold15         = $registro[14];
                $cs15           = $registro[15];

                $format_winratio    = number_format($winratio, 2);
                $format_kda         = number_format(floatval($kda));
                $format_fbpart      = number_format($fbpart, 2, '.', '.');
                $format_dpm         = number_format($dpm, 2, '.', '.');
                $format_cspm        = number_format($cspm, 2, '.', '.');
                $format_goldpm      = number_format($goldpm, 2, '.', '.');
                $format_xp15      = number_format($xp15, 2, '.', '.');
                $format_gold15     = number_format($gold15, 2, '.', '.');
                $format_cs15      = number_format($cs15, 2, '.', '.');

                $champion       = htmlentities($champion, ENT_QUOTES, "UTF-8");
                $jogos          = htmlentities($jogos, ENT_QUOTES, "UTF-8");
                $jogosblueside  = htmlentities($jogosblueside, ENT_QUOTES, "UTF-8");
                $jogosredside   = htmlentities($jogosredside, ENT_QUOTES, "UTF-8");
                $winratio       = htmlentities($winratio, ENT_QUOTES, "UTF-8");
                $kills          = htmlentities($kills, ENT_QUOTES, "UTF-8");
                $mortes         = htmlentities($mortes, ENT_QUOTES, "UTF-8");
                $assist         = htmlentities($assist, ENT_QUOTES, "UTF-8");
                $kda            = htmlentities($kda);
                $fbpart         = htmlentities($fbpart, ENT_QUOTES, "UTF-8");
                $dpm            = htmlentities($dpm, ENT_QUOTES, "UTF-8");
                $cspm           = htmlentities($cspm, ENT_QUOTES, "UTF-8");
                $goldpm         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $xp15           = htmlentities($xp15, ENT_QUOTES, "UTF-8");
                $gold15         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $cs15           = htmlentities($cs15, ENT_QUOTES, "UTF-8");

                echo "<tr>                                    
                            <td><img class='list-champ' src='../image/".$champion.".png'> $champion </td> 
                            <td> $registro[1]</td>
                            <td> $registro[2]</td>
                            <td> $registro[3]</td>
                            <td> $format_winratio% </td>
                            <td> $registro[5]</td>
                            <td> $registro[6]</td>
                            <td> $registro[7]</td>
                            <td> $format_kda</td>
                            <td> $format_fbpart</td>
                            <td> $format_dpm</td>
                            <td> $format_cspm</td>
                            <td> $format_goldpm</td>
                            <td> $format_xp15</td>
                            <td> $format_gold15</td>
                            <td> $format_cs15</td>
                            </td>";
            }      
            
            return;
        }

        public function getChampsSplit1() 
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();
            
            $sql = "SELECT all champion, sum(champion=champion) 'Jogos', sum(champion=champion and side='blue') 'Jogos blueside', sum(champion=champion and side='red') 'Jogos redside', sum(result=1) / sum(champion=champion) * 100  'win ratio', sum(kills) 'kills', sum(deaths) 'mortes', sum(assists) 'assistencia', SUM(kills + assists) / SUM(deaths) 'KDA', avg(firstblood) * 100 'FB participação', avg(dpm) 'dano por minuto', avg(cspm) 'Cs por minuto', avg(earnedgpm)'Gold por minuto', avg(xpdiffat15)'xp aos 15', avg(golddiffat15)  'gold diff aos 15', avg(csdiffat15) 'cs diff aos 15'  FROM `cblol` 
            where league in (SELECT league FROM `cblol` WHERE league = 'CBLOL') 
            and position in (SELECT position FROM `cblol` WHERE position != 'team')
            and split in (select split from `cblol` where split = 'split 1')
            GROUP BY champion order by sum(champion=champion) desc";
            $code = $conn->prepare($sql, array());
            $code->execute(); 

            while ($registro = $code->fetch()) 
            {                                       

                $champion       = $registro[0];
                $jogos          = $registro[1];
                $jogosblueside  = $registro[2];
                $jogosredside   = $registro[3];
                $winratio       = $registro[4];
                $kills          = $registro[5];
                $mortes         = $registro[6];
                $assist         = $registro[7];
                $kda            = $registro[8];
                $fbpart         = $registro[9];
                $dpm            = $registro[10];
                $cspm           = $registro[11];
                $goldpm         = $registro[12];
                $xp15           = $registro[13];
                $gold15         = $registro[14];
                $cs15           = $registro[15];

                $format_winratio    = number_format($winratio, 2);
                $format_kda         = number_format($kda, 2);
                $format_fbpart      = number_format($fbpart, 2, '.', '.');
                $format_dpm         = number_format($dpm, 2, '.', '.');
                $format_cspm        = number_format($cspm, 2, '.', '.');
                $format_goldpm      = number_format($goldpm, 2, '.', '.');
                $format_xp15      = number_format($xp15, 2, '.', '.');
                $format_gold15     = number_format($gold15, 2, '.', '.');
                $format_cs15      = number_format($cs15, 2, '.', '.');

                $champion       = htmlentities($champion, ENT_QUOTES, "UTF-8");
                $jogos          = htmlentities($jogos, ENT_QUOTES, "UTF-8");
                $jogosblueside  = htmlentities($jogosblueside, ENT_QUOTES, "UTF-8");
                $jogosredside   = htmlentities($jogosredside, ENT_QUOTES, "UTF-8");
                $winratio       = htmlentities($winratio, ENT_QUOTES, "UTF-8");
                $kills          = htmlentities($kills, ENT_QUOTES, "UTF-8");
                $mortes         = htmlentities($mortes, ENT_QUOTES, "UTF-8");
                $assist         = htmlentities($assist, ENT_QUOTES, "UTF-8");
                $kda            = htmlentities($kda, ENT_QUOTES, "UTF-8");
                $fbpart         = htmlentities($fbpart, ENT_QUOTES, "UTF-8");
                $dpm            = htmlentities($dpm, ENT_QUOTES, "UTF-8");
                $cspm           = htmlentities($cspm, ENT_QUOTES, "UTF-8");
                $goldpm         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $xp15           = htmlentities($xp15, ENT_QUOTES, "UTF-8");
                $gold15         = htmlentities($gold15, ENT_QUOTES, "UTF-8");
                $cs15           = htmlentities($cs15, ENT_QUOTES, "UTF-8");

                echo "<tr>                                    
                            <td><img class='list-champ' src='../image/".$champion.".png'> $champion </td> 
                            <td> $registro[1]</td>
                            <td> $registro[2]</td>
                            <td> $registro[3]</td>
                            <td> $format_winratio% </td>
                            <td> $registro[5]</td>
                            <td> $registro[6]</td>
                            <td> $registro[7]</td>
                            <td> $format_kda</td>
                            <td> $format_fbpart</td>
                            <td> $format_dpm</td>
                            <td> $format_cspm</td>
                            <td> $format_goldpm</td>
                            <td> $format_xp15</td>
                            <td> $format_gold15</td>
                            <td> $format_cs15</td>
                            </td>";
            }      
        }

    }

?>