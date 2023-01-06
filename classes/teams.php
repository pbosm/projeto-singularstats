<?php

    class Teams {

        public function getTeamsSplit2() 
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();

            $sql = "SELECT teamname, count(teamname), sum(duracaogame) / count(teamname) / 60, Sum(side='Blue'), sum(result=1 and side='Blue') / sum(side='blue') * 100,  Sum(side='Red'), sum(result=1 and side='red') / sum(side='red') * 100, SUM(result=1) / count(teamname) * 100, sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(firstblood) / count(teamname) * 100 from `cblol`
            where split in (select split from `cblol` where split = 'split 2')
            and position in (select position from `cblol` where position = 'team')
            GROUP BY teamname;";
            $code = $conn->prepare($sql, array());
            $code->execute(); 
            
            while ($registro = $code->fetch()) 
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
                            <td><a href='../times2/$time.php'> $registro[0]</td> 
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

                return;
        }

        public function getTeamsSplit1()
        {
            require_once('../connection.php');
            $conn = Database::connectionPDO();
    
            $code = $conn->prepare($sql = "SELECT teamname, count(teamname) AS game, sum(duracaogame) / count(teamname) / 60 AS duracao, Sum(side='Blue') gblue, sum(result=1 and side='Blue') / sum(side='blue') * 100 AS wblue,  Sum(side='Red') gred, sum(result=1 and side='red') / sum(side='red') * 100 AS wred, SUM(result=1) / count(teamname) * 100 AS wr, sum(firsttower) / count(teamname) * 100 AS ft, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100 AS ftblue, sum(firsttower=1 and side='red') / sum(side='red') * 100 AS ftred, sum(firstblood) / count(teamname) * 100 AS fb from `cblol`
                where split in (select split from `cblol` where split = 'split 1')
                and position in (select position from `cblol` where position = 'team')
                GROUP BY teamname;");
            // $code = $conn->prepare($sql);
            $code->execute();
            $team = $code->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($team as $key => $registro) {
    
                $team[$key]['teamname'] = $registro['teamname'];
                $team[$key]['game']     = $registro['game'];
                $team[$key]['duracao']  = $registro['duracao'];
                $team[$key]['gblue']    = $registro['gblue'];
                $team[$key]['wblue']  = $registro['wblue'];
                $team[$key]['gred']  = $registro['gred'];
                $team[$key]['wred']  = $registro['wred'];
                $team[$key]['wr']     = $registro['wr'];
                $team[$key]['ft']     = $registro['ft'];
                $team[$key]['ftblue']     = $registro['ftblue'];
                $team[$key]['ftred']     = $registro['ftred'];
                $team[$key]['fb']     = $registro['fb'];
    
    
    
    
    
                //     $time           =  $registro;
                //     $jogos_total    =  $registro[1];
                //     $duracao        = $registro[2];
                //     $jogosblue      = $registro[3];
                //     $winratioblue   = $registro[4];
                //     $jogosred       = $registro[5];
                //     $winratiored    = $registro[6];
                //     $winratio       = $registro[7];
                //     $firsttorre     = $registro[8];
                //     $firsttorreblue = $registro[9];
                //     $firsttorrered  = $registro[10];
                //     $fb             = $registro[11];
    
                //     $time           = htmlentities($time, ENT_QUOTES, "UTF-8");
                //     $jogos_total    = htmlentities($jogos_total,  ENT_QUOTES, "UTF-8");
                //     $jogosblue      = htmlentities($jogosblue,  ENT_QUOTES, "UTF-8");
                //     $winratioblue   = htmlentities($winratioblue,  ENT_QUOTES, "UTF-8");
                //     $jogosred       = htmlentities($jogosred,  ENT_QUOTES, "UTF-8");
                //     $winratiored    = htmlentities($winratiored,  ENT_QUOTES, "UTF-8");
                //     $winratio       = htmlentities($winratio,  ENT_QUOTES, "UTF-8");
                //     $firsttorre     = htmlentities($firsttorre,  ENT_QUOTES, "UTF-8");
                //     $firsttorreblue = htmlentities($firsttorreblue,  ENT_QUOTES, "UTF-8");
                //     $firsttorrered  = htmlentities($firsttorrered,  ENT_QUOTES, "UTF-8");
                //     $fb             = htmlentities($fb,  ENT_QUOTES, "UTF-8");
    
                    $format_duracao = number_format($registro['duracao'], 0);
                    $format_duracao = htmlentities($format_duracao,  ENT_QUOTES, "UTF-8");
                    $format_winratioblue = number_format($registro['wblue'], 2, '.', '.');
                    $format_winratioblue = htmlentities($format_winratioblue,  ENT_QUOTES, "UTF-8");
                    $format_winratiored = number_format($registro['gred'], 2, '.', '.');
                    $format_winratiored = htmlentities($format_winratiored,  ENT_QUOTES, "UTF-8");
                    $format_winratio = number_format($registro['wr'], 2, '.', '.');
                    $format_winratio = htmlentities($format_winratio,  ENT_QUOTES, "UTF-8");
                    $format_firsttorre = number_format($registro['ft'], 2, '.', '.');
                    $format_firsttorre = htmlentities($format_firsttorre,  ENT_QUOTES, "UTF-8");
                    $format_firsttorreblue = number_format($registro['ftblue'], 2, '.', '.');
                    $format_firsttorreblue = htmlentities($format_firsttorreblue,  ENT_QUOTES, "UTF-8");
                    $format_firsttorrered = number_format($registro['ftred'], 2, '.', '.');
                    $format_firsttorrered = htmlentities($format_firsttorrered,  ENT_QUOTES, "UTF-8");
                    $format_fb = number_format($registro['fb'], 2, '.', '.');
                    $format_fb = htmlentities($format_fb,  ENT_QUOTES, "UTF-8");
    
                // echo json_encode($team);
    
                print "<tr>
                               <td><a href='../times/$registro[teamname].php'> $registro[teamname]</td> 
                               <td> $registro[game]</td>
                               <td> $format_duracao Minutos</td>
                               <td> $registro[gblue]</td>
                               <td> $format_winratioblue</td>
                               <td> $registro[gred]</td>
                               <td> $registro[wred]</td>
                               <td> $format_winratio</td>
                               <td> $format_firsttorre</td>
                               <td> $format_firsttorreblue</td>
                               <td> $format_firsttorrered</td>
                               <td> $format_fb</td>
                               </td>";
            }
    
            return;
        }

        public function getSearchTeams2()
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();

            $pesquisar = $_POST['pesquisar'];

            $sql = "SELECT teamname, count(teamname), sum(duracaogame) / count(teamname) / 60, Sum(side='Blue'), sum(result=1 and side='Blue') / sum(side='blue') * 100,  Sum(side='Red'), sum(result=1 and side='red') / sum(side='red') * 100, SUM(result=1) / count(teamname) * 100, sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(firstblood) / count(teamname) * 100 from `cblol` where teamname like '%$pesquisar%'
            and split in (select split from `cblol` where split = 'split 2')
            and position in (select position from `cblol` where position = 'team')
            GROUP BY teamname;";
            $code = $conn->prepare($sql, array());
            $code->execute(); 
            
            while ($registro = $code->fetch()) 
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
        }

        public function getSearchTeams1()
        {
            require_once('connection.php');
            $conn = Database::connectionPDO();

           $pesquisar = $_POST['pesquisar'];

           $sql = "SELECT teamname, count(teamname), sum(duracaogame) / count(teamname) / 60, Sum(side='Blue'), sum(result=1 and side='Blue') / sum(side='blue') * 100,  Sum(side='Red'), sum(result=1 and side='red') / sum(side='red') * 100, SUM(result=1) / count(teamname) * 100, sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(firstblood) / count(teamname) * 100 from `cblol` where teamname like '%$pesquisar%'
           and split in (select split from `cblol` where split = 'split 1')
           and position in (select position from `cblol` where position = 'team')
           GROUP BY teamname;";
           $code = $conn->prepare($sql, array());
           $code->execute(); 
           
           while ($registro = $code->fetch()) 
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
        }
        
    }
    
?>