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


}
else 
{
 // O usuário não está logado, redirecione para a página de login com erro=2
header('Location: Login.php?erro=2');
exit();
}

$sql = "UPDATE livros SET status = 'Disponível' where id = $Emprestimo ";
$con->executar($sql);
$sql = "UPDATE aluno SET emprestimo = null where matricula = $Matricula ";
$con->executar($sql);

header('Location: MeusLivros.php');



?>