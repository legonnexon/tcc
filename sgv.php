<?php
session_start();
if ((!isset($_SESSION["nome"]) == TRUE) and (!isset($_SESSION["nivel"]) == TRUE)) {
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
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body style="background: rgb(2,0,36);
background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">

<?php require_once("menu.php"); ?>

  <div class="border p-3 mt-5 shadow" style="margin: 0 auto;background-color: rgba(248, 249, 250, 0.7);">
      <div class="text-center mt-2">
        <div class="text-primary display-3" style="width: calc(30vw + 150px); font-family: Noto Serif Display; margin: 0 auto;">Bem vindo <?= $_SESSION["nome"]; ?> a SGM</div>
    </div>
  </div>

  <!-- Blocos -->

  <!-- Produtos -->

      <div class="container p-3 row" data-aos="fade-right" style="max-width: 75%; margin: 0 auto; margin-top: 16vh;">

    <div class="container col" style="max-width: 240px; max-height: 190px;">
      <a href="#">
        <img src="./img/produtos.gif" class=" " alt="..." style="max-height:220; border: none;">
      </a>
    </div>

    <div class="container text-left text-white col">
      <h1>Produtos</h1>
      <p class="h3">Tenha conhecimento dos nossos PRODUTOS.</p>
    </div>

    </div>

    <div class="p-3" style="margin-top: 100px;">

      <!-- Material vencido -->
      <div class="container p-3 row" data-aos="fade-left" style="max-width: 75%; margin: 0 auto; margin-top: 16vh;">

        <div class="container text-right text-white col">
          <h1>Materiais Vencidos</h1>
          <p class="h3">Acesso rapido aos MATERIAIS VENCIDOS.Confira os materiais vencidos com apenas um clique.</p>
        </div>

        <div class="container col" style="max-width: 337px; max-height: 190px;">
          <a href="cons-matVencido.php">
            <img src="./img/vencido.gif" class=" " alt="..." style="max-width:220; max-height: auto; border: none;">
          </a>
        </div>
      </div>

      <!-- Fornecedores -->

      <div class="container p-3 row" data-aos="fade-right" style="max-width: 75%; margin: 0 auto; margin-top: 16vh;">

        <div class="container col" style="max-width: 240px; max-height: 190px;">
          <a href="#">
            <img src="./img/fornecedor.gif" class=" " alt="..." style="max-height:220; border: none;">
          </a>
        </div>

        <div class="container text-left text-white col">
          <h1>Fornecedores</h1>
          <p class="h3">Tenha conhecimento dos nossos principais FORNECEDORES,parceiros de trabalho.</p>
        </div>

      </div>

      <!-- Estoque -->
      <div class="container p-3 row" data-aos="fade-left" style="max-width: 75%; margin: 0 auto; margin-top: 16vh;">

        <div class="container text-right text-white col">
          <h1>Estoque</h1>
          <p class="h3">Acesso rapido ao ESTOQUE.Confira o Estoque.</p>
        </div>

        <div class="container col" style="max-width: 337px; max-height: 190px;">
          <a href="cons-estoque.php">
            <img src="./img/estoque.gif" class=" " alt="..." style="max-width:220; max-height: auto; border: none;">
          </a>
        </div>
      </div>
      
      <!--Material Baixado -->

      <div class="container p-3 row" data-aos="fade-right" style="max-width: 75%; margin: 0 auto; margin-top: 16vh;">

<div class="container col" style="max-width: 240px; max-height: 190px;">
  <a href="cons-matBaixado.php">
    <img src="./img/material.gif" class=" " alt="..." style="max-height:220; border: none;">
  </a>
</div>

<div class="container text-left text-white col">
  <h1>Material Baixado</h1>
  <p class="h3">Acesso rapido ao MATERIAL BAIXADO.</p>
</div>

      <!-- Notas Fiscais -->

      <div class="container p-3 row" data-aos="fade-left" style="max-width: 115%; margin: 0 auto; margin-top: 16vh;">

<div class="container text-right text-white col">
  <h1>Notas Fiscais</h1>
  <p class="h3">Acesso rapido as NOTAS FISCAIS.</p>
</div>

<div class="container col" style="max-width: 337px; max-height: 190px;">
  <a href="cons-nf.php">
    <img src="./img/notasfiscais.gif" class=" " alt="..." style="max-width:220; max-height: auto; border: none;">
  </a>
</div>
</div>


<?php //require_once("rodape.php"); ?>

<!-- Scripts --> 
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  AOS.init();
</script>
</body>

</html>