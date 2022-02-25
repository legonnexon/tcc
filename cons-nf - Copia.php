
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
  
  <body>


    

    <?php
require_once("menu.php");

?>
    

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron">
            <font color="red">  <h1 class="text-center text-danger">Notas a ser finalizadas</h1> </font>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-hover table-striped">
              <tbody>
                
                <tr></tr>



            
                                    <?php
                                    //buscando o arquivo cons-clientesbd.php
                                      require_once("./app/cons-itemNfbd.php");


                                       //comando foreach busca os dados da variavel resultado e armazena na variavel  "linha", 
                                       //jogando a infomação na tabela montada em html alimentado ocm dos dados da variavel linha.
                                        foreach($resultado as $linha) {
                                            ?>
                                            <tr>
                                            <td><?php echo $linha["id_capaem"]; ?></td>
                                           <td><?php echo $linha ["numero_notafisc_capaem"]; ?></td>
                                            <td><?php echo $linha ["cnpj_capaem"]; ?></td>
                                            <td><?php echo $linha ["rz_social_capaem"]; ?></td>
                                            <td><?php echo $linha ["dt_entrada"]; ?></td>
                                            <td><?php echo $linha ["vl_conferencia"]; ?></td>
                                           

                                          
                                            <td align = "center">
                                              <a href="iteEm.php?id=<?=$linha['id_capaem'];?>">
                                                <img src="./img/inserir.png">
                                        </a>
                                            </td>
                                            
                                        
                                            </tr>
                                           <?php
                                            
                                           }

                                    
                                         ?>





              </tbody>
              <thead>
                <tr>
                  <th width="100">SEQ. NF </th>
                  <th width="150">Nº NF</th>
                  <th>CNPJ/CPF</th>
                  <th>FORNECEDOR</th>
                  <th>Data Entrada</th>
                  <th>Valor Confêrencia</th>
                  <th width="200" align = "center">INSERIR ITENS NF</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>