
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

<?php require_once("menu.php"); ?>

<!-- Display -->
  <div class="container p-4 mt-4 bg-light border rounded">
    <div class="text-center text-dark display-4"> Gerenciador de Usúarios </div>
  </div>

<!--Tabela -->
<div class=" container bg-light overflow-auto border rounded mt-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">Nivel</th>
                <th scope="col">Email</th>
                <th scope="col">Data Criação</th>
                <th scope="col">Status</th>
                <th scope="col">ATU</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //buscando o arquivo cons-clientesbd.php
            require_once("./app/cons-usuariosbd.php");
            
            //comando foreach busca os dados da variavel resultado e armazena na variavel  "linha", 
            //jogando a infomação na tabela montada em html alimentado ocm dos dados da variavel linha.
            foreach($resultado as $linha) {
            ?>
            <tr>
                <th scope="row"><?php echo $linha["idLogin"]; ?></th>
                <td><?php echo $linha ["nomeLogin"]; ?></td>
                <td><?php echo $linha ["usuarioLogin"]; ?></td>
                <td><?php echo $linha ["nivelLogin"]; ?></td>
                <td><?php echo $linha ["emailLogin"]; ?></td>
                <td><?php echo $linha ["dataLogin"]; ?></td>
                <td><?php echo $linha ["statusLogin"]; ?></td>
                <td align = "center">
                    <a href="alt-login.php?id=<?=$linha['idLogin'];?>">
                        <img src="./img/login.png">
                    </a>
                </td>
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