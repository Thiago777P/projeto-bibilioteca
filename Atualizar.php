<html>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</header>

<?php
include_once "Conexao.php";
$nome="";
$email="";
$cpf="";
$senha="";
$id=null;
if(isset($_GET["id"])){
    $con = new Conexao();
    $id =$_GET["id"];
    $sql="select Nome,Email,Cpf, Senha from aluno where Cpf=".$id;
    $rows = $con->executar($sql);

    if(sizeof($rows)>0){
        $nome = $rows[0]["Nome"];
        $email = $rows[0]["Email"];
        $cpf = $rows[0]["Cpf"];
        $senha = $rows[0]["Senha"];
    }

if($id!=null)
{
    //acao verdadeira
}else{
    //acao falsa
}
}
 
?>



<body>
    <div class="container">
        <div style="text-align: center;">
            <h1>Editar Dados</h1>
        </div>
        <a href="MeusDados.php" class="btn btn-primary" style="margin-bottom: 5px;">Voltar</a>
        <form action="ProcessaAtualizar.php" method="POST">
            <div class="row">
                </div>
                <div class="col-5">
                    <label class="form-label">Nome:</label>
                    <input class="form-control" <?= ($id!=null)?"readonly":""  ?>  value="<?= $nome?>" name="Nome" type="text" />

                </div>
                <div class="col-5">
                    <label class="form-label">Email:</label>
                    <input class="form-control" value="<?= $email?>" name="Email" type="email" />
                </div>
                <div class="col-2">
                    <label class="form-label">Cpf:</label>
                    <input class="form-control" <?= ($id!=null)?"readonly":""  ?> value="<?= $cpf?>" name="Cpf" type="text" />

                </div>
                    <div class="col-5">
                    <label class="form-label">Senha:</label>
                    <input class="form-control" value="<?= $senha?>" name="Senha" type="password" />

                </div>
            </div>
            <div class="row">
                <div class="col-12" style="text-align: center;margin-top: 5px;">
                    <button  class="btn btn-primary">Salvar</button>
                </div>
            </div>
            <?php 
                if($id!=null){
            ?>
            <input type="hidden" name="acao" value="2"/>
            <?php
                }
            ?>

           
 

    
        </form>
    </div>
</body>

</html>