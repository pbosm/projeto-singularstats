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
            require_once('connection.php');
            $conn = Database::connectionPDO();

            $sql = "SELECT teamname, count(teamname), sum(duracaogame) / count(teamname) / 60, Sum(side='Blue'), sum(result=1 and side='Blue') / sum(side='blue') * 100,  Sum(side='Red'), sum(result=1 and side='red') / sum(side='red') * 100, SUM(result=1) / count(teamname) * 100, sum(firsttower) / count(teamname) * 100, sum(firsttower=1 and side='Blue') / sum(side='blue') * 100, sum(firsttower=1 and side='red') / sum(side='red') * 100, sum(firstblood) / count(teamname) * 100 from `cblol`
            where position in (select position from `cblol` where position = 'team')
            and split in (select split from `cblol` where split = 'split 1')";
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