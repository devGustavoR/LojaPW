<?php
  require_once '../model/funcionario.php';
  $objFunc = new Funcionario;

  if(isset($_POST['validar'])){
    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if($objFunc->validar($login, $senha)){
      $objFunc->redirect('../funcionario-site.php');
    }else{
      $objFunc->redirect('../index.html');
    }
  }


?>