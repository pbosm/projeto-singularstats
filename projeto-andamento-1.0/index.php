<?php
  $conn = mysqli_connect('localhost','root','', 'beise2');
  
  $sql = "SELECT * FROM dados";
  $resultado = $conn->query($sql);
  
  while ($registro = $resultado->fetch_array()) 
  {
   //evitando que os dados do MySQL para nosso código em PHP seja quebrado por um cracker da vida, conhecido como XSS.
   $time               =  $registro[0];
   $jogos_total        =  $registro[1];
   $jogos_blueside     =  $registro[2];
   $pegou_blueside     =  $registro[3];
   $jogos_redside      =  $registro[4];
   $pegou_redside      =  $registro[5];
  
   $mediaBlue = ($registro[3] * 100 / $registro[2]);
   $mediaRed  =  ($registro[5] * 100 / $registro[4]);
  
   $time           = htmlentities($time, ENT_QUOTES, "UTF-8");
   $jogos_total    = htmlentities($jogos_total,  ENT_QUOTES, "UTF-8");
   $jogos_blueside = htmlentities($jogos_blueside,  ENT_QUOTES, "UTF-8");
   $pegou_blueside = htmlentities($pegou_blueside,  ENT_QUOTES, "UTF-8");
   $jogos_redside  = htmlentities($jogos_redside,  ENT_QUOTES, "UTF-8");
   $pegou_redside  = htmlentities($pegou_redside,  ENT_QUOTES, "UTF-8");
   $mediaBlue      = htmlentities($mediaBlue,  ENT_QUOTES, "UTF-8");
   $mediaRed       = htmlentities($mediaRed,  ENT_QUOTES, "UTF-8");
   
  }

?>

<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Home </title> 
  <link rel="stylesheet" type="text/css" href="style.css">
</head> 

<div class="container">
  <div class="navigantion">
      <ul>
          <li>
              <a href="#"> <!--- colocar -->
                  <span class="icon"><ion-icon name="albums"></ion-icon></span>
                  <span class="title"> Nome criativo </span>
              </a>
          </li>
          <li>
              <a href="#"> <!--- colocar -->
                  <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                  <span class="title">Home</span>
              </a>
          </li>
          <li>
              <a href="#"> <!--- colocar -->
                  <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                  <span class="title">Usuário</span>
              </a>
          </li>
          <li>
              <a href="#"> <!--- colocar -->
                  <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                  <span class="title">Mensagem</span>
              </a>
          </li>
          <li> 
              <a href="#"> <!--- colocar -->
                  <span class="icon"><ion-icon name="help-outline"></ion-icon></span>
                  <span class="title">Ajuda</span>
              </a>
          </li>
      </ul>
   </div>
   
   <!-- main -->
   <div class="main">
       <div class="topbar">
           <div class="toggle">
              
           </div>
           <!-- search-->
           <div class="search">
              <label>
                  <input type="text" placeholder="Search Here" name="busca">                 
              </label>
           </div>
           <!-- userimg-->
           <!--<div class="user">
               <img src="./image/user.jpg">
           </div> -->
       </div>

       <!-- cards -->
       <div class="cardBox">
           <img src="./image/camille.png" alt="Imagem" title="Imagem">
       </div>

       <!-- order details list -->
       <div class="details">
           <div class="recentOrders">
               <div class="cardHeader">
                   <h2>Dados dos times registrados</h2>
                   <a href="#" class="btn">Ver todos</a>
               </div>
               <table >
                   <thead>
                       <tr>                          
                          <td>Time</td>
                          <td>Total jogos</td>
                          <td>Jogos blue side</td>
                          <td>Torres na blue side</td>
                          <td>Jogos red side</td>
                          <td>Torres na red side</td>
                          <td>Porcentagem de 1* torre Blue side</td>
                          <td>Porcentagem de 1* torre Red side</td>
                       </tr>                            
                   </thead>
                   <tbody >
                       <tr>     <?php
                                $conn = mysqli_connect('localhost','root','', 'beise2');

                                $sql = "SELECT * FROM dados";
                                $resultado = $conn->query($sql);
                                while ($registro = $resultado->fetch_array()) 
                                {                                   
                                    $time               =  $registro[0];
                                    $jogos_total        =  $registro[1];
                                    $jogos_blueside     =  $registro[2];
                                    $pegou_blueside     =  $registro[3];
                                    $jogos_redside      =  $registro[4];
                                    $pegou_redside      =  $registro[5];

                                    $mediaBlue = ($registro[3] * 100 / $registro[2]);
                                    $mediaRed =  ($registro[5] * 100 / $registro[4]);

                                    $time           = htmlentities($time, ENT_QUOTES, "UTF-8");
                                    $jogos_total    = htmlentities($jogos_total,  ENT_QUOTES, "UTF-8");
                                    $jogos_blueside = htmlentities($jogos_blueside,  ENT_QUOTES, "UTF-8");
                                    $pegou_blueside = htmlentities($pegou_blueside,  ENT_QUOTES, "UTF-8");
                                    $jogos_redside  = htmlentities($jogos_redside,  ENT_QUOTES, "UTF-8");
                                    $pegou_redside  = htmlentities($pegou_redside,  ENT_QUOTES, "UTF-8");
                                    $mediaBlue  = htmlentities($mediaBlue,  ENT_QUOTES, "UTF-8");
                                    $mediaRed  = htmlentities($mediaRed,  ENT_QUOTES, "UTF-8");


                                    echo "<tr>
                                                <td> $registro[0] </td> 
                                                <td> $registro[1] </td>
                                                <td> $registro[2] </td>
                                                <td> $registro[3] </td>
                                                <td> $registro[4] </td>
                                                <td> $registro[5] </td>
                                                <td> $mediaBlue % </td>
                                                <td> $mediaRed % </td>
                                                </td>";
                                }

                                echo "</table>";?>                      
                           <!--<td><span class="status delivered">Delivered</span></td> -->

           </div>


          </div>
   </div>
</div>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Desnecessário no momento;;;
    <script>
        //add menutoggle
        let toggle = document.querySelector('.toggle');
        //let navigantion = document.querySelector('.navigantion');
        let main = document.querySelector('.main');

        toggle.onclick = function()
        {
            navigantion.classList.toggle('active');
            main.classList.toggle('active');            
        }

        //add hovered valss in selected list item
        let list = document.querySelectorAll('.navigantion li');
        function activeLink()
        {
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>
    -->

</body>
</html>

