<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Torneios </title> 
    <link rel="stylesheet" type="text/css" href="../css/styletorneios.css"> 
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>
<body>
    <div class="navigation"></div>
    <div class="main">
        <div class="cardBox">
            <a href="#"><img class='logo' src="../image/SingularPreto.png" alt="Imagem" title="SingularStats" width="300"></a>
       </div>
       <div class="search">
        <label>
            <form class="form-inline" action="../busca/buscatimes.php" method="POST">
                <input type="text" placeholder="Pesquisar times" name="pesquisar"> <img class="search" src="../image/search.png" width="20">          
            </form>
        </label>
    </div>
    <div class="menu">
            <a href="../index.php"><span class="title">Home</span><img class="home" src="../image/home.png" width="22"></a>
            <a href="../paginas/torneios.php"><span class="title">Torneios</span><img src="../image/torneios.png" width="30"></a>
            <a href="../paginas/times.php"><span class="title">Times</span><img class="times" src="../image/times.png" width="30"></a>
            <a href="../paginas/jogadores.php"><span class="title">Jogadores</span><img src="../image/jogadores.png" width="30"></a>
            <a href="../paginas/campeaos.php"><span class="title">Campeões</span><img src="../image/campeoes.png" width="30"></a>
   </div>
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h3>Torneios</h3>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Região</td>
                          <td>Split</td>
                          <td>Número de jogos</td>
                          <td>Duração das partidas</td>
                          <td>Média de kills</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     
                           <?php
                                $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

                                $sql = "SELECT league, split, sum(result=1), sum(duracaogame) / 2 / sum(result=1) / 60, sum(teamkills) / sum(result=1) FROM  `lck` 
                                where league in (SELECT league FROM `lck` WHERE league = 'lck') 
                                and split in (select split from `lck` where split = 'Spring')
                                and position in (select position from `lck` where position = 'team')
                                union 
                                SELECT league, split, sum(result=1), sum(duracaogame) / 2 / sum(result=1) / 60, sum(teamkills) / sum(result=1) FROM `cblol`
                                where league in (SELECT league FROM `cblol` WHERE league = 'cblol') 
                                and split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')
                                union
                                SELECT league, split, sum(result=1), sum(duracaogame) / 2 / sum(result=1) / 60, sum(teamkills) / sum(result=1) FROM `lpl`
                                where league in (SELECT league FROM `lpl` WHERE league = 'lpl') 
                                and split in (select split from `lpl` where split = 'spring')
                                and position in (select position from `lpl` where position = 'team')
                                order by league";
                                $resultado = $conn->query($sql);
                                
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $league    =  $registro[0];
                                    $split     =  $registro[1];
                                    $games     =  $registro[2];
                                    $duracao   =  $registro[3]; 
                                    $mediakill =  $registro[4];

                                    $league    = htmlentities($league, ENT_QUOTES, "UTF-8");
                                    $games     = htmlentities($games,  ENT_QUOTES, "UTF-8");
                                    $duracao   = htmlentities($duracao,  ENT_QUOTES, "UTF-8");
                                    $mediakill = htmlentities($mediakill,  ENT_QUOTES, "UTF-8");                                       
                                    $format_duracao    = number_format($duracao, 2, ':', '.');
                                    $format_mediakill  = number_format($mediakill, 0,);
                                    $format_duracao    = htmlentities($format_duracao, ENT_QUOTES, "UTF-8");
                                    $format_mediakill  = htmlentities($format_mediakill, ENT_QUOTES, "UTF-8");    


                                    echo "<tr>
                                                <td> $registro[0] </td> 
                                                <td> $registro[1] </td>
                                                <td> $registro[2] </td>                                               
                                                <td> $format_duracao </td>
                                                <td> $format_mediakill </td>";
                                }
                            ?>
                    </tr>            
                </tbody>  
            </table>                                                 
        </div>
   </div>                               
</div>  

</body>
</html>

