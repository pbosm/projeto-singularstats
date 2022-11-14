<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Campeões </title> 
    <link rel="stylesheet" type="text/css" href="../css/stylecampeaos.css"> 
    <link rel="icon" href="../image/icone.png">
    <div class="navigation"></div>
</head> 

    <div class="main">
        <div class="logo-logo">
            <a href="../index.php"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
        </div>
            <div class="search">
                <label>
                    <form class="form-inline" action="../busca/buscachamp1.php" method="POST">
                        <input type="text" placeholder="Pesquisar campeão" name="pesquisar"><img class="lupa" src="../image/search.png" width="20">           
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
                   <h3>Campeões - 1 semestre</h3>
                   <a href="../paginas/campeaos1.php" class="btn">1 split</a>
                   <a href="../paginas/campeaos.php" class="btn2">2 split</a>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Campeão</td>
                          <td>Jogos</td>
                          <td>Jogos blueside</td>
                          <td>Jogos redside</td>
                          <td>Winratio</td>
                          <td>Kills</td>
                          <td>Mortes</td>
                          <td>Assistência</td>
                          <td>KDA</td>
                          <td>Participação no FB</td>
                          <td>Dano por minuto</td>
                          <td>CS por minuto</td>
                          <td>Gold por minuto</td>
                          <td>XP diff aos 15</td>
                          <td>Gold diff aos 15</td>
                          <td>CS diff aos 15</td>
                       </tr>                            
                   </thead>
                   <tbody >
                        <tr>     
                            <?php
                                require_once "../classes/champ.php";
                                $champssplit1 = new Champ();

                                $champssplit1->getChampsSplit1();                                
                            ?> 
                        </tr>                 
           </div>
        </div>
   </div>                               
</div>  

</body>
</html> 