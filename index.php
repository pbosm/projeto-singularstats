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
    <title> Singularstats </title> 
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" href="./image/icon.png">
    <div class="navigation"></div>
</head>

<body>
    <div class="main">
        <div class="logo-logo">
            <a href="#"><img class='logo' src="./image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
        </div>
            <div class="search">
                <label>
                    <form class="form-inline" action="./busca/buscatimes.php" method="POST">
                        <input type="text" placeholder="Pesquisar times" name="pesquisar"><img class="lupa" src="./image/search.png" width="20">           
                    </form>
                </label>
            </div>
        </div>
    </div>

        <div class="menu"><img class ="home" src="./image/home.png" width="20">
            <a href="index.php"><span class="title">Home </span><img class='icons' src="./image/torneios.png" width="30"></a>
            <a href="./paginas/torneios.php"><span class="title">Torneios</span><img class='icons' src="./image/times.png" width="30"></a>
            <a href="./paginas/times.php"><span class="title">Times</span><img class='icons' src="./image/jogadores.png" width="30"></a>
            <a href="./paginas/jogadores.php"><span class="title">Jogadores</span><img class='icons' src="./image/campeoes.png" width="25"></a>
            <a href="./paginas/campeaos.php"><span class="title">Campeões</span></a>
        </div>

    <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h3>Ultimos 15 jogos</h3>
                   <a href="./paginas/times.php" class="btn">Ver todos times</a>
               </div>
               <table>
                   <thead>
                       <tr>  
                          <td>Time</td>
                          <td>Liga</td>                      
                          <td>Split</td>                      
                          <td>Data</td>
                          <td>Side</td>
                          <td>Resultado</td>
                          <td>Kills</td>
                          <td>Mortes</td>
                          <td>First dragão</td>
                          <td>Dragões</td>
                          <td>First arauto</td>
                          <td>Arautos</td>
                          <td>First torre</td>
                          <td>Torres destruidas</td>
                          <td>Torres perdidas</td>
                          <td>Barons</td>
                          <td>Total gold</td>
                          <td>Pick TOP</td>
                          <td>Pick JNG</td>
                          <td>Pick MID</td>
                          <td>Pick BOT</td>
                          <td>Pick SUP</td>
                       </tr>                            
                   </thead>
                   <tbody>
                       <tr>
                            <?php
                                $sql = "SELECT teamname, league, split, DATE_FORMAT(datahora,'%d/%m/%Y'), side, result=1, kills, deaths, firstdragon, dragons, firstherald, heralds, barons, firsttower, towers, towersenemy, totalgold FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'team')
                                and league in (select league from `cblol` where league != 'LPL')
                                order by datahora desc
                                limit 15";
                                $resultado = $conn->query($sql);
 
                                $sqltop = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'top')
                                order by datahora desc
                                limit 15";
                                $resultadotop = $conn->query($sqltop);
 
                                $sqljng = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'jng')
                                order by datahora desc
                                limit 15";
                                $resultadojng = $conn->query($sqljng);
 
                                $sqlmid = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'mid')
                                order by datahora desc
                                limit 15";
                                $resultadomid = $conn->query($sqlmid);
 
                                $sqlbot = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'bot')
                                order by datahora desc
                                limit 15";
                                $resultadobot = $conn->query($sqlbot);
 
                                $sqlsup = "SELECT champion FROM `cblol`  
                                where position in (SELECT position FROM `cblol` WHERE position = 'sup')
                                order by datahora desc
                                limit 15";
                                $resultadosup = $conn->query($sqlsup);
 
                                while ($registro = $resultado->fetch_array())
                                {                                                                  
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

                                    if ($registro[5] == 0){
                                        $result = 'lose';
                                    } else {
                                        $result = 'win';
                                    }
 
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

 
                                    if($registrotop = $resultadotop->fetch_array()) {
                                        $championtop   =  $registrotop[0];
                                        $championtop    = htmlentities($championtop, ENT_QUOTES, "UTF-8");
                                    } if($registrojng = $resultadojng->fetch_array()) {
                                        $championjng   =  $registrojng[0];
                                        $championjng    = htmlentities($championjng, ENT_QUOTES, "UTF-8");
                                    } if($registromid = $resultadomid->fetch_array()) {
                                        $championmid   =  $registromid[0];
                                        $championmid    = htmlentities($championmid, ENT_QUOTES, "UTF-8");
                                    } if($registrobot = $resultadobot->fetch_array()) {
                                        $championbot   =  $registrobot[0];
                                        $championbot    = htmlentities($championbot, ENT_QUOTES, "UTF-8");
                                    } if($registrosup = $resultadosup->fetch_array()) {
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
                                    <td> <img class='champion' src='./image/".$championjng.".png'><br>$championjng </td>
                                    <td> <img class='champion' src='./image/".$championmid.".png'><br>$championmid </td>
                                    <td> <img class='champion' src='./image/".$championbot.".png'><br>$championbot </td>
                                    <td> <img class='champion' src='./image/".$championsup.".png'><br>$championsup </td>
                                    </td>";
                                }
                            ?>
                        </tr>            
                    </tbody>  
                </table>                    
           </div>
        </div>
   </div>   
      
</body>
</html>


