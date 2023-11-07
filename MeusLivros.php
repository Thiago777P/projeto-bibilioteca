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
    $Matricula = $_SESSION['matricula'];

    $sql = "SELECT emprestimo FROM aluno where matricula = $Matricula ";
    $resultadoEmprestimo = $con->executar($sql);
    $Emprestimo = $resultadoEmprestimo[0]['emprestimo'];
}
else 
{
 // O usuário não está logado, redirecione para a página de login com erro=2
header('Location: Login.php?erro=2');
exit();
}

if(!empty($Emprestimo))
{
$sql = "SELECT * from livros where id = $Emprestimo";
$row = $con->executar($sql);
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
  <a href="MeusDados.php">Meus Dados</a>
  <a class="active" href="MeusLivros.php">Meus Livros</a>
  <a href="Alunos.php">Alunos</a>
  <a href="Livros.php">Livros</a>
     <form method="post" action="logout.php" style="width: 200px; height: 40px;" >
     <input class="SAIR" type="submit" name="logout" value="SAIR"> 
     </form>
</div>

<?php
if (empty($Emprestimo))
{
    ?>
    <div class="TabelaExibeLivros" style="max-width: 600px; top: 50%; left: 50%; transform: translate(-50%, -50%); position: absolute;">
<table class="table">
  <thead>
    <tr>
      <th style="text-align: center;"> VOCÊ NÃO PEGOU LIVROS</th>
    </tr>
  </thead>
</table>
</div>
<?php
}
else{
    ?>

<div class="TabelaExibeLivros" style="max-width: 600px; top: 50%; left: 50%; transform: translate(-50%, -50%); position: absolute;">
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
        echo "<td>"?> <button ><a href="ProcessaDevolverLivro.php">DEVOLVER</a></button> <?php "</td>";
      }                
    ?>
  </tbody>
</table>
</div>

</body>    
</body>
</html>

<?php
}
?>
