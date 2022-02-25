<?php
        session_start();
        if((!isset($_SESSION["nome"]) == TRUE ) and (!isset($_SESSION["nivel"])==TRUE))
        {
             session_unset();
             session_destroy();

             header("location:index.php");
        }

?>

<?php 

 /* FILTER_SANITIZE_STRING COMANDO PARA PROTEGER DO SQL INJETION , TRANSFORMANDO EM TEXTO CADASTRO PESSOA ENTRADA NF*/ 

   $loteProd          = filter_input(INPUT_GET, "loteProd", FILTER_SANITIZE_NUMBER_INT);

 // comando para abrir  a conexão com o  banco

    require_once("./conexao/conexao.php");

    try { // O que deve ser feito.


    if ($loteProd!="")
    {  
      $comandoSQLItenNf = "SELECT  
                              itNF.id_capaem,
                              itNF.numero_notafisc_capaem,
                              itNF.id_almox_item_em_FK,
                              itNF.nome_ite,
                              itNF.lote_prod_ite_nf,
                              itNF.data_fab_prod_ite_nf,
                              itNF.data_valid_prod_ite_nf,
                              itNF.marca_ite,
                              itNF.grupo_ite,
                              itNF.medida_ite,
                              itNF.qtd_ite,
                              itNF.vl_unit_ite,
                              itNF.vl_total_ite
                              
                              FROM c_item_em itNF ";
      $resultado = $conexao->query($comandoSQLItenNf);
      $linha = $resultado->fetch(PDO::FETCH_ASSOC);

      if($resultado->rowCount() > 0)
      {
          $loteProd        = $loteProd;
          $id_capaem     = isset($linha['id_capaem'])? $linha['id_capaem']:"" ;
          $nf            = isset($linha['numero_notafisc_capaem'])?$linha['numero_notafisc_capaem']:"";
          $idAlmox       = isset($linha['id_almox_item_em_FK'])?$linha['id_almox_item_em_FK']:"" ; 
          $nome_ite      = isset($linha['nome_ite'])?$linha['nome_ite']:"" ;
          $lote          = isset($linha['lote_prod_ite_nf'])?$linha['lote_prod_ite_nf']:"" ;
          $dataFab       = isset($linha['data_fab_prod_ite_nf'])?$linha['data_fab_prod_ite_nf']:"";
          $dataValid     = isset($linha['data_valid_prod_ite_nf'])?$linha['data_valid_prod_ite_nf']:"";
          $marca         = isset($linha['marca_ite'])?$linha['marca_ite']:"";
          $grupo         = isset($linha['grupo_ite'])?$linha['grupo_ite']:"";
          $medida        = isset($linha['medida_ite'])?$linha['medida_ite']:"";
          $qtd_ite       = isset($linha['qtd_ite'])?$linha['qtd_ite']:"";
          $vlUnit        = isset($linha['vl_unit_ite'])?$linha['vl_unit_ite']:"";
          $vlTotal       = isset($linha['vl_total_ite'])?$linha['vl_total_ite']:"";

      }

  }
     
}

// retorno de mensagem de erro
catch (PDOException $erro) 
{
  echo $erro->getMessage();
}

$conexao = null; // c
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


     <?php require_once("menu.php");   ?>

 
    
      <!--Forms do site-->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

        <form  role="form" action="" method="GET">
      
              <b> SEQ. ENTRADA: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input id="Seq" type="text" size="18" maxlength="18" name="Seq"  /><br><br>
              
            
                                                                                              
        <button type="submit" >CONSULTAR</button>
        <br><br>
      </form>

       <?php// aqui adiciona o arquivo alt-view-itens-nf.php  ?>   
        
        
           
      

    

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
                  <input type="text" class="form-control" placeholder="Informe a descrição do produto." id = "descMaterial" name="descMaterial" value="<?=$linha['numero_notafisc_capaem'];?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label class="control-label" for ="loteMaterial">Lote Material:</label>
                </div>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="loteMaterial" name="loteMaterial"   value="<?=$linha['lote_prod_ite_nf'];?>" >
                </div>
                <div class="col-lote_prod_ite_nfsm-2">
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