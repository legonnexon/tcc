<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
      {
      
          session_start();
          $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
          $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);



         //faz conexão com banco
          try{
               require_once("../conexao/conexao.php");


          //faz select no banco
               $comandoSQL = $conexao->prepare("SELECT * FROM c_usuario WHERE usuarioLogin = :login");
               $comandoSQL->bindParam(":login", $login);
               $comandoSQL->execute();

          //se encontra faz a verificação do login
                 if($comandoSQL->rowCount() > 0){
                     
                       $linha = $comandoSQL->fetch();
                       $hash = $linha["senhaLogin"];

                       if(password_verify($senha, $hash)){

                         //cria sessão para o usuario faz a valida~ção do usuário
                       	  $_SESSION["nome"] = $linha["usuarioLogin"];
                       	  $_SESSION["nivel"] = $linha["nivelLogin"]==1?"Administrador":"Usuario";
                          $_SESSION["almoxLogin"] = $linha["idAlmoxLogin_FK"]==1?"Almoxarifado Central":"Nehum Almoxarifado";
                          $_SESSION["idAlmoxLogin"] = $linha["idAlmoxLogin_FK"]==1?"1":"0";

                       	  header("location:../sgv.php");
                       } else
                          {

                          	 session_start();
                          	 session_unset();
                             session_destroy();

            
                          	 header("location:../index.php");
                          }

                 } else {

                              session_start();
                          	session_unset();
                              session_destroy();

                            header("location:../index.php");

                 }

          }catch(PDOException $erro){

             echo $erro->getMessage();

          }

          $conexao = null; //fechando a minha coexão!!!

      }