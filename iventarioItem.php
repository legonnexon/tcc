<?php
        session_start();
        if((!isset($_SESSION["nome"]) == TRUE ) and (!isset($_SESSION["nivel"])==TRUE))
        {
             session_unset();
             session_destroy();

             header("location:index.php");
        }

     //validando o nivel de permissão da pagina consulta
if ($_SESSION["nivel"]!="Administrador")
{
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

<?php
require_once("menu.php"); 
require_once("./app/alt-view-itens-iventario.php"); 
?>

<div class="container justify-content-center mt-5 mb-5 bg-white p-3 col-11 rounded shadow w-75">

  <div class="container text-center p-3 mb-3">
  <div class="display-3">Itens do Iventário</div>
</div>

  <form name= "form" role="form" action="./app/iventarioItemBD.php" method="POST">
   
  <div class="form-group">
    <label for="hrInventario">Hora do Iventário:</label>
    <input type="time" class="form-control" name="hrInventario" id="hrInventario" placeholder="Insira seu nome" required="required">
  </div>

  <div class="form-group">
    <label for="dtInventario">Data do Iventário:</label>
    <input type="date" class="form-control" name="dtInventario" id="dtInventario" placeholder="Insira seu nome" required="required">
  </div> 

  <div class="form-group">
    <label for="movAcerto">Motivo:</label>
    <select class="form-control" name="movAcerto" id="movAcerto">
      <option selected="">Ajuste de Estoque</option>
      <option>Outra coisa</option>
      </select>
  </div>     

  <div class="form-group mt-4">
    <label for="idAlmoxLogin">Almoxarifado:</label>
    <input type="text" class="form-control" name="idAlmoxLogin" id="idAlmoxLogin" readonly value="<?=$_SESSION["idAlmoxLogin"];?>">
  </div>

  <div class="form-group">
    <label for="idMat">ID. Material:</label>
    <input type="text" class="form-control" name="idMat" id="idMat" readonly value="<?php echo $linha["id_produto"];               ?>">
  </div>

  <div class="form-group">
    <label for="descMaterial">Descrição do Material:</label>
    <input type="text" class="form-control" name="descMaterial" id="descMaterial" readonly value="<?=$linha["nome_prod"];?>">
  </div>

  <div class="form-group">
    <label for="loteMaterial">Lote Material:</label>
    <input type="text" class="form-control" name="loteMaterial" id="loteMaterial" readonly value="<?=$linha["lote_prod"];?>">
  </div>

  <div class="form-group">
    <label for="dataFab">Data Fabricação:</label>
    <input type="date" class="form-control" name="dataFab" id="dataFab" readonly value="<?=$linha["data_fab_prod"];?>">
  </div>

  <div class="form-group">
    <label for="dataValid">Data Validade:</label>
    <input type="date" class="form-control" name="dataValid" id="dataValid" readonly value="<?=$linha["data_valid_prod"];?>">
  </div>
      
  <div class="form-group">
    <label for="marcaMaterial">Marca do Material:</label>
    <input type="text" class="form-control" name="marcaMaterial" id="marcaMaterial" readonly value="<?=$linha["marca_prod"];?>">
  </div>   

  <div class="form-group">
    <label for="medMaterial">Medida:</label>
    <input type="text" class="form-control" name="medMaterial" id="medMaterial" readonly value="<?=$linha["medida_prod"];?>">
  </div>   

  <div class="form-group">
    <label for="qtdEmEstoque">Quantidade em Estoque:</label>
    <input type="text" class="form-control" name="qtdEmEstoque" id="qtdEmEstoque" readonly value="<?=$linha["qtd_estoque_prod"];?>" onfocus="calcular()">
  </div>

  <div class="form-group">
    <label for="qtdNovoEstoque">Novo Estoque:</label>
    <input type="text" class="form-control" name="qtdNovoEstoque" id="qtdNovoEstoque" readonly value="<?=$linha["qtd_estoque_prod"];?>" onfocus="calcular()">
  </div>  

  <div class="form-group">
    <label for="vlUnit">Vl. Preço Médio:</label>
    <input type="text" class="form-control" name="vlUnit" id="vlUnit" readonly value="<?=$linha["vl_preco_med_prod"];?>" onblur="calcular()">
  </div>  

  <div class="form-group">
    <label for="vlTotalMaterial">Vl. Total Material:</label>
    <input type="text" class="form-control" name="vlTotalMaterial" id="vlTotalMaterial" required="required" onkeypress="somar()">
  </div>           

  <!--Botao do cadastro-->
  <div class="justify-content-center">
    <div class="btn btn-lg btn-block">
      <button id="btnRegistrar" type="submit" class="btn btn-info btn-lg btn-block">A L T E R A R</button>
    </div>
    <div class="btn btn-lg btn-block">
      <button type="button" class="btn btn-danger btn-lg btn-block" onclick="window.history.back();">F E C H A R</button>
    </div>
  </div>
</div>
</form>       

<!--Parte js-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">

function calcular(){
    var qtdMat = parseFloat(document.getElementById('qtdNovoEstoque').value, 10);
    var vlUnit = parseFloat(document.getElementById('vlUnit').value, 10);
    document.getElementById('vlTotalMaterial').value = qtdMat * vlUnit;
}



function validacao(){
 if(document.form.descMaterial==""){
   alert("Por favor, prrencha o nome do material!");
   document.form.descMaterial.focus();
   return false;

 }
}

</script>                        

  </body>

</html>