<?php
include_once "Conexao.php";
$con = new Conexao();



$nome = (isset($_POST["Nome"])) ? $_POST["Nome"] : null;
$email = (isset($_POST["Email"])) ? $_POST["Email"] : null;
$cpf = (isset($_POST["Cpf"])) ? $_POST["Cpf"] : null;
$senha = (isset($_POST["Senha"])) ? $_POST["Senha"] : null;
$acao = (isset($_POST["acao"])) ? $_POST["acao"] : 1;

if (strlen($senha) < 8) {
    // Exibe uma mensagem de erro
    echo "A senha deve conter pelo menos 8 caracteres. <a href='javascript:history.back()'>Voltar</a>";
    exit(); // Encerra o script
}

if ($acao == 2) { // Somente para atualização (acao=2)
    $con = new Conexao();
    $sql = "SELECT Email FROM aluno WHERE Email = '$email' AND Cpf != $cpf";
    $rows = $con->executar($sql);

    if (sizeof($rows) > 0) {
        // O endereço de email já está em uso por outro usuário
        echo "O endereço de email '$email' já está em uso. <a href='javascript:history.back()'>Voltar</a>";
        exit(); // Encerra o script
    }
}

if ($acao == 1) { // insert
    $sql = "insert into aluno (Nome,Email,Cpf, Senha) values($nome,'$email','$cpf',$senha)";
} else if ($acao == 2) { // update
    $sql = "update aluno set Nome='$nome', Email = '$email', Senha = '$senha' where Cpf=$cpf";
} else if ($acao == 3){ // remover
    $sql = "delete from aluno where Cpf=$cpf";
}

$con->executar($sql);



header("location: MeusDados.php?acao=$acao");