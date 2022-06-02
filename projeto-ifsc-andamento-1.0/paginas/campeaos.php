<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Campeãos </title> 
  <link rel="stylesheet" type="text/css" href="../css/stylecampeaos.css"> 
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
                   <h2>Campeãos</h2>
                   <div class="search">
                    <label>
                    <form class="form-inline" action="../busca/buscatimes.php" method="POST">
                        <input type="text" placeholder="Procure por algum champ específico" name="pesquisar">              
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button> -->
                    </form>
                    </label>
                 </div>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Campeão</td>
                          <td>Picks</td>
                          <td>Bans</td>
                          <td>Presença</td>
                          <td>Vitórias</td>
                          <td>Derrotas</td>
                          <td>Win ratio</td>
                          <td>KDA</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                $conn = mysqli_connect('localhost','root','', 'beise2');

                                $sql = "SELECT * FROM champions";
                                $resultado = $conn->query($sql);
                                while ($registro = $resultado->fetch_array()) 
                                {                                       

                                    $nome  =  $registro[0];
                                    $picks =  $registro[1];
                                    $bans  = $registro[2];
                                    $presenca = $registro[3];
                                    $vitorias = $registro[4];
                                    $derrotas = $registro[5];
                                    $winratio = $registro[6];
                                    $kda = $registro[7];

                                    $nome  = htmlentities($nome, ENT_QUOTES, "UTF-8");
                                    $picks = htmlentities($picks,  ENT_QUOTES, "UTF-8");
                                    $bans  = htmlentities($bans,  ENT_QUOTES, "UTF-8");
                                    $presenca = htmlentities($presenca,  ENT_QUOTES, "UTF-8");
                                    $vitorias = htmlentities($vitorias,  ENT_QUOTES, "UTF-8");
                                    $derrotas = htmlentities($derrotas,  ENT_QUOTES, "UTF-8");
                                    $winratio = htmlentities($winratio,  ENT_QUOTES, "UTF-8");
                                    $kda = htmlentities($kda,  ENT_QUOTES, "UTF-8");

                                    echo "<tr>                                    
                                                <td><img class='champion' src='../image/".$nome."'> $registro[0] </td> 
                                                <td> $registro[1] </td>
                                                <td> $registro[2]</td>
                                                <td> $registro[3] </td>
                                                <td> $registro[4] </td>
                                                <td> $registro[5] </td>
                                                <td> $registro[6] </td>
                                                <td> $registro[7] </td>
                                                </td>";
                                }                                
                            ?>                                           
                        </tr>                 
           </div>
        </div>
        <!-- OUTRA -->
   </div>                               
</div>  

</body>
</html>