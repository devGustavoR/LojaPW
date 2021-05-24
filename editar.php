<?php

  require_once './model/funcionario.php';
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
  <link rel="stylesheet" href="./_css/style.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!--Icon-->
   <link rel="shortcut icon" href="./_conteúdos/_imagens/-2PLwAS8j6Eu2oXNHv_BVmyZTWVhvnNPcCYAr9JnzD0.png" type="image/x-icon">
</head>
<body>
<!-- Lista dos funcionario-->
<div class="centralizar">
  <div class="lista">
   <br>
   <h3>Área de edição de perfil</h3>
   <table class="content-tabela">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Editar</th>
        </tr>
      </thead>

      <tbody class="dados">
        <?php
          $query = "SELECT * from funcionario";
          $stmt = $objFunc->runQuery($query);
          $stmt->execute();
          while($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
              <td><?php echo($objFunc['id'])?></td>
              <td><?php echo($objFunc['nome'])?></td>
              <td><?php echo($objFunc['cpf'])?></td>
              <td>
                <button class="btn btn-sucess"
                data-toggle="modal" data-target="#ModalEditar"
                data-id="<?php echo ($objFunc['id']);?>"
                data-nome="<?php echo($objFunc['nome']);?>"
                data-cpf="<?php echo($objFunc['cpf']);?>"
                data-login="<?php echo($objFunc['login']);?>"
                data-senha="<?php echo($objFunc['senha']);?>"
                id="edicaoFunc">Editar</button>
              </td>  
            </tr>
        <?php } ?>
      </tbody>
   </table>
  </div>
 </div>
<!-- The Modal -->
<div class="modal" id="ModalEditar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="control/ctr-funcionario.php" method="POST">
       <input type="hidden" name="editar" id="recipient-id">
      <div class="form-group">
       <label for="">Nome</label>
        <input type="text" class="form-control" name="txtNome" id="recipient-nome" required>
       </div>
       <div class="form-group">
       <label for="">CPF</label>
       <input type="text" class="form-control" name="txtCPF" id="recipient-cpf" required>
       </div>
       <div class="form-group">
        <label for="">Login</label>
       <input type="text" class="form-control" name="txtLogin" id="recipient-login" required>
      </div>
      <div class="form-group">
      <label for="">Senha</label>
      <input type="text" class="form-control" name="txtSenha" id="recipient-senha" required>
       </div>
       <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
        $('#ModalEditar').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget)
            var recipientId = button.data('id')
            var recipientNome = button.data('nome')
            var recipientCpf = button.data('cpf')
            var recipientLogin = button.data('login')
            var recipientSenha = button.data('senha')

            var modal = $(this)
            modal.find('#recipient-id').val(recipientId)
            modal.find('#recipient-nome').val(recipientNome)
            modal.find('#recipient-cpf').val(recipientCpf)
            modal.find('#recipient-login').val(recipientLogin)
            modal.find('#recipient-senha').val(recipientSenha)
        })
    </script>
</body>
</html>

