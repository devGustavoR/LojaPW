<?php
  include_once 'conexao.php';

  class Cliente{
    private $conn;

    public function __construct()
    {
      $dataBase = new dataBase();
      $db = $dataBase->dbConnecction();

      $this->conn = $db;
    }
    public function inserir($nome, $cpf,$login, $senha){
      try{
        $sql = "INSERT INTO cliente(nome, cpf,login, senha)
        VALUE(:nome, :cpf, :login, :senha)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":senha", $senha);

        $stmt->execute();

        return $stmt;
      }
      catch(PDOException $e){
        echo("Error:" .$e->getMessage());
      }
      finally{  
        $this->conn = null;
      }
    }

    public function validar($login, $senha){

      try{
        $sql = "SELECT * from cliente where login= :login and senha = :senha";
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

    public function editar($nome, $cpf, $login, $senha, $id){
      try{
        $sql = "UPDATE cliente SET nome = :nome, cpf= :cpf, 
        login= :login, senha= :senha WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt;
      }
      catch(PDOException $e){
        echo("ERROR: ".$e->getMessage());
      }
      finally{
        $this->conn=null;
      }
    }

    public function deletar($id){
      try{
        $sql = "DELETE FROM cliente WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt;
      }
      catch(PDOException $e){
        echo("ERROR: " .$e->getMessage());
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