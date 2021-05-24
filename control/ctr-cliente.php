<?php
  require_once '../model/cliente.php';
  $objFunc = new Cliente();

  if(isset($_POST['validar'])){
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if($objFunc->validar($login, $senha)){
      $objFunc->redirect('../cliente-site.php');
    }else{
      $objFunc->redirect('../index.html');
    }
  }

  if(isset($_POST['insert'])){
    $nome = $_POST['txtNome'];
    $cpf = $_POST['txtCPF'];
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if($objFunc->inserir($nome, $cpf, $login, $senha)){
      $objFunc->redirect('../cliente-site.php');
    }
  }

  if(isset($_POST['editar'])){
    $id = $_POST['editar'];
    $nome = $_POST['txtNome'];
    $cpf = $_POST['txtCPF'];
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if($objFunc->editar($nome,$cpf,$login,$senha,$id)){
      $objFunc->redirect("../cliente-site.php");
    }
  }

  if(isset($_POST['deletar'])){
    $id = $_POST['deletar'];
    if($objFunc->deletar($id)){
      $objFunc->redirect("../cliente-site.php");
    }
  }

?>