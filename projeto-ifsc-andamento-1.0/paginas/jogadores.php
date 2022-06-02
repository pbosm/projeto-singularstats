<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Jogadores </title> 
  <link rel="stylesheet" type="text/css" href="../css/stylejogadores.css"> 
</head> 

<div class="container">
  <div class="navigantion">
      <ul>
          <li>
              <a href="#"> <!--- colocar -->
                  <!--<span class="icon"><ion-icon name="albums"></ion-icon></span>-->
                  <img src="../image/logo.png" class="logoicon" title="eSports" width="300">
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
           <img src="../image/camille.png" alt="Imagem" title="Imagem">
       </div>

       <!-- order details list -->
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h2>Jogadores</h2>
                   <div class="search">
                    <label>
                    <form class="form-inline" action="../busca/buscatimes.php" method="POST">
                        <input type="text" placeholder="Procure por algum jogador específico" name="pesquisar">              
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button> -->
                    </form>
                    </label>
                 </div>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Player</td>
                          <td>Nacionalidade</td>
                          <td>Posição</td>
                          <td>Games</td>
                          <td>Win ratio</td>
                          <td>KDA</td>
                          <td>Média de abates</td>
                          <td>Média de mortes</td>
                          <td>Média de assistência</td>
                          <td>Média de participação</td>
                          <td>Média de dano por partida</td>
                          <td>CS por minuto</td>
                          <td>GOLD por minuto</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                $conn = mysqli_connect('localhost','root','', 'beise2');

                                $sql = "SELECT * FROM dados";
                                $resultado = $conn->query($sql);
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $time               =  $registro[0];
                                    $jogos_total        =  $registro[1];
                                    $venceu             = $registro[6];
                                    $venceuladoazul     = $registro[7];
                                    $venceuladovermelho = $registro[8];

                                    $mediaTorre = ($registro[3] + $registro[5] * 100 / $registro[1]);
                                    $venceu = ($registro[6] / $registro[1] *  100);
                                    $venceuladoazul = ($registro[7] / $registro[1] *  100);
                                    $venceuladovermelho = ($registro[8] / $registro[1] *  100);

                                    $time           = htmlentities($time, ENT_QUOTES, "UTF-8");
                                    $jogos_total    = htmlentities($jogos_total,  ENT_QUOTES, "UTF-8");
                                    $mediaTorre = htmlentities($mediaTorre,  ENT_QUOTES, "UTF-8");
                                    $venceu         = htmlentities($venceu,  ENT_QUOTES, "UTF-8");;
                                    $venceuladoazul     = htmlentities($venceuladoazul,  ENT_QUOTES, "UTF-8");;
                                    $venceuladovermelho = htmlentities($venceuladovermelho,  ENT_QUOTES, "UTF-8");;


                                    echo "<tr>
                                                <td> Teste </td> 
                                                <td> BR </td>
                                                <td> ADC </td>
                                                <td> 20 </td>
                                                <td> 75% </td>
                                                <td> 3.3 </td>
                                                <td> 4.5 </td>
                                                <td> 2.7 </td>
                                                <td> 6.5 </td>
                                                <td> 75% </td>
                                                <td> 28% </td>
                                                <td> 8.1 </td>
                                                <td> 586 </td>
                                                </td>";
                                }
                              
                                echo "</table>"; 
                            ?>
                        </tr>                      
           </div>
        </div>
        <!-- OUTRA -->
   </div>                               
</div>  

</body>
</html>