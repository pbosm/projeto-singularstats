<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Red Canids Academy </title> 
  <link rel="stylesheet" type="text/css" href="../cssdostimes/stylereda.css">
  <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
  <div class="navigation"></div>
</head> 
    <div class="main">
        <div class="cardBox">
            <a href="#"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
       </div>
    </div>
    <div class="menu"><img class ="home" src="../image/home.png" width="20">
          <a href="../index.php"><span class="title">Home </span><img class='icons' src="../image/torneios.png" width="30"></a>
          <a href="../paginas/torneios.php"><span class="title">Torneios</span><img class='icons' src="../image/times.png" width="30"></a>
          <a href="../paginas/times.php"><span class="title">Times</span><img class='icons' src="../image/jogadores.png" width="30"></a>
          <a href="../paginas/jogadores.php"><span class="title">Jogadores</span><img class='icons' src="../image/campeoes.png" width="25"></a>
          <a href="../paginas/campeaos.php"><span class="title">Campeões</span></a>
   </div>
       <!-- cards -->
       <div class="logoteam">
           <img src="../image/red-canids.png" alt="red" title="red">
       </div>

       <div class="teamroster">
           <img class='team' src="../image/redacademyroster.png" alt="teamred" title="teamred" height="200" width="350">
       </div>

       <!-- order details list -->
           <div class="table1"> 
               <table>
                   <thead>                         
                   </thead>
                   <tbody>
                       <tr> 
                            <?php
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT teamname, league, split, year, sum(result=1), sum(result=0), avg(result=1) * 100 'Winratio', avg(duracaogame) / 60  from `cblol` 
                                WHERE position in (SELECT position FROM `cblol` WHERE position = 'team')
                                and teamname in (SELECT teamname FROM `cblol` WHERE teamname = 'red academy')
                                and split in (select split from `cblol` where split = 'split 1')";
                                $resultado = $conn->query($sql);

                                while ($registro = $resultado->fetch_array()) 
                                {                              
                                    $teamname   =  $registro[0];                                   
                                    $league     =  $registro[1];
                                    $split      =  $registro[2];
                                    $year       =  $registro[3];
                                    $wins       =  $registro[4];
                                    $loses      =  $registro[5];
                                    $winratio   =  $registro[6];                                                                   
                                    $duracao    =  $registro[7];

                                    $teamname   = htmlentities($teamname, ENT_QUOTES, "UTF-8");
                                    $league     = htmlentities($league, ENT_QUOTES, "UTF-8");
                                    $split      = htmlentities($split, ENT_QUOTES, "UTF-8");
                                    $year       = htmlentities($year, ENT_QUOTES, "UTF-8");  
                                    $wins       = htmlentities($wins, ENT_QUOTES, "UTF-8"); 
                                    $loses      = htmlentities($loses, ENT_QUOTES, "UTF-8"); 
                                    $winratio   = htmlentities($winratio, ENT_QUOTES, "UTF-8"); 
                                    $duracao    = htmlentities($duracao, ENT_QUOTES, "UTF-8");
                                    
                                    $format_duracao = number_format($duracao, 0);
                                    $format_duracao = htmlentities($format_duracao,  ENT_QUOTES, "UTF-8");
                                    $format_winratio = number_format($winratio, 1, '.', '.');
                                    $format_winratio = htmlentities($format_winratio,  ENT_QUOTES, "UTF-8");
                                    
                                    echo "
                                    <div class='tableTitulo'>
                                    <h3>$teamname - $year - $split</h3>
                                    </div>  
                                    
                                    <tr>
                                    <td class='text-right'>Liga:</td>
                                    <td class='text-aling:center;width:30%'>$league</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right'>Split:</th>
                                    <td class='text-aling:center;width:30%'>$split</td>
                                    </tr> 

                                    <tr>
                                    <td class='text-right'>Jogos:</th>
                                    <td class='text-aling:center;width:30%'>$wins W - $loses L</td>
                                    </tr>                                                                        
                                    
                                    <tr>
                                    <td class='text-right'>Winratio:</th>
                                    <td class='text-aling:center;width:30%'>$format_winratio%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right'>Duração média:</th>
                                    <td class='text-aling:center;width:30%'>$format_duracao mins</td>
                                    </tr>";
                                }
                            ?>                      
                    </tbody>  
                </table> 
           </div>
           <div class="table2"> 
               <table>
                   <thead> 
                        <tr>  
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
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT distinct playername, position, count(teamname)'Jogos', SUM(result=1) / count(teamname) * 100 'Winratio', SUM(kills + assists) / SUM(deaths) 'KDA', SUM(kills) / count(teamname) 'Media de Kills', SUM(deaths) / count(teamname) 'Media de mortes', SUM(assists) / count(teamname)'Media de assist', SUM(kills + assists) / SUM(teamkills) * 100 'Kill participação', sum(damageshare) / count(teamname) * 100 '% dano', SUM(dpm) / count(playername) * 100 / 100 'dano por minuto', SUM(firstblood) / count(teamname) * 100 'FB participação', SUM(vspm) / count(teamname) * 100 / 100 'Ward p minuto', SUM(cspm) / count(teamname) 'Cs por minuto', SUM(earnedgpm) / count(teamname)'Gold por minuto', SUM(xpdiffat15) / count(teamname)'xp aos 15', sum(golddiffat15) / count(teamname) 'gold diff aos 15', sum(csdiffat15) / count(teamname) 'cs diff aos 15'from cblol
                                where position in (SELECT position FROM `cblol` WHERE position != 'team')
                                and teamname in (SELECT teamname FROM `cblol` WHERE teamname = 'red academy')
                                and split in (SELECT split FROM `cblol` WHERE split = 'split 1')
                                group by playername";
                                $resultado = $conn->query($sql);                       

                                while ($registro = $resultado->fetch_array()) 
                                {                                                                  
                                    $nome       = $registro[0]; 
                                    $position   = $registro[1];                                  
                                    $games      = $registro[2];
                                    $winratio   = $registro[3];
                                    $KDA        = $registro[4];
                                    $killpart   = $registro[8];    
                                    $perdano    = $registro[9];                               
                                    $dpm        = $registro[10];                                                                       
                                    $fbpart     = $registro[11];
                                    $wardpm     = $registro[12];
                                    $cspm       = $registro[13];
                                    $goldpm     = $registro[14];
                                    $xpdiff     = $registro[15];
                                    $goldiff    = $registro[16];
                                    $csdiff     = $registro[17];

                                    // FORMATADO                                                       
                                    $format_KDA         = number_format($KDA, 2);
                                    $format_killpart    = number_format($killpart, 2, '.', '.');
                                    $format_fbpart      = number_format($fbpart, 2, '.', '.');
                                    $format_dpm         = number_format($dpm, 2, '.', '.');
                                    $format_cspm        = number_format($cspm, 2, '.', '.');
                                    $format_goldpm      = number_format($goldpm, 2, '.', '.');
                                    $format_perdano     = number_format($perdano, 2, '.', '.');
                                    $format_wardpm      = number_format($wardpm, 2, '.', '.');
                                    $format_xpdiff      = number_format($xpdiff, 2, '.', '.');
                                    $format_goldiff     = number_format($goldiff, 2, '.', '.');
                                    $format_csdiff      = number_format($csdiff, 2, '.', '.');
                                    $format_winratio    = number_format($winratio, 1, '.', '.');

                                    $nome       = htmlentities($nome, ENT_QUOTES, "UTF-8");
                                    $position   = htmlentities($position, ENT_QUOTES, "UTF-8");  
                                    $games      = htmlentities($games, ENT_QUOTES, "UTF-8"); 
                                    $winratio   = htmlentities($winratio, ENT_QUOTES, "UTF-8");
                                    $KDA        = htmlentities($KDA, ENT_QUOTES, "UTF-8");
                                    $killpart   = htmlentities($killpart, ENT_QUOTES, "UTF-8");                                
                                    $dpm        = htmlentities($dpm, ENT_QUOTES, "UTF-8");
                                    $perdano    = htmlentities($perdano, ENT_QUOTES, "UTF-8");
                                    $fbpart     = htmlentities($fbpart, ENT_QUOTES, "UTF-8");
                                    $cspm       = htmlentities($cspm, ENT_QUOTES, "UTF-8");
                                    $goldpm     = htmlentities($goldpm, ENT_QUOTES, "UTF-8");
                                    $xpdiff     = htmlentities($xpdiff, ENT_QUOTES, "UTF-8");
                                    $goldiff    = htmlentities($goldiff, ENT_QUOTES, "UTF-8");
                                    $csdiff     = htmlentities($csdiff, ENT_QUOTES, "UTF-8");
                                    $format_KDA         = htmlentities($format_KDA, ENT_QUOTES, "UTF-8");
                                    $format_killpart    = htmlentities($format_killpart, ENT_QUOTES, "UTF-8");
                                    $format_fbpart      = htmlentities($format_fbpart, ENT_QUOTES, "UTF-8");
                                    $format_dpm         = htmlentities($format_dpm, ENT_QUOTES, "UTF-8");
                                    $format_cspm        = htmlentities($format_cspm, ENT_QUOTES, "UTF-8");
                                    $format_goldpm      = htmlentities($format_goldpm, ENT_QUOTES, "UTF-8");
                                    $format_perdano     = htmlentities($format_perdano, ENT_QUOTES, "UTF-8");
                                    $format_wardpm      = htmlentities($format_wardpm, ENT_QUOTES, "UTF-8");
                                    $format_xpdiff      = htmlentities($format_xpdiff, ENT_QUOTES, "UTF-8");
                                    $format_goldiff     = htmlentities($format_goldiff, ENT_QUOTES, "UTF-8");
                                    $format_csdiff      = htmlentities($format_csdiff, ENT_QUOTES, "UTF-8");
                                    $format_winratio    = htmlentities($format_winratio, ENT_QUOTES, "UTF-8");
                                    
                                    echo "<tr>
                                                <td> $nome </td> 
                                                <td> $position</td>
                                                <td> $games</td>
                                                <td> $format_winratio%</td>
                                                <td> $format_KDA</td>
                                                <td> $format_killpart% </td>
                                                <td> $format_dpm</td>
                                                <td> $format_perdano%</td> 
                                                <td> $format_wardpm</td>
                                                <td> $format_fbpart%</td>
                                                <td> $format_cspm </td>
                                                <td> $format_goldpm </td>
                                                <td> $format_xpdiff </td>
                                                <td> $format_goldiff </td>
                                                <td> $format_csdiff</td>
                                                </td>";
                                }                       
                            ?>                    
                    </tbody>  
                </table> 
        </div>
        <div class="table3"> 
               <table>
                   <tbody>
                       <tr> 
                            <?php
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT  sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(towers) / count(teamname), sum(towersenemy) / count(teamname), sum(towers) / count(teamname) - sum(towersenemy) / count(teamname) 'Media de torres diff', SUM(earnedgpm) / count(teamname), SUM(xpdiffat15) / count(teamname), sum(golddiffat15) / count(teamname), sum(csdiffat15) / count(teamname), SUM(cspm) / count(teamname) from `cblol` where teamname = 'red academy'
                                and split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')";
                                $resultado = $conn->query($sql);                       

                                while ($registro = $resultado->fetch_array()) 
                                {       
                                    $firsttorre       = $registro[0];
                                    $firsttorreblue   = $registro[1];
                                    $firsttorrered    = $registro[2];
                                    $mediadetorres    = $registro[3];
                                    $mediatorrescaida = $registro[4];
                                    $mediatorresdiff  = $registro[5];
                                    $goldpm           = $registro[6];
                                    $xpdiff           = $registro[7];
                                    $goldiff          = $registro[8];
                                    $csdiff           = $registro[9]; 
                                    $cspm             = $registro[10];     
                                    
                                    
                                    $firsttorre          = htmlentities($firsttorre, ENT_QUOTES, "UTF-8");
                                    $firsttorreblue      = htmlentities($firsttorreblue, ENT_QUOTES, "UTF-8");
                                    $firsttorrered       = htmlentities($firsttorrered, ENT_QUOTES, "UTF-8");
                                    $mediadetorres       = htmlentities($mediadetorres, ENT_QUOTES, "UTF-8");
                                    $mediatorrescaida    = htmlentities($mediatorrescaida, ENT_QUOTES, "UTF-8"); 
                                    $mediatorresdiff     = htmlentities($mediatorresdiff, ENT_QUOTES, "UTF-8"); 
                                    $goldpm              = htmlentities($goldpm, ENT_QUOTES, "UTF-8");
                                    $xpdiff              = htmlentities($xpdiff, ENT_QUOTES, "UTF-8");
                                    $goldiff             = htmlentities($goldiff, ENT_QUOTES, "UTF-8");
                                    $csdiff              = htmlentities($csdiff, ENT_QUOTES, "UTF-8");
                                    $cspm                = htmlentities($cspm, ENT_QUOTES, "UTF-8");

                                    $format_firsttorre      = number_format($firsttorre , 2, '.', '.');
                                    $format_firsttorreblue  = number_format($firsttorreblue, 2, '.', '.');
                                    $format_firsttorrered   = number_format($firsttorrered, 2, '.', '.');
                                    $format_goldpm          = number_format($goldpm, 2, '.', '.');
                                    $format_xpdiff          = number_format($xpdiff, 2, '.', '.');
                                    $format_goldiff         = number_format($goldiff, 2, '.', '.');
                                    $format_csdiff          = number_format($csdiff, 2, '.', '.');
                                    $format_cspm            = number_format($cspm, 2, '.', '.');
                                    $format_goldpm          = htmlentities($format_goldpm, ENT_QUOTES, "UTF-8");
                                    $format_xpdiff          = htmlentities($format_xpdiff, ENT_QUOTES, "UTF-8");
                                    $format_goldiff         = htmlentities($format_goldiff, ENT_QUOTES, "UTF-8");
                                    $format_csdiff          = htmlentities($format_csdiff, ENT_QUOTES, "UTF-8");
                                    
                                    echo "
                                    <div class='tableTitulo'>
                                    <h3>Economia</h3>
                                    </div> 
                                   
                                    <tr>
                                    <td class='text-right1'>Gold por minuto:</td>
                                    <td class='text-aling:center;width:30%'>$format_goldpm</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right1'>Gold diff aos 15:</th>
                                    <td class='text-aling:center;width:30%'>$format_goldiff</td>
                                    </tr> 

                                    <tr>
                                    <td class='text-right1'>CS por minuto:</th>
                                    <td class=text-aling:center;width:30%'>$format_cspm</td>
                                    </tr>                                                                        
                                    
                                    <tr>
                                    <td class='text-right1'>CS diff aos 15:</th>
                                    <td class='text-aling:center;width:30%'>$format_csdiff</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right1'>First Torre:</th>
                                    <td class='text-aling:center;width:30%'>$format_firsttorre%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right1'>First Torre blue:</th>
                                    <td class='text-aling:center;width:30%'>$format_firsttorreblue%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right1'>First Torre red:</th>
                                    <td class='text-aling:center;width:30%'>$format_firsttorrered%</td>
                                    </tr>";
                                }                       
                            ?>                    
                    </tbody>  
                </table> 
        </div>
        <div class="table4"> 
            <table>
                   <tbody>
                       <tr>
                            <?php
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT teamname, avg(teamkills), avg(teamdeaths), avg(dpm), avg(firstblood) * 100, avg(firstblood and side='blue') * 100, avg(firstblood and side='red') * 100, avg(vspm), avg(wpm) from `cblol`
                                where split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')
                                and teamname in (select teamname from `cblol` where teamname = 'red academy')";
                                $resultado = $conn->query($sql);                       

                                while ($registro = $resultado->fetch_array()) 
                                {       
                                    $teamname       = $registro[0];
                                    $mediakills     = $registro[1];
                                    $mediamortes    = $registro[2];
                                    $dpm            = $registro[3];
                                    $firstblood     = $registro[4]; 
                                    $firstbloodblue = $registro[5];
                                    $firstbloodred  = $registro[6];
                                    $vspm           = $registro[7];
                                    $wpm            = $registro[8];    
                                    
                                    
                                    $teamname       = htmlentities($teamname, ENT_QUOTES, "UTF-8");
                                    $mediakills     = htmlentities($mediakills, ENT_QUOTES, "UTF-8");
                                    $mediamortes    = htmlentities($mediamortes, ENT_QUOTES, "UTF-8");
                                    $dpm            = htmlentities($dpm, ENT_QUOTES, "UTF-8"); 
                                    $firstblood     = htmlentities($firstblood, ENT_QUOTES, "UTF-8");
                                    $firstbloodblue = htmlentities($firstbloodblue, ENT_QUOTES, "UTF-8");
                                    $firstbloodred  = htmlentities($firstbloodred, ENT_QUOTES, "UTF-8");
                                    $vspm           = htmlentities($vspm, ENT_QUOTES, "UTF-8");
                                    $wpm            = htmlentities($wpm, ENT_QUOTES, "UTF-8");   


                                    $format_mediakills     = number_format($mediakills, 1, '.', '.');
                                    $format_mediamortes    = number_format($mediamortes, 1, '.', '.');
                                    $format_dpm            = number_format($dpm, 0, '', '');
                                    $format_firstblood     = number_format($firstblood, 2, '.', '.');
                                    $format_firstbloodblue = number_format($firstbloodblue, 2, '.', '.');
                                    $format_firstbloodred  = number_format($firstbloodred, 2, '.', '.');
                                    $format_vspm           = number_format($vspm, 2, '.', '.');
                                    $format_wpm            = number_format($wpm, 2, '.', '.');
                                    
                                    echo "
                                    <div class='tableTitulo'>
                                    <h3>Agressividade</h3>
                                    </div> 
                                   
                                    <tr>
                                    <td class='text-right2'>First Blood:</th>
                                    <td class='text-aling:center;width:30%'>$format_firstblood%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right2'>First Blood Blueside:</th>
                                    <td class='text-aling:center;width:30%'>$format_firstbloodblue%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right2'>First Blood Redside:</th>
                                    <td class='text-aling:center;width:30%'>$format_firstbloodred%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right2'>Media de kills:</td>
                                    <td class='text-aling:center;width:30%'>$format_mediakills</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right2'>Media de mortes:</th>
                                    <td class='text-aling:center;width:30%'>$format_mediamortes</td>
                                    </tr> 

                                    <tr>
                                    <td class='text-right2'>Visão por minuto:</th>
                                    <td class='text-aling:center;width:30%'>$format_vspm</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right2'>Wards por minuto:</th>
                                    <td class=text-aling:center;width:30%'>$format_wpm</td>
                                    </tr>";
                                }                        
                            ?>                    
                    </tbody>  
            </table> 
        </div>
        <div class="table5"> 
            <table>
                   <tbody>
                       <tr>
                            <?php
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT avg(dragons) 'Dragons p game', sum(firstdragon=1 and side='blue') / sum(side='blue') * 100 '1 Drag Blueside', sum(firstdragon=1 and side='red') / sum(side='red') * 100 '1 Drag Redside', sum(firstherald) / count(teamname) * 100 '% de 1 Arauto', sum(firstherald=1 and side='blue') / sum(side='blue') * 100 '1 Arauto Blue side', sum(firstherald=1 and side='red') / sum(side='red') * 100 '1 Arauto Red side', sum(firstbaron=1 and side='blue') / sum(side='blue') * 100 '1 Baron Blue side', sum(firstbaron=1 and side='red') / sum(side='red') * 100 '1 Baron Red side', sum(firstbaron) / count(teamname) * 100 '% de Firts Baron', sum(barons) / count(teamname) 'Barons p game'  from `cblol`
                                where split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')
                                and teamname in (select teamname from `cblol` where teamname = 'red academy')";
                                $resultado = $conn->query($sql);                       

                                while ($registro = $resultado->fetch_array()) 
                                {       
                                    $dragonspgame      = $registro[0];
                                    $firstdragonblue   = $registro[1];
                                    $firstdragonred    = $registro[2];
                                    $firstarauto       = $registro[3];
                                    $firstarautoblue   = $registro[4]; 
                                    $firstarautored    = $registro[5];
                                    $firstabaronred    = $registro[6];
                                    $firstabaronblue   = $registro[7];
                                    $firstabaron       = $registro[8]; 
                                    $baronspgame       = $registro[9];     
                                    
                                    
                                    $dragonspgame        = htmlentities($dragonspgame, ENT_QUOTES, "UTF-8");
                                    $firstdragonblue     = htmlentities($firstdragonblue, ENT_QUOTES, "UTF-8");
                                    $firstdragonred      = htmlentities($firstdragonred, ENT_QUOTES, "UTF-8");
                                    $firstarauto         = htmlentities($firstarauto, ENT_QUOTES, "UTF-8"); 
                                    $firstarautoblue     = htmlentities($firstarautoblue, ENT_QUOTES, "UTF-8");
                                    $firstarautored      = htmlentities($firstarautored, ENT_QUOTES, "UTF-8");
                                    $firstabaronred      = htmlentities($firstabaronred, ENT_QUOTES, "UTF-8");
                                    $firstabaronblue     = htmlentities($firstabaronblue, ENT_QUOTES, "UTF-8"); 
                                    $firstabaron         = htmlentities($firstabaron, ENT_QUOTES, "UTF-8");      
                                    $baronspgame         = htmlentities($baronspgame, ENT_QUOTES, "UTF-8"); 


                                    $format_dragonspgame       = number_format($dragonspgame, 1, '.', '.');
                                    $format_firstdragonblue    = number_format($firstdragonblue, 1, '.', '.');
                                    $format_firstdragonred     = number_format($firstdragonred, 1, '.', '.');
                                    $format_firstarauto        = number_format($firstarauto, 0, '', '');
                                    $format_firstarautoblue    = number_format($firstarautoblue, 2, '.', '.');
                                    $format_firstarautored     = number_format($firstarautored, 2, '.', '.');
                                    $format_firstabaronred     = number_format($firstabaronred, 2, '.', '.');
                                    $format_firstabaronblue    = number_format($firstabaronblue, 2, '.', '.');
                                    $format_firstabaron        = number_format($firstabaron, 2, '.', '.');
                                    $format_baronspgame        = number_format($baronspgame, 2, '.', '.');
                                    
                                    echo "
                                    <div class='tableTitulo'>
                                    <h3>Objetivos</h3>
                                    </div> 
                                   
                                    <tr>
                                    <td class='text-right3'>Dragons por jogo:</th>
                                    <td class='text-aling:center;width:30%'>$format_dragonspgame%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right3'>1º dragon blueside:</td>
                                    <td class='text-aling:center;width:30%'>$format_firstdragonblue%</td>
                                    </tr>

                                    <tr>
                                    <td class='text-right3'>1º dragon redside:</th>
                                    <td class='text-aling:center;width:30%'>$format_firstdragonred%</td>
                                    </tr> 

                                    <tr>
                                    <td class='text-right3'>Porcentagem de 1º arauto:</th>
                                    <td class='text-aling:center;width:30%'>$format_firstarauto%</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right3'>1º arauto blueside:</th>
                                    <td class=text-aling:center;width:30%'>$format_firstarautoblue%</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right3'>1º arauto redside:</th>
                                    <td class=text-aling:center;width:30%'>$format_firstarautored%</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right3'>Porcentagem de 1º baron:</th>
                                    <td class=text-aling:center;width:30%'>$format_firstabaron%</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right3'>1º baron blueside:</th>
                                    <td class=text-aling:center;width:30%'>$format_firstabaronblue%</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right3'>1º baron redside:</th>
                                    <td class=text-aling:center;width:30%'>$format_firstabaronred%</td>
                                    </tr>
                                    
                                    <tr>
                                    <td class='text-right3'>Barons por game:</th>
                                    <td class=text-aling:center;width:30%'>$format_baronspgame%</td>
                                    </tr>";
                                }                        
                            ?>                    
                    </tbody>  
            </table> 
        </div>
   </div>                               
</div>  

</body>
</html>