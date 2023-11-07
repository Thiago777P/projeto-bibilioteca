<?php
session_start();



if (isset($_POST['logout'])) {
    // O botão de logout foi clicado, destrua a sessão
    session_destroy();
    header('Location: Login.php');
    exit();
}



// Verifique se a sessão está iniciada e se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) 
{
    $Usuario = $_SESSION['nome']; 
}
else 
{
 // O usuário não está logado, redirecione para a página de login com erro=2
header('Location: Login.php?erro=2');
exit();
}

?>

<html>
<head>
<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" href="estilos2.css">
</head>
<body style="background-color: rgb(0, 132, 255);">

<div class="hello"><h1><?php echo "Bem-vindo " . $Usuario; ?></h1></div>

<div class="sidebar">
  <a href="index.php">Destaques</a>
  <a class="active" href="MeusDados.php">Meus Dados</a>
  <a href="MeusLivros.php">Meus Livros</a>
  <a href="Alunos.php">Alunos</a>
  <a href="Livros.php">Livros</a>
     <form method="post" action="logout.php" style="width: 200px; height: 40px;" >
     <input class="SAIR" type="submit" name="logout" value="SAIR"> 
     </form>
</div>
<body>
    <div class="container">

        <?php

        include_once "Conexao.php";

        $conn = new Conexao();
        
        $row = $conn->executar("select * from aluno where Nome = '$Usuario'");
        ?>
<br>
<br>
<br>
<br>
<div class="TabelaExibeLivros" style="max-width: 770px; top: 50%; left: 50%; transform: translate(-50%, -50%); position:absolute;">

        <table class="table">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">EMAIL</th>
                <th scope="col">CPF</th>
                <th scope="col">SENHA</th>
                <th scope="col">MATRÍCULA</th>
                <th scope="col">Editar</th>
            </tr>
            <?php
            foreach ($row as $v) {
            ?>
                <tr>
                    <?php
                    echo "<td>" . $v["Nome"] . "</td>";
                    echo "<td>" . $v["Email"] . "</td>";
                    echo "<td>" . $v["Cpf"] . "</td>";
                    echo "<td>" . $v["Senha"] . "</td>";
                    echo "<td>" . $v["matricula"] . "</td>";
                    
                    ?>
                    <td><a href="Atualizar.php?id=<?= $v["Cpf"]?>"class="btn btn-primary">Editar</a></td>
                    <td>
                    <form method="post" action="ProcessaAtualizar.php">
                        <input type="hidden" name="Cpf" value="<?= $v['Cpf']?>"/>
                        <input type="hidden" name="acao" value="3"/>
                    </form>

                    </td>
                </tr>
            <?php


            }
            ?>
        </table>
</div>
        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 1) {
            ?>
                <div class="alert alert-success" role="alert">
                    Alterado com sucesso!
                </div>
            <?php
            }else if (isset($_GET['acao']) && $_GET['acao'] == 2) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Alterado com sucesso!
                    </div>
        <?php
        }
        ?>
    
    
</body>

</html>

</body>    
</body>
</html>

</body>    
</body>
</html>
