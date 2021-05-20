<?php

  require_once'./model/funcionario.php';
  $objFunc = new Funcionario;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PW Gamer | A sua loja Gamer 24h</title>
  <!--File CSS-->
  <link rel="stylesheet" href="./_css/style-login-ADM.css">
  <!-- Bootstrap CSS -->

   <!--Icon-->
   <link rel="shortcut icon" href="./_conteúdos/_imagens/-2PLwAS8j6Eu2oXNHv_BVmyZTWVhvnNPcCYAr9JnzD0.png" type="image/x-icon">

   <!--Icons Fontawsome-->
   <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>

   <!-- PHP-->

</head>
<body>
  <div class="container" id="edicaoFunc">
    <div class="forms-container">
    <?php
          $query = "select * from funcionario";
          $stmt = $objFunc->runQuery($query);
          $stmt->execute();
          while($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
      <div class="signin-signup">
        <form action="./control/ctr-funcionario.php" class="sign-in-form" method="POST">
          <input type="hidden" name="editar" id="recipient-id">
          <h2 class="title">Editar</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="nome" name="txtNome" value="<?php echo($objFunc['nome'])?>"id="recipient-nome"required>
          </div>
          <div class="input-field">
            <i class="fas fa-hashtag"></i>
            <input type="text" placeholder="cpf" name="txtCPF" value="<?php echo($objFunc['cpf'])?>"id="recipient-cpf"required>
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Login" name="txtLogin" value="<?php echo($objFunc['login'])?>" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Senha" name="txtSenha" value="<?php echo($objFunc['senha'])?>"required>
          </div>
          <input type="submit" value="Alterar" class="btn solid">

          
        </form>
        
      </div>
      <?php } ?>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
        <h3>ACESSO RESTRITO</h3>

        <!--<img src="./_conteúdos/_imagens/-2PLwAS8j6Eu2oXNHv_BVmyZTWVhvnNPcCYAr9JnzD0.png" alt="" class="image">-->
        </div>
      </div>
    </div>
    
  </div>
  <script src="./_js/edição.js"></script>
</body>
</html>