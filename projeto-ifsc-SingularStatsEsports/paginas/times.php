<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Times </title> 
  <link rel="stylesheet" type="text/css" href="../css/styletimes.css"> 
</head> 

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
                   <h2>Times</h2>
                   <div class="search">
                    <label>
                    <form class="form-inline" action="../busca/buscatimes.php" method="POST">
                        <input type="text" placeholder="Procure por algum time específico" name="pesquisar">              
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button> -->
                    </form>
                    </label>
                 </div>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Time</td>
                          <td>Total jogos</td>
                          <td>Duração media das partidas</td>
                          <td>Jogos blueside</td>
                          <td>Win ratio blueside</td>
                          <td>Jogos redside</td>
                          <td>Win ratio redside</td>
                          <td>Win ratio</td>
                          <td>First torre</td>
                          <td>First torre blueside</td>
                          <td>First torre redside</td>
                          <td>First blood</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                $conn = mysqli_connect('localhost','root','', 'bdlolcblol');

                                $sql = "SELECT teamname, count(teamname), sum(duracaogame) / count(teamname) / 60, Sum(side='Blue'), sum(result=1 and side='Blue') / sum(side='blue') * 100,  Sum(side='Red'), sum(result=1 and side='red') / sum(side='red') * 100, SUM(result=1) / count(teamname) * 100, sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(firstblood) / count(teamname) * 100 from `cblol`
                                where split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')
                                GROUP BY teamname;";
                                $resultado = $conn->query($sql);
                                
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $time           =  $registro[0];
                                    $jogos_total    =  $registro[1];
                                    $duracao        = $registro[2];
                                    $jogosblue      = $registro[3];
                                    $winratioblue   = $registro[4];
                                    $jogosred       = $registro[5];
                                    $winratiored    = $registro[6];
                                    $winratio       = $registro[7];
                                    $firsttorre     = $registro[8];
                                    $firsttorreblue = $registro[9];
                                    $firsttorrered  = $registro[10];
                                    $fb             = $registro[11];
                                    
                                    $time           = htmlentities($time, ENT_QUOTES, "UTF-8");
                                    $jogos_total    = htmlentities($jogos_total,  ENT_QUOTES, "UTF-8");
                                    $jogosblue      = htmlentities($jogosblue,  ENT_QUOTES, "UTF-8");
                                    $winratioblue   = htmlentities($winratioblue,  ENT_QUOTES, "UTF-8");
                                    $jogosred       = htmlentities($jogosred,  ENT_QUOTES, "UTF-8");
                                    $winratiored    = htmlentities($winratiored,  ENT_QUOTES, "UTF-8");
                                    $winratio       = htmlentities($winratio,  ENT_QUOTES, "UTF-8");
                                    $firsttorre     = htmlentities($firsttorre,  ENT_QUOTES, "UTF-8");
                                    $firsttorreblue = htmlentities($firsttorreblue,  ENT_QUOTES, "UTF-8");
                                    $firsttorrered  = htmlentities($firsttorrered,  ENT_QUOTES, "UTF-8");
                                    $fb             = htmlentities($fb,  ENT_QUOTES, "UTF-8");

                                    $format_duracao = number_format($duracao, 0);
                                    $format_duracao = htmlentities($format_duracao,  ENT_QUOTES, "UTF-8");
                                    $format_winratioblue = number_format($winratioblue, 2, '.', '.');
                                    $format_winratioblue = htmlentities($format_winratioblue,  ENT_QUOTES, "UTF-8");
                                    $format_winratiored = number_format($winratiored, 2, '.', '.');
                                    $format_winratiored = htmlentities($format_winratiored,  ENT_QUOTES, "UTF-8");
                                    $format_winratio = number_format($winratio, 2, '.', '.');
                                    $format_winratio = htmlentities($format_winratio,  ENT_QUOTES, "UTF-8");
                                    $format_firsttorre = number_format($firsttorre, 2, '.', '.');
                                    $format_firsttorre = htmlentities($format_firsttorre,  ENT_QUOTES, "UTF-8");
                                    $format_firsttorreblue = number_format($firsttorreblue, 2, '.', '.');
                                    $format_firsttorreblue = htmlentities($format_firsttorreblue,  ENT_QUOTES, "UTF-8");
                                    $format_firsttorrered = number_format($firsttorrered, 2, '.', '.');
                                    $format_firsttorrered = htmlentities($format_firsttorrered,  ENT_QUOTES, "UTF-8");
                                    $format_fb = number_format($fb, 2, '.', '.');
                                    $format_fb = htmlentities($format_fb,  ENT_QUOTES, "UTF-8");

                                    echo "<tr>
                                                <td><a href='../times/$time.php'> $registro[0]</td> 
                                                <td> $registro[1]</td>
                                                <td> $format_duracao minutos</td>
                                                <td> $registro[3]</td>
                                                <td> $format_winratioblue%</td>
                                                <td> $registro[5]</td>
                                                <td> $format_winratiored%</td>
                                                <td> $format_winratio%</td>
                                                <td> $format_firsttorre%</td>
                                                <td> $format_firsttorreblue%</td>
                                                <td> $format_firsttorrered%</td>
                                                <td> $format_fb%</td>
                                                </td>";
                                    }                         
                                    echo "</table>"; 
                            ?>                      
           </div>
        </div>
        <!-- OUTRA -->
   </div>                               
</div>  

</body>
</html>

