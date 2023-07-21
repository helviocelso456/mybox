<html>

<head>
    <link rel="stylesheet" href="../bootstrap-5.3.0-dist/css/bootstrap.css">
</head>

<?php
include "conexao.php";
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

class usuario
{
    private $conexao;

    public function __construct()
    {
        global $conexao;
        $this->conexao = $conexao->conexao;
    }

    public function efetuarLogin($dados)
    {   //validação do botão
        if (isset($_POST['btnEntrar'])) {
            //validação de campos
            if (empty($dados['user-mail']) && empty($dados['senha'])) {
                $_SESSION['msg'] = "<p class='alert alert-warning'>Preencha os dados</p>";
                header("location: ../login/index.php");
            } else if (empty($dados['user-mail']) || empty($dados['senha'])) {
                $_SESSION['msg'] = "<p class='alert alert-warning'>Preencha os dados</p>";
                header("location: ../login/index.php");
            } else {

                //consulta de registos
                $sql = "SELECT * FROM funcionario WHERE 
               usuario like :usuario or email like :email";

                $query = $this->conexao->prepare($sql);
                $query->bindParam(":usuario", $dados['user-mail']);
                $query->bindParam(":email", $dados['user-mail']);

                $query->execute();
                $row = $query->fetch(PDO::FETCH_ASSOC);

                $_SESSION['user-mail'] = $dados['user-mail'];
                $_SESSION['senha'] = $dados['senha'];

                //veriicação de Login

                if ($_SESSION['user-mail'] == $row['usuario'] || $_SESSION['user-mail'] == $row['email'] && $_SESSION['senha'] == $row['senha']) {
                    $_SESSION['login'] = $row['id'];
                    $_SESSION['username'] = $row['usuario'];
                    $_SESSION['nivelAcesso'] = $row['nivel_de_acesso'];
                    header("location:../home/index.php");
                } else {
                    $_SESSION['msg'] = "<p class='alert alert-danger text-center'>Credenciais Incorretas</p>";
                    header("location: ../login/index.php");
                }
            }
        }

        //final da função
    }

    public function cadastrarUsuario($dados)
    {   //validação do botão
        if (isset($_POST['btnCadastrar'])) {
            //validação de campos
            if (empty($dados['nome']) && empty($dados['email']) && empty($dados['usuario']) && empty($dados['senha'])) {
                $_SESSION['msg'] = "<p class='alert alert-warning text-center'>Preencha os campos</p>";
                header("location:../usuario/index.php");
            } else if (empty($dados['nome']) || empty($dados['email']) || empty($dados['usuario']) || empty($dados['senha'])) {
                $_SESSION['msg'] = "<p class='alert alert-warning text-center'>Preencha os campos</p>";
                header("location:../usuario/index.php");
            }

            //comandos para o registo
            else {
                //consulta para saber se o username esta em uso
                $sql = "SELECT * FROM funcionario WHERE usuario = :usuario";
                $query = $this->conexao->prepare($sql);
                $query->bindParam(":usuario", $dados['usuario']);
                $query->execute();

                if ($query->rowCount() > 0) {
                    $_SESSION['msg'] = "<p class='alert alert-warning text-center'>Username em Uso</p>";
                    header("location:../usuario/index.php");
                }
                //se ele não estiver em uso vai para esse else, e cai no sql
                else {

                    //comando sql para cadastrar
                    $sql = "INSERT INTO funcionario(nome,usuario,email,senha, nivel_de_acesso) VALUES(:nome, :usuario, :email, :senha, 'padrao')";
                    $query = $this->conexao->prepare($sql);
                    $query->bindParam(":nome", $dados['nome']);
                    $query->bindParam(":usuario", $dados['usuario']);
                    $query->bindParam(":email", $dados['email']);
                    $query->bindParam(":senha", $dados['senha']);
                    //condição caso a query execute
                    if ($query->execute()) {
                        $_SESSION['msg'] = "<p class='alert alert-success text-center'>Funcionário Adicionado</p>";
                        header("location:../usuario/index.php");
                    } else {
                        $_SESSION['msg'] = "<p class='alert alert-danger text-center'>Não foi Possível Adicionar um Novo Funcionário</p>";
                        header("location:../usuario/index.php");
                    }

                    //fim do else que manda pros comandos sql
                }

                //fim do else de consulta
            }

            //fim da validação
        }

        //fim da função
    }

