<?php
  require_once '../model/produto.php';
  $objFunc = new Produto();

  if(isset($_POST['insert'])){
    $produto = $_POST['txtProduto'];
    $descricao = $_POST['txtDesc'];
    $valor = $_POST['txtValor'];

    if($objFunc->inserir($produto, $descricao, $valor )){
      $objFunc->redirect('../produtos-site.php');
    }
  }

  if(isset($_POST['editar'])){
    $id = $_POST['editar'];
    $produto = $_POST['txtProduto'];
    $descricao = $_POST['txtDesc'];
    $valor = $_POST['txtValor'];
    $quantidade = $_POST['txtQuanti'];

    if($objFunc->editar($produto, $descricao, $valor, $quantidade,$id)){
      $objFunc->redirect("../produtos-site.php");
    }
  }

  if(isset($_POST['deletar'])){
    $id = $_POST['deletar'];
    if($objFunc->deletar($id)){
      $objFunc->redirect("../produtos-site.php");
    }
  }

?>