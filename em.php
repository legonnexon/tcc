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

   $cnpjCons          = filter_input(INPUT_GET, "cnpjCons", FILTER_SANITIZE_NUMBER_INT);
   $cpfCons           = filter_input(INPUT_GET, "cpfCons", FILTER_SANITIZE_NUMBER_INT); 
   



    // comando para abrir  a conexão com o  banco

    require_once("./conexao/conexao.php");



try { // O que deve ser feito.


    if ($cnpjCons!="")
    {  
      $comandoSQLJur = "SELECT * FROM c_fornecedor WHERE cnpj_forn = $cnpjCons";
      $resultado = $conexao->query($comandoSQLJur);
      $linha = $resultado->fetch(PDO::FETCH_ASSOC);

      if($resultado->rowCount() > 0)
      {
          $cnpj     = $cnpjCons;
          $nome     = isset($linha['rz_social_forn'])? $linha['rz_social_forn']:"" ;
          $cep      = isset($linha['cep_forn'])?$linha['cep_forn']:"";
          $uf       = isset($linha['uf_forn'])?$linha['uf_forn']:"" ; 
          $cidade   = isset($linha['cidade_forn'])?$linha['cidade_forn']:"" ;
          $endereco = isset($linha['endereco_forn'])?$linha['endereco_forn']:"" ;
          $bairro   = isset($linha['bairro_forn'])?$linha['bairro_forn']:"";
          $telefone = isset($linha['telefone_forn'])?$linha['telefone_forn']:"";
          $email    = isset($linha['email_forn'])?$linha['email_forn']:"";

      }
      else  
      {
          //Garantir que seja lido sem problemas
          //header("Content-Type: text/plain");

          //Criando Comunicação cURL
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/".$cnpjCons);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Descomente esta linha apenas se você não usar HTTPS, ou se estiver testando localmente
          $retorno = curl_exec($ch);
          curl_close($ch);

          $retorno = json_decode($retorno); //Ajuda a ser lido mais rapidamente
          //echo json_encode($retorno, JSON_PRETTY_PRINT);
         
             
          $cnpj   = $cnpjCons; 
         

           $nome   = $retorno->nome;
           $cep    = $retorno->cep;
           $uf     = $retorno->uf;
           $cidade = $retorno->municipio;
           $endereco = $retorno->logradouro.', '.$retorno->numero;
           $bairro   = $retorno->bairro;
           $telefone = $retorno->telefone;
                  
           
          $email = $retorno->email;
            
      }
    }

}
     




// retorno de mensagem de erro
catch (PDOException $erro) 
{
  echo $erro->getMessage();
}

$conexao = null; // comando para fechar a conexão aberta do banco.




?>


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="bootstrap.css" rel="stylesheet" type="text/css">

  <script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.min.js"/></script>

</head>



