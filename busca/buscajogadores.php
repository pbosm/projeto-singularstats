<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Jogadores </title> 
    <link rel="stylesheet" type="text/css" href="../css/stylejogadores.css"> 
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <div class="navigation"></div>
</head> 
    <div class="main">
        <div class="cardBox">
            <a href="#"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
       </div>
       <div class="search">
        <label>
            <form class="form-inline" action="../busca/buscajogadores.php" method="POST">
                <input type="text" placeholder="Pesquisar jogadores" name="pesquisar"> <img class="search" src="../image/search.png" width="20">          
            </form>
        </label>
        </div>
    </div>
    <div class="menu"><img class ="home" src="../image/home.png" width="20">
          <a href="../index.php"><span class="title">Home </span><img src="../image/torneios.png" width="30"></a>
          <a href="../paginas/torneios.php"><span class="title">Torneios</span><img src="../image/times.png" width="30"></a>
          <a href="../paginas/times.php"><span class="title">Times</span><img src="../image/jogadores.png" width="30"></a>
          <a href="../paginas/jogadores.php"><span class="title">Jogadores</span><img src="../image/campeoes.png" width="25"></a>
          <a href="../paginas/campeaos.php"><span class="title">Campeões</span></a>
   </div>
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <?php $pesquisar = $_POST['pesquisar']; ?>
                   <h3><?php 
                   if ($pesquisar == null) {
                        $pesquisar = ''; 
                   } else  {
                      echo "Jogadores com as inicias ", $pesquisar;
                   } ?> </h3>
               </div>
               <table >
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
                   <tbody >
                       <tr>     
                           <?php
                                $pesquisar = $_POST['pesquisar'];
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');
                                
                                $sql = "SELECT playername, teamname, position, count(teamname), SUM(kills + assists) / SUM(deaths), SUM(kills) / count(teamname), SUM(deaths) / count(teamname), SUM(assists) / count(teamname), SUM(kills + assists) / SUM(teamkills) * 100, sum(damageshare) / count(teamname) * 100, SUM(dpm) / count(playername) * 100 / 100, SUM(firstblood) / count(teamname) * 100, SUM(vspm) / count(teamname) * 100 / 100,  SUM(cspm) / count(teamname), SUM(earnedgpm) / count(teamname), SUM(xpdiffat15) / count(teamname), sum(golddiffat15) / count(teamname), sum(csdiffat15) / count(teamname) from `cblol` where playername like '%$pesquisar%'
                                and split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from cblol `cblol` where position != 'team') 
                                GROUP BY playername order by playername asc";
                                $resultado = $conn->query($sql);
                                
                                while ($registro = $resultado->fetch_array()) 
                                {                           
                                    $nome       =  $registro[0];
                                    $team       =  $registro[1]; 
                                    $position   = $registro[2];                                  
                                    $games      =  $registro[3];
                                    $KDA        = $registro[4];
                                    $mabates    = $registro[5];
                                    $mmortes    = $registro[6];
                                    $massist    = $registro[7];
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
                                    $format_mabates     = number_format($mabates, 2);
                                    $format_mmortes     = number_format($mmortes, 2);                                  
                                    $format_massist     = number_format($massist, 2);
                                    $format_KDA         = number_format($KDA, 2);
                                    $format_killpart    = number_format($killpart, 2, '.', '.');
                                    $format_fbpart      = number_format($fbpart, 2, '.', '.');
                                    $format_dpm         = number_format($dpm, 2, '.', '.');
                                    $format_cspm        = number_format($cspm, 2, '.', '.');
                                    $format_goldpm      = number_format($goldpm, 2, '.', '.');
                                    $format_perdano     = number_format($perdano, 2, '.', '.');
                                    $format_wardpm     = number_format($wardpm, 2, '.', '.');
                                    $format_xpdiff     = number_format($xpdiff, 2, '.', '.');
                                    $format_goldiff     = number_format($goldiff, 2, '.', '.');
                                    $format_csdiff   = number_format($csdiff, 2, '.', '.');

                                    $nome       = htmlentities($nome, ENT_QUOTES, "UTF-8");
                                    $team       = htmlentities($team, ENT_QUOTES, "UTF-8");
                                    $position   = htmlentities($position, ENT_QUOTES, "UTF-8");  
                                    $games      = htmlentities($games, ENT_QUOTES, "UTF-8");  
                                    $KDA        = htmlentities($KDA, ENT_QUOTES, "UTF-8");
                                    $mabates    = htmlentities($mabates, ENT_QUOTES, "UTF-8");
                                    $mmortes    = htmlentities($mmortes, ENT_QUOTES, "UTF-8");
                                    $massist    = htmlentities($massist, ENT_QUOTES, "UTF-8");
                                    $killpart   = htmlentities($killpart, ENT_QUOTES, "UTF-8");                                
                                    $dpm        = htmlentities($dpm, ENT_QUOTES, "UTF-8");
                                    $perdano    = htmlentities($perdano, ENT_QUOTES, "UTF-8");
                                    $fbpart     = htmlentities($fbpart, ENT_QUOTES, "UTF-8");
                                    $cspm       = htmlentities($cspm, ENT_QUOTES, "UTF-8");
                                    $goldpm     = htmlentities($goldpm, ENT_QUOTES, "UTF-8");
                                    $xpdiff     = htmlentities($xpdiff, ENT_QUOTES, "UTF-8");
                                    $goldiff     = htmlentities($goldiff, ENT_QUOTES, "UTF-8");
                                    $csdiff    = htmlentities($csdiff, ENT_QUOTES, "UTF-8");
                                    $format_mabates     = htmlentities($format_mabates, ENT_QUOTES, "UTF-8");
                                    $format_mmortes     = htmlentities($format_mmortes, ENT_QUOTES, "UTF-8");                                 
                                    $format_massist     = htmlentities($format_massist, ENT_QUOTES, "UTF-8");
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
                                    $format_csdiff     = htmlentities($format_csdiff, ENT_QUOTES, "UTF-8");
                                    
                                    echo "<tr>
                                                <td> $nome </td> 
                                                <td> $team</td>
                                                <td> $position</td>
                                                <td> $games</td>
                                                <td> $format_KDA</td>
                                                <td> $format_mabates </td>
                                                <td> $format_mmortes </td>
                                                <td> $format_massist </td>
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
                        </tr>                 
           </div>
        </div>
   </div>                               
</div>  

</body>
</html>