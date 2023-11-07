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
}
else 
{
 // O usuário não está logado, redirecione para a página de login com erro=2
header('Location: Login.php?erro=2');
exit();
}


$sql = "SELECT status FROM livros"; //consulta os dados no bd
$resultado = $con->executar($sql); // executa a instrucao sql

$VetorStatus = array();

// Itera pelos resultados da consulta e armazena os valores no array
foreach ($resultado as $row) {
    $VetorStatus[] = $row['status'];
}




?>


<html>
<head>
<link rel="stylesheet" href="estilos.css">
</head>
<body style="background-color: rgb(0, 132, 255);">

<div class="hello" ><h1><?php echo "Bem-vindo " . $Usuario ; ?></h1></div>

<div class="sidebar">
  <a class="active" href="index.php">Destaques</a>
  <a href="MeusDados.php">Meus Dados</a>
  <a href="MeusLivros.php">Meus Livros</a>
  <a href="Alunos.php">Alunos</a>
  <a href="Livros.php">Livros</a>

 
     <form method="post" action="logout.php" style="width: 200px; height: 40px;" >
     <input class="SAIR" type="submit" name="logout" value="SAIR"> 
     </form>


</div>




<br>

  <div class="slideshow-container" style="width: 380px;">

<div class="mySlides fade">
  <div class="numbertext">1 / 10</div>
  <img src="imagens/dom-quixote.png" style="width:100%">
  <div class="text" ><?php echo $VetorStatus[0]?></div>
  
</div>



<div class="mySlides fade">
  <div class="numbertext">2 / 10</div>
  <img src="imagens/um-conto-de-duas-cidades-.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[1]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 10</div>
  <img src="imagens/o-senhor-dos-aneis-.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[2]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 10</div>
  <img src="imagens/o-pequeno-principe.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[3]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 10</div>
  <img src="imagens/harry-potter-e-a-pedra-filosofa.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[4]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">6 / 10</div>
  <img src="imagens/e-nao-sobrou-nenhum.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[5]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">7 / 10</div>
  <img src="imagens/o-sonho-da-camara-vermelha.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[6]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">8 / 10</div>
  <img src="imagens/ela-a-feiticeira.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[7]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">9 / 10</div>
  <img src="imagens/o-leao-a-feiticeira-e-o-guarda-roupa.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[8]?></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">10 / 10</div>
  <img src="imagens/o-codigo-da-vinci.png" style="width:100%">
  <div class="text"><?php echo $VetorStatus[9]?></div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center;">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
  <span class="dot" onclick="currentSlide(6)"></span>
  <span class="dot" onclick="currentSlide(7)"></span>
  <span class="dot" onclick="currentSlide(8)"></span>
  <span class="dot" onclick="currentSlide(9)"></span>
  <span class="dot" onclick="currentSlide(10)"></span>
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}




</script>



  </body>    
</body>
</html>
