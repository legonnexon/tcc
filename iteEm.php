<?php
        session_start();
        if((!isset($_SESSION["nome"]) == TRUE ) and (!isset($_SESSION["nivel"])==TRUE))
        {
             session_unset();
             session_destroy();

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
               require_once("./app/alt-view-itens-nf.php"); 
        ?>

    

  <br>
    

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron">
           <font color="red"> <h1 class="text-center text-danger">Itens da Nota Fiscal</h1></font>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            
          <div align="center">
            <font size = 3> <b> Valor de Conferência..: </b></font>
            <font size = 4> <b> <input name="vlConf" id="vlConf" type="text" size="12" maxlength="12" readonly name="vlConf" value="<?=$linha['vl_conferencia'];?>"/> </b> </font> &nbsp
            
            <font size = 3> <b> Valor total dos itens..: </b> </font>
            <font size = 4> <b> <input name="vlTotal" id="vlTotal" type="text" size="12" maxlength="12" readonly name="vlTotal" readonly value="<?=$linhaTotalItem['vl_total_ite'];?>"> </b> </font>
           
          </div><br>
      
           <?php  
               
                if  ($linha['vl_conferencia'] > $linhaTotalItem['vl_total_ite'] )
              {     

           ?>
          
            <form name= "form" role="form" action="./app/iteEmbd.php" method="POST">

             <div class="form-group" >
                <div class="col-sm-2"  >
              <label for="seqEnt" class="control-label"  >I.D</label>
                </div>
              <div class="col-sm-10">
            <input type="text" class="form-control" name="seqEnt" readonly value="<?=$linha['id_capaem'];?>">
            </div>
              </div>


              <div class="form-group" >
                <div class="col-sm-2"  >
                  <label for="seqEnt" class="control-label"  >Numero da N.F:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nf" name="nf" readonly value="<?=$linha['numero_notafisc_capaem'];?>" >       


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
                  <label for="idAlmoxLogin" class="control-label">Almoxarifado:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  id = "idAlmoxLogin" name="idAlmoxLogin"  readonly value="<?=$_SESSION["idAlmoxLogin"];?>" >
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2">
                  <label for="descMaterial" class="control-label">Descrição do Material:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Informe a descrição do produto." id = "descMaterial" name="descMaterial">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label" for ="loteMaterial">Lote Material:</label>
                </div>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="loteMaterial" name="loteMaterial">
                </div>
                <div class="col-sm-2">
                  <label class="control-label" for ="dataFab">Data Fabricação:</label>
                </div>
                <div class="col-sm-3">
                <input type="date" class="form-control" id="dataFab" required name="dataFab">
                
                </div>
                <div class="col-sm-2">
                  <label class="control-label" for ="dataValid">Data Validade:</label>
                </div>
                <div class="col-sm-4">
                <input type="date" class="form-control" id="dataValid" required name="dataValid">
                </div>
              </div>
      
              
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="marcaMaterial" class="control-label">Marca do Material:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Informe a marca do material." id="marcaMaterial" name="marcaMaterial">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="gpMaterial" class="control-label">Grupo do Material:</label>
                </div>
                <div class="col-sm-10">
                  <!-- <input type="text" class="form-control" placeholder="Infomre a grupo do material." id="gpMaterial" name="gpMaterial"> -->
    
                  <select class="form-control" id="gpMaterial" name="gpMaterial">
                   <option>---------------</option>
                    <option>Gêneros alimenticios</option>
                    <option>Material de Limpeza</option>
                    <option>Material de Expediente</option>
                    <option>Material de Copa e Cozinha</option>
                    <option>Ferramentas</option>
                    <option>Material Elétrico</option>
                    <option>Material Hidráulico</option>
                  </select>

                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="medMaterial" class="control-label">Medida do Material:</label>
                </div>
                <div class="col-sm-10"  >
                  <select class="form-control" id="medMaterial" name="medMaterial">
                    <option>---</option>
                    <option>Un</option>
                    <option>Cx</option>
                    <option>Fa</option>
                    <option>Pc</option>
                    <option>Kg</option>
                    <option>Lt</option>
                    <option>Mt</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="qtdMat" class="control-label">Quantidade do Material:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="qtdMat" name="qtdMat" onfocus="calcular()" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vlUnit" class="control-label">Vl. Unitário Material:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vlUnit" name="vlUnit" onblur="calcular()" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="vlTotalMaterial" class="control-label" contenteditable="true">Vl. Total Material:</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="vlTotalMaterial" name="vlTotalMaterial" onkeypress="somar()">
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
            <button type="submit" class="btn btn-success">C A D A S T R A R</button>
          </div>
        </div>

      </div>
    </div>
  </div>

<br><br>

            </form>

            <?php  

              }else {
                 echo"Nota finalizada!!!";
              }
  
            ?>

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
    var qtdMat = parseFloat(document.getElementById('qtdMat').value, 10);
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