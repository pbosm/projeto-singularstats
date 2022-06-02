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
                  <img src="../image/logo.png" class="Teste" title="eSports" width="300">
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
                          <td>Total de torres pegas</td>
                          <td>Win ratio</td>
                          <td>Win ratio lado azul</td>
                          <td>Win ratio lado vermelho</td>
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
                                                <td> $registro[0] </td> 
                                                <td> $registro[1] </td>
                                                <td> $mediaTorre% </td>
                                                <td> $venceu% </td>
                                                <td> $venceuladoazul% </td>
                                                <td> $venceuladovermelho% </td>
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

