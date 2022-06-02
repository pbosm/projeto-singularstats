<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Torneios </title> 
  <link rel="stylesheet" type="text/css" href="../css/styletorneios.css"> 
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
                   <h2>Torneios</h2>
                   <div class="search">
                    <label>
                    <form class="form-inline" action="../busca/buscatorneios.php" method="POST">
                        <input type="text" placeholder="Procure por algum torneio específico" name="pesquisar">              
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button> -->
                    </form>
                    </label>
                 </div>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Região</td>
                          <td>Número de jogos</td>
                          <td>Duração das partidas</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                $pesquisar = $_POST['pesquisar'];
                                $conn = mysqli_connect('localhost','root','', 'beise2');
                                $sqltorneios = "SELECT * FROM `torneios` where regiao like '%$pesquisar%'";
                                $result = $conn->query($sqltorneios);
                               
                                $resultado = $conn->query($sqltorneios);
                                
                                while ($sqltorneios = mysqli_fetch_assoc($result) and $registro = $resultado->fetch_array())                                   
                                {               
                                    
                                    $regiao = $sqltorneios['regiao'];
                                    $games   =  $registro[1];
                                    $duracao =  $registro[2];
    
                                    $regiao  = htmlentities($regiao, ENT_QUOTES, "UTF-8");
                                    $games   = htmlentities($games,  ENT_QUOTES, "UTF-8");
                                    $duracao = htmlentities($duracao,  ENT_QUOTES, "UTF-8");
    
    
                                    echo "<tr>
                                            <td> $regiao </td> 
                                            <td> $registro[1] </td>
                                            <td> $registro[2] </td>
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