<body background="./img/fundo.png">
  <!--Titulo/top-->

      <?php 

       require_once("menu.php"); 
    
       
             
        ?>

    

        <table align="center" background="./img/caixaFundo1165x699.png">
          <tr>
             <td>

  
          <center> <font color="red"> <h1>EM - ENTRADA MERCADORIA</h1>  </font> </center>
          <br><br>
        

  <!--Forms do site-->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

        <form  role="form" action="" method="GET">
      
              <b> CNPJ: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input id="cnpjCons" type="text" size="18" maxlength="18" name="cnpjCons"  /><br><br>
              
            
                                                                                              
        <button type="submit" >CONSULTAR</button>
        <br><br>

          <?php  
 
              if  (isset($cnpj))
              {

          ?>

      </form>

             
          <form role="form" action="./app/embd.php" method="POST">


            <!--Dados do Almoxarifado-->
            <div align="left">
              <h4><label>Dados Almoxarifado:</label></h4>
            </div>
            <div align="left">
            
              <b> Almoxarifado: </b>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="idAlmoxLogin" id="idAlmoxLogin" type="text" size="1" maxlength="1" name="idAlmoxLogin" readonly value="<?=$_SESSION["idAlmoxLogin"];?>" />
              <br>
              <br>                                                                                                         
                                                                                                                                                              

            <!--Dados da empresa-->
            <div align="left">
              <h4><label>Dados Empresa:</label></h4>
            </div>
            <div align="left">
              <input class="form-check-input" type="checkbox" name="cnpjPessoa" id="cnpjPessoa" onchange="habilitarJuridica()" />
              <b> CNPJ: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="cnpj" id="cnpj" type="text" size="18" maxlength="18" name="cnpj" onkeyup="mascara_cnpj()"   required  disabled  value="<?=$cnpj?>" /><br><br>
             

              

              <b> Razão Social / Pessoa: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
              <input name="nomePessoa" id="nomePessoa" type="text" size="100" maxlength="100" name="nomePessoa"  value="<?=$nome;?>" /> <br><br>

              <b> CEP: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
              <input name="cepPessoa" id="cepPessoa" type="text" size="12" maxlength="12" name="cepPessoa"  value="<?=$cep;?>" /> &nbsp
              <b> UF: </b> &nbsp
              <input name="ufpessoa" id="ufpessoa" type="text" size="4" maxlength="2" name="ufpessoa"  value="<?=$uf;?>" /> &nbsp
              <b> Cidade: </b> &nbsp
              <input name="cidadePessoa" id="cidadePessoa" type="text" size="60" maxlength="60" name="cidadePessoa"  value="<?=$cidade;?>" /> <br><br>

              <b> Endereco: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp
              <input name="enderecoPessoa" id="enderecoPessoa" type="text" size="56" maxlength="56" name="enderecoPessoa"  value="<?=$endereco;?>" /> &nbsp
              <b> Bairro: </b> &nbsp
              <input name="bairroPessoa" id="bairroPessoa" type="text" size="29" maxlength="29" name="bairroPessoa"  value="<?=$bairro;?>" /> <br><br>

              <b> Telefone: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="telefonePessoa" id="telefonePessoa" type="text" size="50" maxlength="50" name="telefonePessoa" value="<?=$telefone;?>" /> &nbsp
              <b align="left"><br><br> Email: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="emailPessoa" id="emailPessoa" type="email" size="71" maxlength="71" name="emailPessoa"  value="<?=$email==null?'':$email;?>" /> <br><br> <br>

              <!--Dados da nota fiscal-->
              <div>
                <div align="left">
                  <h4><label>Dados da Nota Fiscal:</label></h4>
                </div>
                <b> Numero da NF: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <input name="nf" id="nf" type="text" size="15" maxlength="15" name="nf" /> &nbsp
                <b> Data Entrada NF: </b>
                <input name="dtEntrada" id="dtEntrada" type="date" size="15" maxlength="15" name="dtEntrada" /> &nbsp

                <b> Data Emissão da NF: </b>
                <input name="dtEmissao" id="dtEmissao" type="date" size="15" maxlength="15" name="dtEmissao" /> <br> <br>

                <b> Valor conferência da NF: &nbsp &nbsp &nbsp &nbsp &nbsp</b>
                <input name="valorConferencia" id="valorConferencia" type="numeric" size="15" maxlength="15" name="valorConferencia" />
              </div>
            </div>

           <!--Botao do cadastro-->
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <br> <br>
           
         
            <button type="submit" class="btn btn-success" >C A D A S T R A R</button>
          </div>
        </div>

      </div>
    </div>
  </div>

          </form>
         <?php  
             }
         ?>
          
        </div>
             </td>
         <tr>
</table>
       

  <!--Parte js-->
  <script type="text/javascript">
    function habilitarJuridica() {
      var cnpj = document.getElementById('cnpj');
      var cnpjPessoa = document.getElementById('cnpjPessoa');

      if (cnpjPessoa.checked) {
        cnpj.removeAttribute("disabled");
      } else {
        cnpj.value = ''; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
        cnpj.setAttribute("disabled", "disabled");
      }
    }

    function habilitarFisica() {
      var cpf = document.getElementById('cpf');
      var cpfPessoa = document.getElementById('cpfPessoa');

      if (cpfPessoa.checked) {
        cpf.removeAttribute("disabled");
      } else {
        cpf.value = ''; //Evita que o usuário defina um texto e desabilite o campo após realiza-lo
        cpf.setAttribute("disabled", "disabled");
      }
    }


    //MASCARAS DOS INPUT (CNPJ/CPF/CEP/TELEFONE)

function mascara_cnpj()
  {
    var cnpj = document.getElementById('cnpj')
    if (cnpj.value.length == 2 || cnpj.value.length == 6 ){

      cnpj.value += "."
    } else if(cnpj.value.length == 10){
      cnpj.value += "/"

    } else if(cnpj.value.length == 15){
      cnpj.value += "-"
  }
  }

function mascara_cpf()
  {
    var cpf = document.getElementById('cpf')
    if (cpf.value.length == 3 || cpf.value.length == 7){

      cpf.value += "."
    } else if(cpf.value.length == 11){
      cpf.value += "-"

    }
  }





  </script>

</body>