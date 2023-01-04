<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Jogadores </title> 
    <link rel="stylesheet" type="text/css" href="../css/stylejogadores.css"> 
    <div class="navigation"></div>
</head> 

    <div class="main">
        <div class="logo-logo">
            <a href="../index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
        </div>
            <div class="search">
                <label>
                    <form class="form-inline" action="../busca/buscajogadores1.php" method="POST">
                        <input type="text" placeholder="Pesquisar jogadores" name="pesquisar"><img class="lupa" src="../image/search.png" width="20">           
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
                   <?php $pesquisar = $_POST['pesquisar']; ?>
                   <h3><?php 
                   if ($pesquisar == null) {
                        $pesquisar = ''; 
                   } else  {
                      echo "Jogadores com as inicias ", $pesquisar;
                   } ?> </h3>
                   <a href="../paginas/jogadores1.php" class="btn">1 split</a>
                   <a href="../paginas/jogadores.php" class="btn2">2 split</a>
               </div>
               <table >
                   <thead>
                       <tr>                          
                       <td>Player</td>
                          <td>Time</td>
                          <td>Posição</td>
                          <td>Games</td>
                          <td>KDA</td>
                          <td>Média de abates</td>
                          <td>Média de mortes</td>
                          <td>Média de assistência</td>
                          <td>Média de participação</td>
                          <td>Dano por minuto</td>
                          <td>Porcentagem de dano</td>
                          <td>Ward por minuto</td>
                          <td>Participação no FirstBlood</td>
                          <td>CS por minuto</td>
                          <td>GOLD por minuto</td>
                          <td>XP diff aos 15</td>
                          <td>GOLD diff aos 15</td>
                          <td>CS diff aos 15</td>
                       </tr>                            
                   </thead>
                   <tbody >
                        <tr>     
                            <?php
                                require_once "../classes/players.php";
                                $searchplayers1 = new Players();

                                $searchplayers1->getSearchPlayers1();
                            ?>
                        </tr>                 
           </div>
        </div>
   </div>                               
</div>  

</body>
</html>