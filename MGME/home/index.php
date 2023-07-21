<?php
include "../classes/geral.php";
protetor();
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
    <link rel="stylesheet" href="style.css">
    <!--js-->
    <script src="../bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <title>Página Inicial</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">

            <div class="dropdown">
                <button type="button" class="icone-perfil" data-bs-toggle="dropdown"></button>
                <ul class="dropdown-menu">
                    <li class='dropdown-item'><a href='../usuario/perfil.php' class='nav-link'>Meu Perfil</a></li>
                    <li class="dropdown-item"><a href="../usuario/index.php" class="nav-link">Adicionar Funcionário</a></li>
                    <li class="dropdown-item"><a href="../classes/logout.php" class="nav-link">Sair</a></li>
                </ul>

            </div>

            <a href="#" class="navbar-brand ms-lg-2">Módulo de Mensalidades</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Ano Letivo</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a href="" class="nav-link">Efetuar Abertura</a>
                                <a href="" class="nav-link">Efetuar Gestão</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Turmas</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a href="" class="nav-link">Adicionar Turmas</a>
                                <a href="" class="nav-link">Efetuar Gestão</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Matriculas</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <a href="" class="nav-link">Matricular Aluno</a>
                                <a href="" class="nav-link">Efetuar Gestão</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">Mensalidades</a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li class="dropdown-item">
                                <a href="" class="nav-link">Efetuar Pagamento</a>
                                <a href="" class="nav-link">Efetuar Gestão</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="geral d-flex justify-content-center flex-column w-100 mt-5">

       <div class=" m-auto mt-2 d-lg-flex flex-row w-75">
       <div class="card shadow contador">
            <div class="card-body">

                <div class="d-flex flex-row">
                <h2 class="card-title">0</h2>
                <img src="../midia/ano-letivo/2904859.png" class="info-home-icone">
                </div>

               <div class="form-group">
                <p class="card-subtitle">Ano Letivo</p>
                <a href="#" class="card-link">Visualizar</a>
               </div>
            </div>
         </div>

         <div class="card shadow contador">
            <div class="card-body">
            <div class="d-flex flex-row">
                <h2 class="card-title">0</h2>
                <img src="../midia/aluno/3413366.png" class="info-home-icone">
                </div>

               <div class="form-group">
                <p class="card-subtitle">Matriculas</p>
                <a href="#" class="card-link">Visualizar</a>
               </div>
            </div>
         </div>

         <div class="card shadow contador">
            <div class="card-body">
            <div class="d-flex flex-row">
                <h2 class="card-title">0</h2>
                <img src="../midia/pagamentos/mensa.png" class="info-home-icone">
                </div>

               <div class="form-group">
                <p class="card-subtitle">Mensalidades</p>
                <a href="#" class="card-link">Visualizar</a>
               </div>
            </div>
         </div>

         <div class="card shadow contador">
            <div class="card-body">
            <div class="d-flex flex-row">
                <h2 class="card-title">0</h2>
                <img src="../midia/usuario/user2.png" class="info-home-icone">
                </div>

               <div class="form-group">
                <p class="card-subtitle">Funcionários</p>
                <a href="../classes/usuario.php?usuarios" class="card-link">Visualizar</a>
               </div>
            </div>
         </div>
       </div>
      
       <div class="card shadow w-75 mt-3 m-auto">
        <div class="card-body">
            <div class="form-group col-md-12"></div>
            <h5 class="card-title text-center">Atividade Recente</h5>
            <hr>
        </div>
       </div>

    </div>

</body>

</html>