<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Torneios </title> 
    <link rel="stylesheet" type="text/css" href="../css/styletorneios.css">
    <link rel="icon" href="../image/icone.png"> 
    <div class="navigation"></div>
</head>

<body>
    <div class="main">
            <div class="logo-logo">
                <a href="../index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
            </div>
                <div class="search">
                    <label>
                        <form class="form-inline" action="../busca/buscatimes.php" method="POST">
                            <input type="text" placeholder="Pesquisar times" name="pesquisar"><img class="lupa" src="../image/search.png" width="20">           
                        </form>
                    </label>
                </div>
            </div>
        </div>

        <div class="menu"><img class ="home" src="../image/home.png" width="20">
            <a href="../index.php"><span class="title">Home </span><img class='icons' src="../image/torneios.png" width="30"></a>
            <a href="../paginas/torneios.php"><span class="title">Torneios</span><img class='icons' src="../image/times.png" width="30"></a>
            <a href="../paginas/times.php"><span class="title">Times</span><img class='icons' src="../image/jogadores.png" width="30"></a>
            <a href="../paginas/jogadores.php"><span class="title">Jogadores</span><img class='icons' src="../image/campeoes.png" width="25"></a>
            <a href="../paginas/campeaos.php"><span class="title">Campeões</span></a>
        </div>

       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h3>Torneios - 1 semestre</h3>
                   <a href="../paginas/torneios1.php" class="btn">1 split</a>
                   <a href="../paginas/torneios.php" class="btn2">2 split</a>
               </div>
               <table>
                   <thead>
                       <tr>                          
                          <td>Região</td>
                          <td>Split</td>
                          <td>Número de jogos</td>
                          <td>Duração das partidas</td>
                          <td>Média de kills</td>
                          <td>Winratio Blueside</td>
                          <td>Winratio Redside</td>
                          <td>Dragons por jogo</td>
                          <td>Barons por jogo</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                require_once "../classes/torneios.php";
                                $torneios1 = new Torneios();

                                $torneios1->getTournamentSplit1();
                            ?>
                    </tr>            
                </tbody>  
            </table>                                                 
        </div>
   </div>                               
</div>  

</body>
</html>

