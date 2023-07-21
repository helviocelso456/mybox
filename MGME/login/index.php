<?php
include "../classes/geral.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../midia/favicon/unilifeSem.ico" type="image/x-icon">

    <!--css-->
    <link rel="stylesheet" href="../arquivos-gerais/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.0-dist/css/bootstrap.css">
    <!--js-->
    <script src="../bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <title>Entrar</title>
</head>
<body>
    <form action="../classes/usuario.php" method="post" class='w-100 d-flex flex-column align-items-center mt-5'>
        
          <div class="card shadow w-50 mt-5">
          <div class="card-body">
            <div class="icone-usuario m-auto"></div>
            <h5 class="card-title text-center">Módulo de Gestão Mensalidades Escolares</h5>
            <p class="card-text text-center">Este módulo destina - se ao monitoramento e gestão de mensalidades</p>

            <?php  mensagemLogin(); ?>
          </div>
        </div>

      <div class="card shadow mt-3 w-50">
        <div class="card-body">
           <div class="form-group col-md-12">
             <input type="text" placeholder="E-Mail ou Usuário" class="form-control mt-2" name="user-mail"  minlength="5">
             <input type="password" placeholder="Senha do Usuário" class="form-control mt-2" name="senha"  minlength="5">
             <button type="submit" class="btn btn-success w-100 mt-2" name="btnEntrar">Efetuar Login</button>
        </div>
        </div>
      </div>

     </div>  
    </form>
</body>
</html>