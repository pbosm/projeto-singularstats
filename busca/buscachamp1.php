<?php
//Get Heroku ClearDB connection information  
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Campeões </title> 
    <link rel="stylesheet" type="text/css" href="../css/stylecampeaos.css"> 
    <div class="navigation"></div>
</head> 

    <div class="main">
        <div class="logo-logo">
            <a href="../index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
        </div>
            <div class="search">
                <label>
                    <form class="form-inline" action="../busca/buscachamp1.php" method="POST">
                        <input type="text" placeholder="Pesquisar campeão" name="pesquisar"><img class="lupa" src="../image/search.png" width="20">           
                    </form>
                </label>
            </div>
          </div>
        </div>
        
        <div class="menu"><img class ="home" src="../image/home.png" width="20">
            <a href="../index.php"><span class="title">Home </span><img class='icons' src="../image/torneios.png" width="30"></a>
            <a href="../paginas/torneios.php"><span class="title">Torneios</span><img class='icons' src="../image/times.png" width="30"></a>
            <a href="../paginas/times.php"><span class="title">Times</span><img class='icons' src="../image/jogadores.png" width="30"></a>
            <a href="../paginas/jogadores.php"><span class="title">Jogadores</span><img class='icons' src="../image/campeoes.png" width="25"></a>
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
                      echo "Campeãos com as inicias ", $pesquisar;
                   } ?> </h3>
                   <a href="../paginas/campeaos1.php" class="btn">1 split</a>
                   <a href="../paginas/campeaos.php" class="btn2">2 split</a>
               </div>
               <table >
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
                   <tbody >
                       <tr>     
                           <?php
                                $pesquisar = $_POST['pesquisar'];
                                $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

                                $sql = "SELECT all champion, sum(champion=champion) 'Jogos', sum(champion=champion and side='blue') 'Jogos blueside', sum(champion=champion and side='red') 'Jogos redside', sum(result=1) / sum(champion=champion) * 100  'win ratio', sum(kills) 'kills', sum(deaths) 'mortes', sum(assists) 'assistencia', SUM(kills + assists) / SUM(deaths) 'KDA', avg(firstblood) * 100 'FB participação', avg(dpm) 'dano por minuto', avg(cspm) 'Cs por minuto', avg(earnedgpm)'Gold por minuto', avg(xpdiffat15)'xp aos 15', avg(golddiffat15)  'gold diff aos 15', avg(csdiffat15) 'cs diff aos 15'  FROM `cblol` where champion like '%$pesquisar%'
                                and league in (SELECT league FROM `cblol` WHERE league = 'CBLOL') 
                                and position in (SELECT position FROM `cblol` WHERE position != 'team')
                                and split in (select split from `cblol` where split = 'split 1')
                                GROUP BY champion order by sum(champion=champion) desc";
                                $resultado = $conn->query($sql);

                                while ($registro = $resultado->fetch_array()) 
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
                                                <td><img class='champion' src='../image/".$champion.".png'> $registro[0] </td> 
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
                            ?>                                           
                        </tr>                 
           </div>
        </div>
   </div>                               
</div>  

</body>
</html>