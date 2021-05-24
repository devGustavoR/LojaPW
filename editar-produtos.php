<?php

  require_once './model/produto.php';
  $objFunc = new Produto;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PW Gamer | A sua loja Gamer 24h</title>
  <!--File CSS-->
  <link rel="stylesheet" href="./_css/style-editar.css">
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
   <h3>Área de edição e exclusão dos produtos</h3>
   <table class="content-tabela">
      <thead>
        <tr>
        <th>ID</th>
          <th>Produto</th>
          <th>Descrição</th>
          <th>Valor</th>
          <th>Editar</th>
          <th>Deletar</th>
        </tr>
      </thead>

      <tbody class="dados">
        <?php
          $query = "SELECT * from produto";
          $stmt = $objFunc->runQuery($query);
          $stmt->execute();
          while($objFunc = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
              <td><?php echo($objFunc['id'])?></td>
              <td><?php echo($objFunc['produto'])?></td>
              <td><?php echo($objFunc['descricao'])?></td>
              <td><?php echo($objFunc['valor'])?></td>
              <td>
                <button class="btn2 btn-sucess"
                data-toggle="modal" data-target="#ModalEditar"
                data-id="<?php echo ($objFunc['id']);?>"
                data-produto="<?php echo($objFunc['produto']);?>"
                data-descricao="<?php echo($objFunc['descricao']);?>"
                data-valor="<?php echo($objFunc['valor']);?>"
                id="edicaoFunc">Editar</button>
              </td> 
              <td>
                <button class="btn2 bnt-danger"
                data-toggle="modal" data-target="#ModalDeletar" 
                data-id="<?php echo ($objFunc['id']);?>"
                data-produto="<?php echo($objFunc['produto'])?>">
                  Deletar
                </button>
              </td> 
            </tr>
        <?php } ?>
      </tbody>
   </table>
  </div>
 </div>
<!-- The Modal Editar -->
<div class="modal" id="ModalEditar">
  <div class="modal-dialog">
    <div class="modal-content ">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="./control/ctr-produto.php" method="POST">
       <input type="hidden" name="editar" id="recipient-id">
      <div class="form-group">
       <label for="">Nome do Produto</label>
        <input type="text" class="form-control" name="txtProduto" id="recipient-produto" required>
       </div>
       <div class="form-group">
       <label for="">Descrição</label>
       <input type="text" class="form-control" name="txtDesc" id="recipient-desc" required>
       </div>
       <div class="form-group">
        <label for="">Valor</label>
       <input type="text" class="form-control" name="txtValor" id="recipient-valor" required>
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

<!-- The Modal Deletar -->
<div class="modal" id="ModalDeletar">
  <div class="modal-dialog">
    <div class="modal-content ">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deletar Funcionario</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="control/ctr-produto.php" method="POST">
       <input type="hidden" name="deletar" id="recipient-id">
      <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="txtProduto" id="recipient-produto" readonly>
       </div>
       <button type="submit" class="btn2 btn-primary">Deletar </button>
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
    var recipientProduto = button.data('produto')
    var recipientDesc = button.data('descricao')
    var recipientValor = button.data('valor')

    var modal = $(this)
    modal.find('#recipient-id').val(recipientId)
    modal.find('#recipient-produto').val(recipientProduto)
    modal.find('#recipient-desc').val(recipientDesc)
    modal.find('#recipient-valor').val(recipientValor)
})
</script>

<script>
  $("#ModalDeletar").on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var recipientId = button.data('id')
    var recipientProduto = button.data('produto') 
    
    var modal= $(this)
    modal.find('#recipient-id').val(recipientId)
    modal.find('#recipient-produto').val(recipientProduto)
  })
</script>
</body>
</html>

