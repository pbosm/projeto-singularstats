<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Integração de banco de dados no PHP </title> 
  <link rel="stylesheet" href="formata-cadastro-time.css">

</head> 

<body>
 <h1> Dados do time </h1>

 <form action="cadastro-time-1.php" method="post">
    <fieldset>
        <legend> Dados dos time </legend>

        <label class="alinha"> Qual é o nome do time? </label>
        <input type="text" name="time" autofocus placeholder="Nome do time..."> <br>

        <label class="alinha"> Quantos jogos o time tem no total? </label>
        <input type="number" name="jogos_total" min="0"> <br>

        <label class="alinha"> Quantos jogos o time tem na BLUE SIDE? </label>
        <input type="number" name="jogos_blueside" min="0"> <br>

        <label class="alinha"> Pegou quantos 1* torre BLUE SIDE? </label>
        <input type="number" name="pegou_blueside" min="0"> <br>

        <label class="alinha"> Quantos jogos o time tem na RED SIDE? </label>
        <input type="number" name="jogos_redside" min="0"> <br>

        <label class="alinha"> Pegou quantos 1* torre RED SIDE? </label>
        <input type="number" name="pegou_redside" min="0"> <br>

        <div>
            <button type="submit" name="cadastro"> Cadastrar dados do time </button>
        </div>
        
    </fieldset>
    
    </form>

</body> 
</html>