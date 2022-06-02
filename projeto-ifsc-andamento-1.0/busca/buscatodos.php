<?php
                                $pesquisar = $_POST['pesquisar'];
                                $conn = mysqli_connect('localhost','root','', 'beise2');
                                $sqltorneios = "SELECT team from dados UNION SELECT regiao from torneios like '%$pesquisar%'";
                                $result = $conn->query($sqltorneios);

                                $sql = "SELECT * FROM torneios";
                                $resultado = $conn->query($sql);
                                
                                while ($sqltorneios = mysqli_fetch_assoc($result) and $registro = $resultado->fetch_array())                                   
                                {               
                                    
                                    $time =  $sqltimes['team'];
                                    $regiao = $sqltorneios['regiao'];
    
                                    $regiao  = htmlentities($regiao, ENT_QUOTES, "UTF-8");
                                    $times   = htmlentities($times,  ENT_QUOTES, "UTF-8");
    
    
                                    echo "<tr>
                                            <td> $regiao </td> 
                                            <td> $time </td>
                                            </td>";
                                }
                                  
                                    echo "</table>"; ?>                       