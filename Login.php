<html>
    <head>
    <link rel="stylesheet" href="estiloslogin.css">
    
    <body>
        <div class="page" >
        <form action="ProcessaLogin.php" method="post" class="formLogin">
        <h1>LOGIN</h1>
            <label for="EMAIL">EMAIL :</label>
            <input type="text" name="Emailx"><br>
            <label for="SENHA">SENHA :</label>
            <input type="password" name="Senhax"><br>
            <a href="Cadastro.php">Clique aqui se não possui uma conta?</a>
            <input type="submit" value="Acessar" class="btn" /><br>
          
        </form>
        </div>
<?php
if(isset($_GET["erro"]) && $_GET["erro"]==1)
{?>    <div style="background-color: red; max-width: 283px; width: 600px; top: 23%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">EMAIL OU SENHA INCORRETO(S)</div>
<?php
}
if(isset($_GET["erro"]) && $_GET["erro"]==2)
{?>   
 <div style="background-color: red; max-width: 283px; width: 600px; top: 23%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">Inicie uma sessão</div>
    <?php
}
?>


    </body>
</html>