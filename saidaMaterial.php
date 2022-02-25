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
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
  </head>
  
  <body background="./img/fundo.png">




  <?php// aqui adiciona o arquivo alt-view-itens-nf.php  ?>   
        
        <?php require_once("menu.php"); 
               require_once("./app/alt-view-itens-saida.php"); 
        ?>

    

  <br>
    

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron">
            <font color="red"><h1 class="text-center text-danger">Nota de Saída</h1></font>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

          <form name= "form" role="form" action="./app/notaSaidaBD.php" method="POST">


             <div class="form-group" >
                <div class="col-sm-2"  >
                  <label for="dtSaida" class="control-label"   >DATA DA SAÍDA:</label>
                </div>
                <div class="col-sm-2">
               
                  <input type="date" class="form-control" id="dtSaida" name="dtSaida"  required="required"  >       

                  
                </div>

                  
   
          <div class="form-group" >
                <div class="col-sm-2"  >
                  <label for="hrSaida" class="control-label"  >HORA DA SÁIDA:</label>
                </div>
                <div class="col-sm-2">
                  <input type="time" class="form-control" id="hrSaida" name="hrSaida"  required="required" >       


                </div>

            
         


                
              <br><br> <br> <br>
              
              &nbsp  <label for="idAlmoxLogin" class="control-label">Almoxarifado:</label>
                  
                  <input type="text"   id = "idAlmoxLogin" name="idAlmoxLogin" size="2" maxlength="2" readonly value="<?=$_SESSION["idAlmoxLogin"];?>" >
                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                  <br><br>
                
                  <div class="col-sm-2">
                  <label for="nmRequisitante" class="control-label">Requisitante:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nmRequisitante" name="nmRequisitante"  >
                </div>
                
              </div>

              <div class="form-group" >
                <div class="col-sm-2"  >
                  <label for="idMat" class="control-label"  >ID. MATERIAL:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="idMat" name="idMat"  size="5" maxlength="5" readonly value="<?php echo $linha["id_produto"];               ?> " >       


                </div>
              </div>
             
         <!--     <div class="form-group">
                <div class="col-sm-2">
                  <label for="idMaterial" class="control-label">Código do Material:</label>
                </div>
                <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Informe o codigo do material." id = "idMaterial" name="idMaterial">
                </div>
              </div>
          -->

          
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="descMaterial" class="control-label">Descrição do Material:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Informe a descrição do produto." id = "descMaterial" name="descMaterial" readonly value="<?=$linha['nome_prod'];?>" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label" for ="loteMaterial">Lote Material:</label>
                </div>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="loteMaterial" name="loteMaterial" readonly value="<?=$linha['lote_prod'];?>" >
                </div>
               
                
                </div>
                <div class="col-sm-2">
                  <label class="control-label" for ="dataValid">Data Validade:</label>
                </div>
                <div class="col-sm-2">
                <input type="date" class="form-control" id="dataValid" required name="dataValid" readonly value="<?=$linha['data_valid_prod'];?>" >
                </div>
              </div><br>
      
              
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="marcaMaterial" class="control-label">Marca do Material:</label>
                </div>
                <div class="col-sm-3">
                  <input type="text" class="form-control" placeholder="Informe a marca do material." id="marcaMaterial" name="marcaMaterial" readonly value="<?=$linha['marca_prod'];?>" >
                </div>
              </div>
   
                
              
              <div class="form-group">
                <div class="col-sm-1">
                  <label for="medMaterial" class="control-label">Medida:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control"  id="medMaterial" name="medMaterial" readonly value="<?=$linha['medida_prod'];?>" >
                </div>
              </div>

             
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="qtdEmEstoque" class="control-label">Qtd. em Estoque:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="qtdEmEstoque" name="qtdEmEstoque" readonly value="<?=$linha['qtd_estoque_prod'];?>"  onfocus="calcular()"  >
                </div>
                <div class="col-sm-2">
                  <label for="qtdSaida" class="control-label" >Qtde. Saida:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="qtdSaida" name="qtdSaida" required="required"  onfocus="calcular()"  >
                </div>
                
              </div> 

                 <div class="form-group">
                <div class="col-sm-2">
                  <label for="vlUnit" class="control-label">Vl. Preço Médio:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="vlUnit" name="vlUnit" readonly value="<?=$linha['vl_preco_med_prod'];?>"  onblur="calcular()" >
                </div>
              </div>



              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vlTotalMaterial" class="control-label" contenteditable="true">Vl. Total Material:</label>
                </div>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="vlTotalMaterial" name="vlTotalMaterial" required="required" onkeypress="somar()">
                </div>
              &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp
             
              </div>


        

              <div class="form-group"> 
              <div class="col-sm-5">
                   <br><br>
                   
                </div>
              </div> 
                
              
              
           <!--    
               <div>
               <br><br>
            <font size = 3> <b> Valor total dos itens..: </b> </font>
            <font size = 4> <input name="vlTotal" id="vlTotal" type="text" size="12" maxlength="12" readonly name="vlTotal" readonly value="<?=$linhaTotalItem['vl_total_ite'];?>"> </font>
              </div>
-->
           <!--Botao do cadastro-->
           <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <br> <br>
            <button type="submit" class="btn btn-success">S A I D A</button>
          </div>
        </div>

      </div>
    </div>
  </div>

<br><br>

            </form>

       <!--     

            <div align="right">
            <font size = 3> <b> Valor de Conferência..: </b></font>
            <font size = 4> <b> <input name="vlConf" id="vlConf" type="text" size="12" maxlength="12" readonly name="vlConf" value="<?=$linha['vl_conferencia'];?>"/> </b> </font> &nbsp
            
            <font size = 3> <b> Valor total dos itens..: </b> </font>
            <font size = 4> <input name="vlTotal" id="vlTotal" type="text" size="12" maxlength="12" readonly name="vlTotal" readonly value="<?=$linhaTotalItem['vl_total_ite'];?>"> </font>
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              &nbsp &nbsp &nbsp &nbsp &nbsp
              
          </div>

      -->
       

<!--Parte js-->
<script type="text/javascript">


function calcular(){
    var qtdMat = parseFloat(document.getElementById('qtdSaida').value, 10);
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