<html>
    <head>
    <link rel="stylesheet" href="estiloslogin.css">
    </head>
    <body>


<div style="text-align: center;" >
<?php

if (isset($_GET["erro"]) && $_GET["erro"] == 1) { 
    echo '<div style="background-color: red; max-width: 420px; width: 600px; top: 10%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">EMAIL INVÁLIDO</div>';
} elseif (isset($_GET["erro"]) && $_GET["erro"] == 2) { 
    echo '<div style="background-color: red; max-width: 420px; width: 600px; top: 10%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">A SENHA DEVE TER PELO MENOS 8 CARACTERES</div>';
} elseif (isset($_GET["erro"]) && $_GET["erro"] == 3) { 
    echo '<div style="background-color: red; max-width: 420px; width: 600px; top: 10%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">O EMAIL JÁ ESTÁ EM USO</div>';
} elseif (isset($_GET["erro"]) && $_GET["erro"] == 4) { 
    echo '<div style="background-color: red; max-width: 420px; width: 600px; top: 10%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">O CPF JÁ ESTÁ EM USO</div>';
}
?>
</div>

<div class="page">
    <form action="ProcessaCadastro.php" method="post" class="formLogin">
       <h1>Página de cadastro</h1> 
<label for="Nome">Nome :</label>
<input type="text" name="Nome"><br>
<label for="Email">Email :</label>
<input type="text" name="Email"><br>
<label for="Cpf">CPF :</label>
<input type="text" name="Cpf"><br>
<label for="Senha">Senha :</label>
<input type="password" name="Pass"><br>
<a href="Login.php">Clique aqui se já possui uma conta</a>
<input type="submit" value="Cadastrar" class="btn" /><br>
</div>





       </form>
    </body>
</html>