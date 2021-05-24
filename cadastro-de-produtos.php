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
</head>
<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="./control/ctr-produto.php" class="sign-in-form" method="POST">
          <input type="hidden" name="insert">
          <h2 class="title">Cadastro de produtos</h2>
          <div class="input-field">
            <i class="fas fa-box"></i>
            <input type="text" placeholder="Nome do produto" name="txtProduto" required>
          </div>
          <div class="input-field">
            <i class="fas fa-hashtag"></i>
            <input type="text" placeholder="Descrição" name="txtDesc" required>
          </div>
          <div class="input-field">
            <i class="fas fa-hashtag"></i>
            <input type="text" placeholder="Valor" name="txtValor" required>
          </div>
          <input type="submit" value="Cadastro" class="btn solid">

          <p class="social-text">Gostaria de se conectar por alguma plataforma?</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
        <h3>Cadastro de produtos</h3>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
</html>