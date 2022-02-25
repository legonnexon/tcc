<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

</head>



<body>
  <!--Titulo/top-->

  <?php require_once("menu.php"); 
             
        ?>

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1 class="text-center text-danger" contenteditable="false">EM - ENTRADA MERCADORIA</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Forms do site-->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <form role="form" action="./app/embd.php" method="POST">

            <!--Dados da empresa-->
            <div align="left">
              <h4><label>Dados Empresa:</label></h4>
            </div>
            <div align="left">
              <input class="form-check-input" type="checkbox" name="cnpjPessoa" id="cnpjPessoa" onchange="habilitarJuridica()" />
              <b> CNPJ: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="cnpj" id="cnpj" type="text" size="20" maxlength="14" name="cnpj" disabled /><br><br>

              <input type="checkbox" name="cpfPessoa" id="cpfPessoa" onchange="habilitarFisica()" />
              <b> CPF : </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="cpf" id="cpf" type="text" size="15" maxlength="11" name="cpf" disabled /> <br><br>

              <b> Razão Social / Pessoa: </b> &nbsp &nbsp &nbsp
              <input name="nomePessoa" id="nomePessoa" type="text" size="100" maxlength="100" name="nomePessoa" /> <br><br>

              <b> CEP: </b>
              <input name="cepPessoa" id="cepPessoa" type="text" size="8" maxlength="10" name="cepPessoa" /> &nbsp
              <b> UF: </b> &nbsp
              <input name="ufpessoa" id="ufpessoa" type="text" size="4" maxlength="2" name="ufpessoa" /> &nbsp
              <b> Cidade: </b> &nbsp
              <input name="cidadePessoa" id="cidadePessoa" type="text" size="68" maxlength="68" name="cidadePessoa" /> <br><br>

              <b> Endereco: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp
              <input name="enderecoPessoa" id="enderecoPessoa" type="text" size="60" maxlength="60" name="enderecoPessoa" /> &nbsp
              <b> Bairro: </b> &nbsp
              <input name="bairroPessoa" id="bairroPessoa" type="text" size="29" maxlength="29" name="bairroPessoa" /> <br><br>

              <b> Telefone: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
              <input name="telefonePessoa" id="telefonePessoa" type="text" size="15" maxlength="15" name="telefonePessoa" /> &nbsp
              <b align="left"> Email: </b>
              <input name="emailPessoa" id="emailPessoa" type="email" size="50" maxlength="50" name="emailPessoa" /> <br><br> <br>

              <!--Dados da nota fiscal-->
              <div>
                <div align="left">
                  <h4><label>Dados da Nota Fiscal:</label></h4>
                </div>
                <b> Numero da NF: </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <input name="nf" id="nf" type="text" size="15" maxlength="15" name="nf" /> &nbsp
                <b> Data Entrada NF: </b>
                <input name="dtEntrada" id="dtEntrada" type="date" size="15" maxlength="15" name="dtEntrada" /> &nbsp

                <b> Data Emissão da NF: </b>
                <input name="dtEmissao" id="dtEmissao" type="date" size="15" maxlength="15" name="dtEmissao" /> <br> <br>

                <b> Valor conferência da NF: &nbsp</b>
                <input name="valorConferencia" id="valorConferencia" type="numeric" size="15" maxlength="15" name="valorConferencia" />
              </div>
            </div>

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

          </form>
        </div>

       

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
  </script>

</body>