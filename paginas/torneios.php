<?php
//Get Heroku ClearDB connection information  
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
    <meta charset="utf-8"> 
    <title> Torneios </title> 
    <link rel="stylesheet" type="text/css" href="../css/styletorneios.css"> 
    <link rel="icon" href="../image/icon.png">
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
                   <h3>Torneios - 2 semestre</h3>
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
                                $sql = "SELECT league, split, sum(result=1) 'jogos', sum(duracaogame) / 2 / sum(result=1) / 60 'Duração game', sum(teamkills) / sum(result=1) 'Media de kill', sum(result=1 and side='blue') / sum(result=1) * 100 'WinratioBlueside', sum(result=1 and side='red') / sum(result=1) * 100 'WinratioRedside', sum(dragons) / sum(result=1), sum(barons) / sum(result=1) FROM `cblol`
                                where league in (SELECT league FROM `cblol` WHERE league = 'cblol') 
                                and split in (select split from `cblol` where split = 'split 2')
                                and position in (select position from `cblol` where position = 'team')
                                
                                union
                                SELECT league, split, sum(result=1) 'jogos', sum(duracaogame) / 2 / sum(result=1) / 60 'Duração game', sum(teamkills) / sum(result=1) 'Media de kill', sum(result=1 and side='blue') / sum(result=1) * 100'WinratioBlueside', sum(result=1 and side='red') / sum(result=1) * 100 'WinratioRedside', sum(dragons) / sum(result=1), sum(barons) / sum(result=1) FROM  `lck`
                                where league in (SELECT league FROM `lck` WHERE league = 'lck') 
                                and split in (select split from `lck` where split = 'Summer')
                                and position in (select position from `lck` where position = 'team')

                                union
                                SELECT league, split, sum(result=1) 'jogos', sum(duracaogame) / 2 / sum(result=1) / 60 'Duração game', sum(teamkills) / sum(result=1) 'Media de kill', sum(result=1 and side='blue') / sum(result=1) * 100'WinratioBlueside', sum(result=1 and side='red') / sum(result=1) * 100 'WinratioRedside', sum(dragons) / sum(result=1), sum(barons) / sum(result=1) FROM `lpl`
                                where league in (SELECT league FROM `lpl` WHERE league = 'lpl') 
                                and split in (select split from `lpl` where split = 'summer')
                                and position in (select position from `lpl` where position = 'team')
                                order by league";
                                $resultado = $conn->query($sql);
                                
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $league       = $registro[0];
                                    $split        = $registro[1];
                                    $games        = $registro[2];
                                    $duracao      = $registro[3]; 
                                    $mediakill    = $registro[4];
                                    $winratioblue = $registro[5];    
                                    $winratiored  = $registro[6];
                                    $dragons      = $registro[7];
                                    $barons       = $registro[8];

                                    $league       = htmlentities($league, ENT_QUOTES, "UTF-8");
                                    $games        = htmlentities($games,  ENT_QUOTES, "UTF-8");
                                    $duracao      = htmlentities($duracao,  ENT_QUOTES, "UTF-8");
                                    $mediakill    = htmlentities($mediakill,  ENT_QUOTES, "UTF-8"); 
                                    $winratioblue = htmlentities($winratioblue,  ENT_QUOTES, "UTF-8"); 
                                    $winratiored  = htmlentities($winratiored,  ENT_QUOTES, "UTF-8"); 
                                    $dragons      = htmlentities($dragons,  ENT_QUOTES, "UTF-8"); 
                                    $barons       = htmlentities($barons,  ENT_QUOTES, "UTF-8");                                       
                                    $format_duracao    = number_format($duracao, 2, ':', '.');
                                    $format_mediakill  = number_format($mediakill, 1,);
                                    $format_winblue    = number_format($winratioblue, 1,);
                                    $format_winred     = number_format($winratiored, 1,);
                                    $format_dragons    = number_format($dragons, 1,);
                                    $format_barons     = number_format($barons, 1,);
                                    $format_duracao    = htmlentities($format_duracao, ENT_QUOTES, "UTF-8");
                                    $format_mediakill  = htmlentities($format_mediakill, ENT_QUOTES, "UTF-8");    


                                    echo "<tr>
                                                <td> $registro[0] </td> 
                                                <td> $registro[1] </td>
                                                <td> $registro[2] </td>                                               
                                                <td> $format_duracao </td>
                                                <td> $format_mediakill </td>
                                                <td> $format_winblue </td>
                                                <td> $format_winred </td>
                                                <td> $format_dragons </td>
                                                <td> $format_barons </td>";
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

