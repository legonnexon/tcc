
<?php
  session_start();
  if((!isset($_SESSION["nome"]) == TRUE ) and (!isset($_SESSION["nivel"])==TRUE)) {
    session_unset();
    session_destroy();

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
  <div class="display-3">Notas Fiscais</div>
</div>

<div class="container bg-light overflow-auto border rounded mt-4">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">SEQ. NF</th>
        <th scope="col">Nº NF</th>
        <th scope="col">CNPJ/CPF</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Data de Entrada</th>
        <th scope="col">Valor de Conferencia</th>
        <th scope="col">Total Itens NF</th>
        <th scope="col">Dierença</th>
        <th scope="col">Inserir ou Alterar NFs</th>
      </tr>
    </thead>    
    <tbody>
      <?php
      require_once("./app/cons-itemNfbd.php");
      foreach($resultado as $linha) {
      ?> 
      <tr>
        <th scope="row"><?php echo $linha["id_capaem"]; ?></th>
        <td><?php echo $linha ["numero_notafisc_capaem"]; ?></td>
        <td><?php echo $linha ["cnpj_capaem"]; ?></td>
        <td><?php echo $linha ["rz_social_capaem"]; ?></td>
        <td><?php echo $linha ["dt_entrada"]; ?></td>
        <td><?php echo $linha ["vl_conferencia"]; ?></td>
        <td><?php echo $linha ["total_itens_nota"]; ?></td>
          <?php 
            if($linha ["diferenca"] < 0)  {
              echo("<td style='color:#FF0000'>");
              echo $linha ["diferenca"];
              echo("</td>");
            } else {
              if($linha ["diferenca"] > 0)  {
                echo("<td>");
                echo $linha ["diferenca"];
                echo("</td>");
              }
            }
          ?>

          <?php
            if ($linha ["diferenca"] < 0) {
              echo("<td align ='center'>");
              echo("<a href='cons-alt-itens-nf.php'>");
              echo("<img src='./img/alteracao.png'>");
              echo ("</a>");                                               
              echo("</td>");
            } else {
              if ($linha["diferenca"] > 0) {
                echo("<td align ='center'>");
          ?>
          <a href="iteEm.php?id=<?=$linha["id_capaem"];?>">
          <?php
          echo("<img src='./img/inserir.png'>");
          echo ("</a>");
          echo("</td>");
              }
            }
          ?>
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Scripts --> 
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>