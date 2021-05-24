<?php

  require_once './model/cliente.php';
  $objFunc = new Cliente;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PW Gamer | A sua loja Gamer 24h</title>
  <!--File CSS-->
  <link rel="stylesheet" href="./_css/style-funcionario4.css">
  <!-- Bootstrap CSS -->
  
  <!--Icon-->
  <link rel="shortcut icon" href="./_conteúdos/_imagens/-2PLwAS8j6Eu2oXNHv_BVmyZTWVhvnNPcCYAr9JnzD0.png" type="image/x-icon">
</head>
<body>
  <!--PHP-->
  <!--Navegação-->
  <div class="container">
    <nav>
      <input type="checkbox" id="nav" class="hidden" />
      <label for="nav" class="nav-btn">
        <i></i>
        <i></i>
        <i></i>
      </label>
      <div class="logo">
        <div class="col"><a href="./index.html">PW</a></div>
      </div>
      <div class="nav-wrapper">
        <ul>
          <li><a href="./index.html">Página Inicial</a></li>
          <li><a href="./funcionario-site.php">Funcionario</a></li>
          <li><a href="./cliente-site.php">Cliente</a></li>
          <li><a href="./produtos-site.php">Produtos</a></li>
          <li><a href="./vendas-site.php">Vendas</a></li>
        </ul>
      </div>
    
    </nav>
  </div>
  <!--Fim da navegação-->
  <!--Linha branca-->
  <div class="row1">
  </div>
  <div class="row2">
    <div class="col">
    </div>
  </div>
  <!--Fim da linha branca-->
 <!-- Lista dos funcionario-->
 <div class="centralizar">
  <div class="lista">
   <br>
   <h3>Clientes</h3>
   <table class="content-tabela">
      <thead>
        <tr>
          <th colspan="5">
            <div class="botao">
              <a href="./cadastro-user.html" class="btn">Novo</a>
            </div>
          </th>
        </tr>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Editar</th>
          <th>Deletar</th>
        </tr>
      </thead>

      <tbody class="dados">
        <?php
          $query = "select * from cliente";
          $stmt = $objFunc->runQuery($query);
          $stmt->execute();
          while($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
              <td><?php echo($objFunc['id'])?></td>
              <td><?php echo($objFunc['nome'])?></td>
              <td><?php echo($objFunc['cpf'])?></td>
              <td>
                <a href="./editar-cliente.php"
                class="btn" id="edicaoFunc">Editar</a>
              </td>
              <td>
                <a href="./editar-cliente.php" class="btn" id="edicaoFunc">Deletar</a>
                </td>
            </tr>
        <?php } ?>
      </tbody>
      
   </table>
  </div>
 </div>
  <script src="./_js/edição.js"></script>

</body>
</html>