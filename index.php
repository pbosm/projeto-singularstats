<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Singularstats </title> 
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="icon" href="./image/icone.png">
    <div class="navigation"></div>
</head>

<body>
    <div class="main">
        <div class="logo-logo">
            <a href="#"><img class='logo' src="./image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
        </div>
            <div class="search">
                <label>
                    <form class="form-inline" action="./busca/buscatimes.php" method="POST">
                        <input type="text" placeholder="Pesquisar times" name="pesquisar"><img class="lupa" src="./image/search.png" width="20">           
                    </form>
                </label>
            </div>
        </div>
    </div>

        <div class="menu"><img class ="home" src="./image/home.png" width="20">
            <a href="index.php"><span class="title">Home </span><img class='icons' src="./image/torneios.png" width="30"></a>
            <a href="./paginas/torneios.php"><span class="title">Torneios</span><img class='icons' src="./image/times.png" width="30"></a>
            <a href="./paginas/times.php"><span class="title">Times</span><img class='icons' src="./image/jogadores.png" width="30"></a>
            <a href="./paginas/jogadores.php"><span class="title">Jogadores</span><img class='icons' src="./image/campeoes.png" width="25"></a>
            <a href="./paginas/campeaos.php"><span class="title">Campeões</span></a>
        </div>

    <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h3>Ultimos 15 jogos</h3>
                   <a href="./paginas/times.php" class="btn">Ver todos times</a>
               </div>
               <table>
                   <thead>
                       <tr>  
                          <td>Time</td>
                          <td>Liga</td>                      
                          <td>Split</td>                      
                          <td>Data</td>
                          <td>Side</td>
                          <td>Resultado</td>
                          <td>Kills</td>
                          <td>Mortes</td>
                          <td>First dragão</td>
                          <td>Dragões</td>
                          <td>First arauto</td>
                          <td>Arautos</td>
                          <td>First torre</td>
                          <td>Torres destruidas</td>
                          <td>Torres perdidas</td>
                          <td>Barons</td>
                          <td>Total gold</td>
                          <td>Pick TOP</td>
                          <td>Pick JNG</td>
                          <td>Pick MID</td>
                          <td>Pick BOT</td>
                          <td>Pick SUP</td>
                       </tr>                            
                   </thead>
                   <tbody>
                        <tr>
                            <?php
                                require_once "./classes/class.php";
                                $home = new Stats();

                                $home->getLastGames();
                            ?>
                        </tr>            
                    </tbody>  
                </table>                    
           </div>
        </div>
   </div>   
      
</body>
</html>


