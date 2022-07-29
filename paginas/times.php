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
    <title> Times </title> 
    <link rel="stylesheet" type="text/css" href="../css/styletimes.css"> 
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <div class="navigation"></div>
</head>
<body>
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
                   <h3>Times</h3>   
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
                                $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

                                $sql = "SELECT teamname, count(teamname), sum(duracaogame) / count(teamname) / 60, Sum(side='Blue'), sum(result=1 and side='Blue') / sum(side='blue') * 100,  Sum(side='Red'), sum(result=1 and side='red') / sum(side='red') * 100, SUM(result=1) / count(teamname) * 100, sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(firstblood) / count(teamname) * 100 from `cblol`
                                where split in (select split from `cblol` where split = 'split 1')
                                and position in (select position from `cblol` where position = 'team')
                                GROUP BY teamname;";
                                $resultado = $conn->query($sql);
                                
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $time           =  $registro[0];
                                    $jogos_total    =  $registro[1];
                                    $duracao        = $registro[2];
                                    $jogosblue      = $registro[3];
                                    $winratioblue   = $registro[4];
                                    $jogosred       = $registro[5];
                                    $winratiored    = $registro[6];
                                    $winratio       = $registro[7];
                                    $firsttorre     = $registro[8];
                                    $firsttorreblue = $registro[9];
                                    $firsttorrered  = $registro[10];
                                    $fb             = $registro[11];
                                    
                                    $time           = htmlentities($time, ENT_QUOTES, "UTF-8");
                                    $jogos_total    = htmlentities($jogos_total,  ENT_QUOTES, "UTF-8");
                                    $jogosblue      = htmlentities($jogosblue,  ENT_QUOTES, "UTF-8");
                                    $winratioblue   = htmlentities($winratioblue,  ENT_QUOTES, "UTF-8");
                                    $jogosred       = htmlentities($jogosred,  ENT_QUOTES, "UTF-8");
                                    $winratiored    = htmlentities($winratiored,  ENT_QUOTES, "UTF-8");
                                    $winratio       = htmlentities($winratio,  ENT_QUOTES, "UTF-8");
                                    $firsttorre     = htmlentities($firsttorre,  ENT_QUOTES, "UTF-8");
                                    $firsttorreblue = htmlentities($firsttorreblue,  ENT_QUOTES, "UTF-8");
                                    $firsttorrered  = htmlentities($firsttorrered,  ENT_QUOTES, "UTF-8");
                                    $fb             = htmlentities($fb,  ENT_QUOTES, "UTF-8");

                                    $format_duracao = number_format($duracao, 0);
                                    $format_duracao = htmlentities($format_duracao,  ENT_QUOTES, "UTF-8");
                                    $format_winratioblue = number_format($winratioblue, 2, '.', '.');
                                    $format_winratioblue = htmlentities($format_winratioblue,  ENT_QUOTES, "UTF-8");
                                    $format_winratiored = number_format($winratiored, 2, '.', '.');
                                    $format_winratiored = htmlentities($format_winratiored,  ENT_QUOTES, "UTF-8");
                                    $format_winratio = number_format($winratio, 2, '.', '.');
                                    $format_winratio = htmlentities($format_winratio,  ENT_QUOTES, "UTF-8");
                                    $format_firsttorre = number_format($firsttorre, 2, '.', '.');
                                    $format_firsttorre = htmlentities($format_firsttorre,  ENT_QUOTES, "UTF-8");
                                    $format_firsttorreblue = number_format($firsttorreblue, 2, '.', '.');
                                    $format_firsttorreblue = htmlentities($format_firsttorreblue,  ENT_QUOTES, "UTF-8");
                                    $format_firsttorrered = number_format($firsttorrered, 2, '.', '.');
                                    $format_firsttorrered = htmlentities($format_firsttorrered,  ENT_QUOTES, "UTF-8");
                                    $format_fb = number_format($fb, 2, '.', '.');
                                    $format_fb = htmlentities($format_fb,  ENT_QUOTES, "UTF-8");

                                    echo "<tr>
                                                <td><a href='../times/$time.php'> $registro[0]</td> 
                                                <td> $registro[1]</td>
                                                <td> $format_duracao minutos</td>
                                                <td> $registro[3]</td>
                                                <td> $format_winratioblue%</td>
                                                <td> $registro[5]</td>
                                                <td> $format_winratiored%</td>
                                                <td> $format_winratio%</td>
                                                <td> $format_firsttorre%</td>
                                                <td> $format_firsttorreblue%</td>
                                                <td> $format_firsttorrered%</td>
                                                <td> $format_fb%</td>
                                                </td>";
                                    }                         
                                    echo "</table>"; 
                            ?>                      
           </div>
        </div>
   </div>                               
</div>  

</body>
</html>

