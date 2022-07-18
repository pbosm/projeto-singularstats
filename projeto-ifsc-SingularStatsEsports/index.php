<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Home </title> 
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head> 

<div class="container">
  <div class="navigantion">
      <ul>
          <li>
              <a href="#"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="albums"></ion-icon></span>-->
                  <img src="./image/SingularPreto.png" class="logo" title="eSports" width="250">
              </a>
          </li>
          <li>
              <a href="index.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="home-outline"></ion-icon></span>-->
                  <span class="title">Home</span>
              </a>
          </li>
          <li>
              <a href="./paginas/torneios.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="person-outline"></ion-icon></span>-->
                  <span class="title">Torneios</span>
              </a>
          </li>
          <li>
              <a href="./paginas/times.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>-->
                  <span class="title">Times</span>
              </a>
          </li>
          <li> 
              <a href="./paginas/jogadores.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="help-outline"></ion-icon></span>-->
                  <span class="title">Jogadores</span>
              </a>
          </li>
          <li> 
              <a href="./paginas/campeaos.php"> <!--- colocar -->
                  <!--- <span class="icon"><ion-icon name="help-outline"></ion-icon></span>-->
                  <span class="title">Campeãos</span>
              </a>
          </li>
      </ul>
   </div>
   
   <!-- main -->
   <div class="main">

       <!-- cards -->
       <div class="cardBox">
           <img src="./image/SingularAzul.png" alt="Imagem" title="SingularStats" width="1500">
       </div>

       <!-- order details list -->
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h2>Ultimos jogos</h2>
                   <a href="./paginas/times.php" class="btn">Ver todos times</a>
               </div>
               <table>
                   <thead>
                       <tr>  
                          <td>Time</td> 
                          <td>Liga</td>                       
                          <td>Split</td>                       
                          <td>Data hora</td>
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
                                    <td> $championtop </td>
                                    <td> $championjng </td>
                                    <td> $championmid </td>
                                    <td> $championbot </td>
                                    <td> $championsup </td>
                                    </td>";
                                }
                            ?>                      
                    </tbody>  
                </table>                    
           </div>
        </div>
   </div>                               
</div>  

</body>
</html>

