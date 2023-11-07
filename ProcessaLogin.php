<?php
$Email = $_POST["Emailx"];
$Senha = $_POST["Senhax"];
 
include_once "Conexao.php";
$con = new conexao();


$sql = "SELECT Email FROM aluno where Email = '$Email' and Senha = '$Senha'"; //consulta os dados no bd
$resultado = $con->executar($sql); // executa a instrucao sql


if(!empty($resultado)) //verifica se a consulta retornou algum resultado
{
    session_start();
    $sql = "SELECT Nome FROM aluno where Email = '$Email' and Senha = '$Senha'";
    $resultadoNome = $con->executar($sql);
    $_SESSION['nome'] = $resultadoNome[0]['Nome'];

    $sql = "SELECT matricula FROM aluno where Email = '$Email' and Senha = '$Senha'";
    $resultadoMatricula = $con->executar($sql);
    $_SESSION['matricula'] = $resultadoMatricula[0]['matricula'];

    $sql = "SELECT emprestimo FROM aluno where Email = '$Email' and Senha = '$Senha'";
    $resultadoEmprestimo = $con->executar($sql);
    $_SESSION['emprestimo'] = $resultadoEmprestimo[0]['emprestimo'];



    $_SESSION['logado'] = true; // variavel de sessao para saber se algum login foi realizado para utilizar a pagina index
    header("Location: index.php");
    
}
else
{
header("Location: Login.php?erro=1");
}

?>