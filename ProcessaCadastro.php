<html> 
    <head></head>
    <body>
        

<?php
include_once "Conexao.php";
$con = new Conexao();

$Nome = $_POST["Nome"];
$Email = $_POST["Email"];
$Senha = $_POST["Pass"];
$Cpf = $_POST["Cpf"];



//tratar problema caso o usuario tente clicar no botão de cadastrar sem nenhum campo inserido
if (empty($Nome) || empty($Email) || empty($Senha) || empty($Cpf)) {
    
    header("Location: Cadastro.php");
} else {

}

//tratar problema caso o usuario tente cadastrar um email ja existente
$sqlCheckEmail = "SELECT COUNT(*) AS count FROM aluno WHERE Email = '$Email'";
$resultEmail = $con->executar($sqlCheckEmail);

//tratar problema caso o usuario tente cadastrar um cpf ja existente
$sqlCheckCpf = "SELECT COUNT(*) AS count FROM aluno WHERE Cpf = $Cpf";
$resultCpf = $con->executar($sqlCheckCpf);

if ($resultEmail[0]['count'] > 0) {
    // O email já existe no banco de dados
    header("Location: Cadastro.php?erro=3");
} elseif ($resultCpf[0]['count'] > 0) {
    // O CPF já existe no banco de dados
    header("Location: Cadastro.php?erro=4");
} elseif (strpos($Email, "@") === false) {
    //email esteja faltando o @
    header("Location: Cadastro.php?erro=1");
} elseif (strlen($Senha) < 8) {
    //senha com menos de 8 caracteres
    header("Location: Cadastro.php?erro=2");
} else {
    echo "Cadastro realizado com sucesso<br>";
    ?><button><a href="Login.php">-------FAZER LOGIN-------</a></button><?php
    $sql = "insert into aluno (Nome, Email, Cpf, Senha) values('$Nome', '$Email', $Cpf, '$Senha')";
    $con->executar($sql);
}
?>
    </body>
</html>