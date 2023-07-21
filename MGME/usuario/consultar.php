<?php
include "../classes/geral.php";
protetor();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css-->
    <link rel="stylesheet" href="../arquivos-gerais/styles.css">
    <link rel="stylesheet" href="../bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <!--js-->
    <script src="../bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
    <title>Funcionários</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container-fluid">

            <div class="dropdown">
                <button type="button" class="icone-perfil" data-bs-toggle="dropdown"></button>
                <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="perfil.php" class="nav-link">Meu Perfil</a></li>
                    <li class="dropdown-item"><a href="index.php" class="nav-link">Adicionar Funcionário</a></li>
                    <li class="dropdown-item"><a href="../classes/logout.php" class="nav-link">Sair</a></li>
                </ul>

            </div>

            <a href="../home/index.php" class="navbar-brand ms-lg-2">Módulo de Mensalidades</a>

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

    <form action="../classes/usuario.php" method="post" class="w-100 mt-5">
        <div class="card shadow table-responsive w-75 m-auto">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" name="BarraPesquisa" placeholder="Pesquisar">
                    </div>

                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-success w-100 pesquisar" name="btnPesquisar">
                            <img src="../midia/sistema/lupa.png" class="imagem">
                        </button>
                    </div>

                </div>

                <div class="form-group col-md-12">
                    <hr>
                </div>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Cod. Funcionário</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Nível de Acesso</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php mostrarFuncionario(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>

</body>

</html>