    public function consulta()
    {   //validação da sessão
        if (isset($_GET['usuarios'])) {
            //consulta dos funcionários
            $sql = "SELECT * FROM funcionario";
            $query = $this->conexao->prepare($sql);
            if ($query->execute()) {   //valor atribuido a sessão
                //Att o metodo fetch nos retorna uma linha e fetchAll retorna todas as linhas da tabela
                $_SESSION['todosFuncionarios'] = $query->fetchAll(PDO::FETCH_ASSOC);
                header("location:../usuario/consultar.php");
            }
        }
    }

    public function pesquisar($dados)
    {
        if (isset($_POST['btnPesquisar'])) {
            $pesquisar = "%" . $dados['BarraPesquisa'] . "%";
            $sql = "SELECT * FROM funcionario WHERE 
            id like :id or nome like :nome or usuario like :usuario or email like :email 
            or nivel_de_acesso like :nivelAcesso";
            $query = $this->conexao->prepare($sql);
            $query->bindParam(":id", $pesquisar);
            $query->bindParam(":nome", $pesquisar);
            $query->bindParam(":usuario", $pesquisar);
            $query->bindParam(":email", $pesquisar);
            $query->bindParam(":nivelAcesso", $pesquisar);
            if ($query->execute()) {
                $_SESSION['botaoPesquisar'] = $_POST['btnPesquisar'];
                $_SESSION['pesquisarFuncionarios'] = $query->fetchAll(PDO::FETCH_ASSOC);
                header("location:../usuario/consultar.php");
                exit;
            }
        }
    }

    public function perfilUsuario()
    {   //validação da Sessão
        if (isset($_SESSION['login'])) {
            //comando sql
            $sql = "SELECT * FROM funcionario WHERE id = :id";
            $query = $this->conexao->prepare($sql);
            $query->bindParam(":id", $_SESSION['login']);
            if ($query->execute()) {
                //apos a query ser executada
                $_SESSION['perfilFuncionario'] = $query->fetch(PDO::FETCH_ASSOC);
                
            }
        } //fim da validação

        //fim da função
    }

    public function updatePerfil($dados)
    {  //validação do botão
        if (isset($_POST['btnUpdatePerfil'])) {

            $row = $_SESSION['perfilFuncionario'];

            //validação caso os campos estejam vazios
            if (!empty($dados['nome'])) {
                $nome = $dados['nome'];
            } else {
                $nome = $row['nome'];
            }

            if (!empty($dados['usuario'])) {
                $usuario = $dados['usuario'];
            } else {
                $usuario = $row['usuario'];
            }

            if (!empty($dados['email'])) {
                $email = $dados['email'];
            } else {
                $email = $row['email'];
            }

            if (!empty($dados['senha'])) {
                $senha = $dados['senha'];
            } else {
                $senha = $row['senha'];
            }

            //validação do usuario
            $sql2 = "SELECT COUNT(*) AS total FROM funcionario 
            WHERE usuario = :user AND usuario != :usuario";
            $query2 = $this->conexao->prepare($sql2);
            $query2->bindParam(":user", $dados['usuario']);
            $query2->bindParam(":usuario", $_SESSION['username']);
            $query2->execute();
            $contador = $query2->fetch(PDO::FETCH_ASSOC);
            if ($contador['total'] > 0) {
                $_SESSION['msg'] = "<p class='alert alert-warning'>Username em Uso</p>";
                header("location:../usuario/perfil.php");
            } else {
                //update do funcionario
                $sql2 = "UPDATE funcionario SET nome = :nome, usuario = 
                :usuario, email = :email, senha = :senha WHERE id = :id";
                $query2 = $this->conexao->prepare($sql2);
                $query2->bindParam(":id", $_SESSION['login']);
                $query2->bindParam(":nome", $nome);
                $query2->bindParam(":usuario", $usuario);
                $query2->bindParam(":email", $email);
                $query2->bindParam(":senha", $senha);

                //update da sessão de valores exibidos
                $sql3 = "SELECT * FROM funcionario WHERE id = :id";
                $query3 = $this->conexao->prepare($sql3);
                $query3->bindParam(":id", $_SESSION['login']);

                if ($query2->execute() && $query3->execute()) {
                    $_SESSION['msg'] = "<p class='alert alert-success'>Alterações Efetuadas</p>";
                    $row2 = $query3->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['perfilFuncionario'] = $row2;
                    header("location:../usuario/perfil.php");
                } else {
                    $_SESSION['msg'] = "<p class='alert alert-danger'>Não foi Possivel Efetuar as Alterações</p>";
                    header("location:../usuario/perfil.php");
                }
            }

            //fim da validação de botão
        }

        //fim da função
    }

