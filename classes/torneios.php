<?php

    class Torneios {

        public function getTournamentSplit1() 
        {
            require_once('../connection.php');
            $conn = Database::connectionPDO();

            $sql = "SELECT league, split, sum(result=1) 'jogos', sum(duracaogame) / 2 / sum(result=1) / 60 'Duração game', sum(teamkills) / sum(result=1) 'Media de kill', sum(result=1 and side='blue') / sum(result=1) * 100'WinratioBlueside', sum(result=1 and side='red') / sum(result=1) * 100 'WinratioRedside', sum(dragons) / sum(result=1), sum(barons) / sum(result=1) FROM  `lck`
            where league in (SELECT league FROM `lck` WHERE league = 'lck') 
            and split in (select split from `lck` where split = 'Spring')
            and position in (select position from `lck` where position = 'team')
            
            
            union 
            SELECT league, split, sum(result=1) 'jogos', sum(duracaogame) / 2 / sum(result=1) / 60 'Duração game', sum(teamkills) / sum(result=1) 'Media de kill', sum(result=1 and side='blue') / sum(result=1) * 100 'WinratioBlueside', sum(result=1 and side='red') / sum(result=1) * 100 'WinratioRedside', sum(dragons) / sum(result=1), sum(barons) / sum(result=1) FROM `cblol`
            where league in (SELECT league FROM `cblol` WHERE league = 'cblol') 
            and split in (select split from `cblol` where split = 'split 1')
            and position in (select position from `cblol` where position = 'team')
            
            union
            SELECT league, split, sum(result=1) 'jogos', sum(duracaogame) / 2 / sum(result=1) / 60 'Duração game', sum(teamkills) / sum(result=1) 'Media de kill', sum(result=1 and side='blue') / sum(result=1) * 100'WinratioBlueside', sum(result=1 and side='red') / sum(result=1) * 100 'WinratioRedside', sum(dragons) / sum(result=1), sum(barons) / sum(result=1) FROM `lpl`
            where league in (SELECT league FROM `lpl` WHERE league = 'lpl') 
            and split in (select split from `lpl` where split = 'spring')
            and position in (select position from `lpl` where position = 'team')
            order by league";
            $code = $conn->prepare($sql, array());
            $code->execute(); 
            
            while ($registro = $code->fetch()) 
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

            return;
        }
        
        public function getTournamentSplit2()
        {
            require_once('../connection.php');
            $conn = Database::connectionPDO();
            
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
            $code = $conn->prepare($sql, array());
            $code->execute(); 

            while ($registro = $code->fetch()) 
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

            return;
        }

}

?>