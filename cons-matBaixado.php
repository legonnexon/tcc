<?php
  session_start();
  if((!isset($_SESSION["nome"]) == TRUE ) and (!isset($_SESSION["nivel"])==TRUE)) {
  session_unset();
  session_destroy();

  header("location:index.php");
  }

  //validando o nivel de permissão da pagina consulta
  if ($_SESSION["nivel"]!="Administrador") {
    header("location:index.php");
  }
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  
<body style="background: rgb(2,0,36);
background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">

<?php require_once("menu.php"); ?>

<div class="container bg-light text-center p-3 mt-4 border rounded">
  <div class="display-3">Materiais Baixados</div>
</div>

<?php
require_once("./app/cons-matBaixadobd.php");
foreach($resultadoItensEstoque as $linha) {
?>  

<div class="container bg-light text-dark border rounded mt-4 mb-4 p-3 text-center d-flex justify-content-center" style="gap: 10px;">
  
  <h5 class="control-label mt-1">Itens no Estoque: </h5>
  <div class="h5 p-2 border rounded" readonly> <?php echo $linha["intensEstoque"]; ?> </div>

  <h5 class="control-label mt-1">Total no Estoque:</h5>
  <div class="h5 p-2 border rounded" readonly> <?php echo $linha["valorTotalEstoque"]; ?> </div>
  
</div>

<?php
}
?>

 <div class="container bg-light overflow-auto border rounded mb-3">
   <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">Lote</th>
         <th scope="col">Marca</th>
         <th scope="col">Grupo</th>
         <th scope="col">Material</th>
         <th scope="col">Medida</th>
         <th scope="col">QTD. Baixada</th>
         <th scope="col">Preço Médio MAT.</th>
         <th scope="col">Valor Total MAT.</th>
         <th scope="col">Data Validade</th>
         <th scope="col">Status</th>
       </tr>
     </thead>
     <tbody>
      <?php
      //buscando o arquivo cons-clientesbd.php
      require_once("./app/cons-matBaixadobd.php");
      //comando foreach busca os dados da variavel resultado e armazena na variavel  "linha", 
      //jogando a infomação na tabela montada em html alimentado ocm dos dados da variavel linha.
      foreach($resultado as $linha) {
      ?>
       <tr>
         <th scope="row"> <?php echo $linha["lote_inu"]; ?></th>
         <td><?php echo $linha["marca_mat_inu"]; ?></td>
         <td><?php echo $linha["desc_mat_inu"]; ?></td>
         <td><?php echo $linha["medida_inu"]; ?></td>
         <td><?php echo $linha["qtd_estoque_inu"]; ?></td>
         <td><?php echo $linha["preco_medio_item_inu"]; ?></td>
         <td><?php echo $linha["preco_total_item_inu"]; ?></td>
         <td><?php echo $linha["data_val_inu"]; ?></td>
         <td><?php echo $linha["quantidade_dias_vencer"]; ?></td>
       </tr>
      <?php
      }
      ?>
     </tbody>
   </table>
 </div>

<!-- Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>