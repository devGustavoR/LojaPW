<?php
  include_once 'conexao.php';

  class Produto{
    private $conn;

    public function __construct()
    {
      $dataBase = new dataBase();
      $db = $dataBase->dbConnecction();

      $this->conn = $db;
    }
    public function inserir($produto, $descricao, $valor){
      try{
        $sql = "INSERT INTO produto(produto, descricao, valor)
        VALUE(:produto, :descricao, :valor)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":produto", $produto);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":valor", $valor);

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

    public function editar($produto, $descricao, $valor, $id){
      try{
        $sql = "UPDATE produto SET produto = :produto, descricao = :descricao, valor= :valor, 
         WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":produto", $produto);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":valor", $valor);
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
        $sql = "DELETE FROM produto WHERE id = :id";

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