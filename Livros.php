<?php
session_start();
include_once "Conexao.php";
$con = new Conexao();


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

$sql = "SELECT * from livros ORDER BY id";
$row = $con->executar($sql);

?>

<html>
<head>
<link rel="stylesheet" href="estilos.css">
<link rel="stylesheet" href="estilos2.css">

</head>
<body style="background-color: rgb(0, 132, 255);">

<div class="hello" ><h1><?php echo "Bem-vindo " . $Usuario; ?></h1></div>

<div class="sidebar" >
  <a href="index.php">Destaques</a>
  <a href="MeusDados.php">Meus Dados</a>
  <a href="MeusLivros.php">Meus Livros</a>
  <a href="Alunos.php">Alunos</a>
  <a class="active" href="Livros.php">Livros</a>

 
     <form method="post" action="logout.php" style="width: 200px; height: 40px;" >
     <input class="SAIR" type="submit" name="logout" value="SAIR"> 
     </form>


</div>


<div class="TabelaExibeLivros" style="max-width: 600px; top: 57%; left: 50%; transform: translate(-50%, -50%); position: relative;">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Autor</th>
      <th scope="col">status</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      foreach ($row as $v) {
      ?>

    </tr>
    <?php
        echo "<td>" . $v["id"] . "</td>";
        echo "<td>" . $v["nome"] . "</td>";
        echo "<td>" . $v["autor"] . "</td>";
        echo "<td>" . $v["status"] . "</td>";
        echo "<td>"?> <button ><a href="ProcessaPegarLivro.php?id=<?php echo$v["id"]; ?>">PEGAR</a></button> <?php "</td>";
      }                
    ?>
  </tbody>
</table>
</div>

<?php
if(isset($_GET["erro"]) && $_GET["erro"]==1) 
{?>    <div style="background-color: red; max-width: 600px; width: 600px; top: 16%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">O LIVRO ESTÁ INDISPONÍVEL</div><?php
}?>

<?php
if(isset($_GET["erro"]) && $_GET["erro"]==2) 
{?>    <div style="background-color: red; max-width: 600px; width: 600px; top: 16%; left: 50%; transform: translate(-50%, -50%); position: absolute; text-align: center;">VOCÊ SÓ PODE PEGAR 1 LIVRO !</div><?php
}?>

</body>    
</body>
</html>


