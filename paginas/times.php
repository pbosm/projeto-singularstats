<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Times </title> 
    <link rel="stylesheet" type="text/css" href="../css/styletimes.css">
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
                   <h3>Times - 2 semestre</h3> 
                   <a href="../paginas/times1.php" class="btn">1 split</a>
                   <a href="../paginas/times.php" class="btn2">2 split</a>  
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
                                require_once "../classes/teams.php";
                                $teamssplit2 = new Teams();

                                $teamssplit2->getTeamsSplit2();
                        ?>  
           </div>
        </div>
   </div>                               
</div>  

</body>
</html>