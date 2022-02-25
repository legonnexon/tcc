<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body style="background: rgb(2,0,36);
background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
                <div class="container" style="max-width: calc(30vw + 200px);">
                    <div class="text-center">
                        <div class="p-3 border rounded bg-light shadow" style="margin-top: 18vh;">
                            <form action="./app/valida-loginbd.php" method="POST" role="form">

                                <div align="center">

                                    <div class="card-body">
                                        <h5 class="card-title display-4">SGM</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Sistema de Gerenciamento de Material</h6>
                                    </div>

                                    <p class="h5 text-left mb-2" style="color: #111111;">Usuário:</p>
                                      
                                    <input type="text" class="form-control mb-3" id="login" placeholder="Informe seu usuário." name="login" size="50" maxlength="50" required></input>

                                    <p class="mb-2 h5 text-left">Senha:</p>

                                    <input type="password" class="form-control mb-4" id="senha" placeholder="Infome a sua senha." name="senha" size="20" maxlength="20" required ></input>
                                </div>
                                      
                                <div class="form-group">
                                    <div class="align-items-center">
                                        <button type="submit" class="btn btn-info btn-lg btn-block">LOGIN</button>
                                    </div>
                                    <div class="align-items-center">
                                        <a href="usuario.php" style="text-decoration: none;">
                                        <button type="button" class="btn btn-info btn-lg btn-block mt-2">REGISTRAR</button></a>
                                    </div>
                                </div>           
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>