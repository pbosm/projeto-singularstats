<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Torneios </title> 
  <link rel="stylesheet" type="text/css" href="../css/styletorneios.css"> 
</head> 

<body>
<div class="container">
  <div class="navigantion">
      <ul>
          <li>
              <a href="#"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="albums"></ion-icon></span>-->
                  <img src="../image/SingularPreto.png" class="logo" title="eSports" width="250">
              </a>
          </li>
          <li>
              <a href="../index.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="home-outline"></ion-icon></span>-->
                  <span class="title">Home</span>
              </a>
          </li>
          <li>
              <a href="../paginas/torneios.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="person-outline"></ion-icon></span>-->
                  <span class="title">Torneios</span>
              </a>
          </li>
          <li>
              <a href="../paginas/times.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>-->
                  <span class="title">Times</span>
              </a>
          </li>
          <li> 
              <a href="../paginas/jogadores.php"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="help-outline"></ion-icon></span>-->
                  <span class="title">Jogadores</span>
              </a>
          </li>
          <li> 
              <a href="../paginas/campeaos.php"> <!--- colocar -->
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
           <img src="../image/SingularAzul.png" alt="Imagem" title="SingularStats" width="1500">
       </div>

       <!-- order details list -->
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h2>Torneios</h2>
               </div>
                    <!-- <div class="region_filter">
                        <span>Torneios</span>
                        <span>
                        <select id="cblol" name="cblol" class="form-control" onchange="recharge()"></select>
                        </span>
                    </div> -->
               <table>
                   <thead>
                       <tr>                          
                          <td>Região</td>
                          <td>Split</td>
                          <td>Número de jogos</td>
                          <td>Duração das partidas</td>
                          <td>Média de kills</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT league, split, sum(result=1), sum(duracaogame) / 2 / sum(result=1) / 60, sum(teamkills) / sum(result=1) FROM  `lck` 
                                where league in (SELECT league FROM `lck` WHERE league = 'lck') 
                                and split in (select split from `lck` where split = 'Spring')
                                and position in (select position from `lck` where position = 'team')
                                union 
                                SELECT league, split, sum(result=1), sum(duracaogame) / 2 / sum(result=1) / 60, sum(teamkills) / sum(result=1) FROM `cblol`
                                where league in (SELECT league FROM `cblol` WHERE league = 'cblol') 
                                and split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')
                                union
                                SELECT league, split, sum(result=1), sum(duracaogame) / 2 / sum(result=1) / 60, sum(teamkills) / sum(result=1) FROM `lpl`
                                where league in (SELECT league FROM `lpl` WHERE league = 'lpl') 
                                and split in (select split from `lpl` where split = 'spring')
                                and position in (select position from `lpl` where position = 'team')
                                order by league";
                                $resultado = $conn->query($sql);
                                
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $league    =  $registro[0];
                                    $split     =  $registro[1];
                                    $games     =  $registro[2];
                                    $duracao   =  $registro[3]; 
                                    $mediakill =  $registro[4];

                                    $league    = htmlentities($league, ENT_QUOTES, "UTF-8");
                                    $games     = htmlentities($games,  ENT_QUOTES, "UTF-8");
                                    $duracao   = htmlentities($duracao,  ENT_QUOTES, "UTF-8");
                                    $mediakill = htmlentities($mediakill,  ENT_QUOTES, "UTF-8");                                       
                                    $format_duracao    = number_format($duracao, 2, ':', '.');
                                    $format_mediakill  = number_format($mediakill, 0,);
                                    $format_duracao    = htmlentities($format_duracao, ENT_QUOTES, "UTF-8");
                                    $format_mediakill  = htmlentities($format_mediakill, ENT_QUOTES, "UTF-8");    


                                    echo "<tr>
                                                <td> $registro[0] </td> 
                                                <td> $registro[1] </td>
                                                <td> $registro[2] </td>                                               
                                                <td> $format_duracao </td>
                                                <td> $format_mediakill </td>";
                                }
                            ?>                                                
           </div>
        </div>
        <!-- OUTRA -->
   </div>                               
</div>  

</body>
</html>