    public function telaUpdate()
    {      //validação do GET
        if (isset($_GET['usuario'])) {
            //consulta dos registos
            $sql = "SELECT * FROM funcionario WHERE usuario = :usuario";
            $query = $this->conexao->prepare($sql);
            $query->bindParam(":usuario", $_GET['usuario']);
            if ($query->execute()) {
                 
                $_SESSION['consultaUsuarioGET'] = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['usuarioGET'] = $_GET['usuario'];
                header("location:../usuario/update.php");
            }
            //fim da validação
        }

        //fim da função
    }

    public function update($dados)
    {
        if(isset($_POST['btnUpdateFuncionario']) && !empty($_SESSION['consultaUsuarioGET']))
        {    //consulta de valores
            $comando = "SELECT * FROM funcionario WHERE usuario = :user";
            $envio = $this->conexao->prepare($comando);
            $envio->bindParam(":user", $_SESSION['usuarioGET']);
            $envio->execute();
            $consulta = $envio->fetch(PDO::FETCH_ASSOC);
            //validação de campos

            if(isset($dados['nome']))
            {
                $nome = $dados['nome'];
            } else{
                $nome = $consulta['nome'];
            }

            if(isset($dados['usuario']))
            {
                $usuario = $dados['usuario'];
            } else{
                $usuario = $consulta['usuario'];
            }

            if(isset($dados['email']))
            {
                $email = $dados['email'];
            } else{
                $email = $consulta['email'];
            }

            if(isset($dados['senha']))
            {
                $senha = $dados['senha'];
            } else{
                $senha = $consulta['senha'];
            }
            
            //update dos dados
            $sql = "UPDATE funcionario SET nome = :nome, 
            usuario = :usuario, email = :email, senha = :senha
            WHERE usuario = :user";

            $query = $this->conexao->prepare($sql);
            $query->bindParam(":user", $_SESSION['usuarioGET']);
            $query->bindParam(":nome", $nome);
            $query->bindParam(":usuario", $usuario);
            $query->bindParam(":email", $email);
            $query->bindParam(":senha", $senha);

            if($query->execute())
            {
                $_SESSION['msg'] = "<p class='alert alert-success'>Alterações Efetuadas</p>";
                $_SESSION['usuarioGET'] = $usuario;
                header("location:usuario.php?usuario=$_SESSION[usuarioGET]");
            } else{
                $_SESSION['msg'] = "<p class='alert alert-danger'>Não foi possível efetuar as alterações</p>";
                header("location:../usuario/update.php");
            }
           //fim da validação
        }

        //fim da função
    }


    public function __destruct()
    {
        $this->conexao = null;
    }
}

$usuario = new usuario();
$usuario->efetuarLogin($dados);
$usuario->cadastrarUsuario($dados);
$usuario->consulta();
$usuario->pesquisar($dados);
$usuario->perfilUsuario();
$usuario->updatePerfil($dados);
$usuario->telaUpdate();
$usuario->update($dados);

?>


</html>