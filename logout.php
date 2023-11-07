<?php

    session_start();  //é preciso abrir uma sessao para poder destruila

    session_destroy();  // Destrua a sessão para fazer o logout
 
    header('Location: Login.php'); // Redirecione o usuário para a página de login ou outra página após o logout
exit();

?>