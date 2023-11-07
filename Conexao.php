<?php
Class Conexao{

private $host = "localhost";
private $port = "3306";
private $dbname = "bibliotecax";
private $user = "root";
private $pass = "";

private $pdo = null;
   function __construct()
   {
      try {
        
         $this->pdo = new PDO(
            "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";port=" . $this->port,
            $this->user,
            $this->pass
         );
       
      } catch (Exception $e) {
         echo "Erro ao conectar ao banco de dados! ";
      }
   }

   public function executar($sql){
      $stmt =$this->pdo->prepare($sql);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;

   }

}

?>