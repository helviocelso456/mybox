<?php
include "../classes/geral.php";
protetorUpdate();

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
    <title>Atualizar Informações</title>
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
        <?php mensagem(); ?>
        <div class="d-flex flex-column  w-100 mt-5">
            <div class="card shadow w-75 m-auto">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <div class=" m-auto icone-usuario"></div>
                        <h5 class="card-title text-center mt-1"><?php echo $dadosFuncionario['nome']; ?></h5>
                        <hr>
                        <p class="card-text"><strong>Usuário</strong>: <?php echo $dadosFuncionario['usuario']; ?></p>
                        <p class="card-text"><strong>E-Mail</strong>: <?php echo $dadosFuncionario['email']; ?></</p>
                        <p class="card-text"><strong>Nível de Acesso</strong>: <?php echo $dadosFuncionario['nivel_de_acesso']; ?></</p>
                        <a class="btn btn-primary w-100" href="../classes/usuario.php?usuarios">Visualizar Funcionários</a>
                    </div>
                </div>
            </div>

            <div class="card shadow w-75 mt-3 m-auto">
                <div class="card-body">
                   <div class="form-group col-md-12">
                    <h5 class="card-title text-center">Efetuar Alterações</h5>
                    <hr>
                    <input type="text" class="form-control" name="nome" placeholder="Nome do Usuário">
                    <input type="text" class="form-control" name="usuario" placeholder="Usuário">
                    <input type="email" class="form-control" name="email" placeholder="E-Mail">
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                    <button type="submit" class="btn btn-success w-100" name="btnUpdateFuncionario">Efetuar Alterações</button>
                   </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>