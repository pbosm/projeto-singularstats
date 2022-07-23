<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Torneios </title> 
    <link rel="stylesheet" type="text/css" href="../css/styletorneios.css"> 
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <div class="navigation"></div>
</head> 
    <div class="main">
        <div class="cardBox">
            <a href="#"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
       </div>
       <div class="search">
        <label>
            <form class="form-inline" action="./busca/buscatimes.php" method="POST">
                <input type="text" placeholder="Pesquisar times" name="pesquisar"> <i class="fa fa-search" aria-hidden="true"></i>          
            </form>
        </label>
        </div>
    </div>
    <div class="menu">
          <a href="../index.php"><span class="title">Home </span><img src="../image/torneios.png" width="30"></a>
          <a href="../paginas/torneios.php"><span class="title">Torneios</span><img src="../image/times.png" width="30"></a>
          <a href="../paginas/times.php"><span class="title">Times</span><img src="../image/jogadores.png" width="30"></a>
          <a href="../paginas/jogadores.php"><span class="title">Jogadores</span><img src="../image/campeoes.png" width="25"></a>
          <a href="../paginas/campeaos.php"><span class="title">Campeões</span></a>
   </div>
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h3>Torneios</h3>
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

