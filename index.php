<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Singularstats </title> 
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
</head>
<body>
    <div class="navigation"></div>
        <div class="main">
            <div class="cardBox">
                <a href="#"><img class='logo' src="./image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
        </div>
        <div class="search">
        <label>
            <form class="form-inline" action="./busca/buscatimes.php" method="POST">
                <input type="text" placeholder="Pesquisar times" name="pesquisar"> <img class="search" src="./image/search.png" width="20">   
            </form>
        </label>
        </div>
    </div>
    <div class="menu"><img class ="home" src="./image/home.png" width="20">
            <a href="index.php"><span class="title">Home</span><img src="./image/torneios.png" width="30"></a>
            <a href="./paginas/torneios.php"><span class="title">Torneios</span> <img src="./image/times.png" width="30"></a>
            <a href="./paginas/times.php"><span class="title">Times</span> <img src="./image/jogadores.png" width="30"></a>
            <a href="./paginas/jogadores.php"><span class="title">Jogadores</span> <img src="./image/campeoes.png" width="25"></a>
            <a href="./paginas/campeaos.php"><span class="title">Campeões</span></a>
    </div>
    <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h3>Ultimos jogos</h3>
                   <a href="./paginas/times.php" class="btn">Ver todos times</a>
               </div>
               <table>
                   <thead>
                       <tr>  
                          <td>Time</td>
                          <td>Liga</td>                      
                          <td>Split</td>                      
                          <td>Data e hora</td>
                          <td>Side</td>
                          <td>Resultado</td>
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
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');
 
                                $sql = "SELECT gameid, league, split, datahora, side, teamname, result=1 FROM `cblol`
                                where split in (select split from `cblol` where split = 'split 1')
                                and position in (SELECT position FROM `cblol` WHERE position = 'team')
                                order by datahora desc";
                                $resultado = $conn->query($sql);
 
                                $sqltop = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'top')
                                and split in (select split from `cblol` where split = 'split 1')
                                order by datahora desc";
                                $resultadotop = $conn->query($sqltop);
 
                                $sqljng = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'jng')
                                and split in (select split from `cblol` where split = 'split 1')
                                order by datahora desc";
                                $resultadojng = $conn->query($sqljng);
 
                                $sqlmid = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'mid')
                                and split in (select split from `cblol` where split = 'split 1')
                                order by datahora desc";
                                $resultadomid = $conn->query($sqlmid);
 
                                $sqlbot = "SELECT champion FROM `cblol`
                                where position in (SELECT position FROM `cblol` WHERE position = 'bot')
                                and split in (select split from `cblol` where split = 'split 1')
                                order by datahora desc";
                                $resultadobot = $conn->query($sqlbot);
 
                                $sqlsup = "SELECT champion FROM `cblol`  
                                where position in (SELECT position FROM `cblol` WHERE position = 'sup')
                                and split in (select split from `cblol` where split = 'split 1')
                                order by datahora desc";
                                $resultadosup = $conn->query($sqlsup);
 
                                while ($registro = $resultado->fetch_array())
                                {                                                                  
                                    $gameid     =  $registro[0];
                                    $league     =  $registro[1];
                                    $split      =  $registro[2];
                                    $datahora   =  $registro[3];                                                                  
                                    $side       =  $registro[4];
                                    $teamname   =  $registro[5];
                                    $result     =  $registro[6];

                                    if ($registro[6] == 0){
                                        $result = 'lose';
                                    } else {
                                        $result = 'win';
                                    }
 
                                    $gameid         = htmlentities($gameid, ENT_QUOTES, "UTF-8");
                                    $split          = htmlentities($split, ENT_QUOTES, "UTF-8");
                                    $datahora       = htmlentities($datahora, ENT_QUOTES, "UTF-8");
                                    $side           = htmlentities($side, ENT_QUOTES, "UTF-8");
 
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
                                    <td><a href='./times/$teamname.php'>$teamname</td>
                                    <td> $league</td>
                                    <td> $split</td>
                                    <td> $datahora </td>
                                    <td> $side </td>
                                    <td> $result </td>
                                    <td> <img class='champion' src='./image/".$championtop."'><br>$championtop </td>
                                    <td> <img class='champion' src='./image/".$championjng."'><br>$championjng </td>
                                    <td> <img class='champion' src='./image/".$championmid."'><br>$championmid </td>
                                    <td> <img class='champion' src='./image/".$championbot."'><br>$championbot </td>
                                    <td> <img class='champion' src='./image/".$championsup."'><br>$championsup </td>
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


