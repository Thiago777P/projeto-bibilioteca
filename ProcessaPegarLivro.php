<?php
session_start();
include_once "Conexao.php";
$con = new Conexao();
$ID_LIVRO = $_GET["id"];



// Verifique se a sessão está iniciada e se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) 
{
    $Matricula = $_SESSION['matricula'];

    $sql = "SELECT emprestimo FROM aluno where matricula = $Matricula ";
    $resultadoEmprestimo = $con->executar($sql);
    $Emprestimo = $resultadoEmprestimo[0]['emprestimo'];

    $Usuario = $_SESSION['nome']; 
    $Matricula = $_SESSION['matricula'];

}
else 
{
 // O usuário não está logado, redirecione para a página de login com erro=2
header('Location: Login.php?erro=2');
exit();
}



$sql = "SELECT status FROM livros where id = $ID_LIVRO "; //consulta os dados no bd
$resultadoStatus = $con->executar($sql); // executa a instrucao sql
$statusLivro = $resultadoStatus[0]['status'];

if($statusLivro == "Indisponível")
{
    header("Location: Livros.php?erro=1");
}
else if(!empty($Emprestimo))
{
    header("Location: Livros.php?erro=2");

}
else
{
$sql = "UPDATE aluno SET emprestimo = $ID_LIVRO WHERE matricula = $Matricula";
$con->executar($sql);

$sql = "UPDATE livros SET status = 'Indisponível' WHERE id = $ID_LIVRO";
$con->executar($sql);

header("Location: MeusLivros.php");

}

?>