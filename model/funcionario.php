<?php
  require_once 'conexao.php';

  class Funcionario{
    private $conn;

    public function __construct()
    {
      $dataBase = new dataBase();
      $db = $dataBase->dbConnecction();

      $this->conn = $db;
    }

    public function validar($login, $senha){

      try{
        $sql = "Select * from funcionario where login= :login and senha = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
  
        if($stmt->rowCount() > 0){
          return true;
        }
        else{
          return false;
        }
      }
      catch(PDOException $e){
        echo("ERROR: ".$e->getMessage());
      }
      finally{
        $this->conn=null;
      }
      
    }

    public function runQuery($sql){
      $stmt = $this->conn->prepare($sql);
      return $stmt;
    }

    public function redirect($url){
      header("Location: $url");
    }
  }
?>