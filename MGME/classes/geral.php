<html>

<head>
  <link rel="stylesheet" href="../arquivos-gerais/styles.css">
  <link rel="stylesheet" href="../bootstrap-5.3.0-dist/css/bootstrap.css">
  <link rel="shortcut icon" href="../midia/favicon/unilifeSem.ico" type="image/x-icon">
</head>

<?php
session_start();
function mensagem()
{
  if (isset($_SESSION['msg'])) {
    echo "<div class='w-75 mt-3 mb-3 m-auto shadow'>";
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo "</div>";
  }
}

function mensagemLogin()
{
  if (isset($_SESSION['msg'])) {
    echo "<div class='w-100 mt-3 m-auto'>";
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo "</div>";
  }
}

function protetor() 
{
  if (!isset($_SESSION['login'])) {
    header("location:../login/index.php");
  }
}

if (isset($_SESSION['perfilFuncionario'])) {
  $perfilUsuario = $_SESSION['perfilFuncionario'];
}

if (isset($_SESSION['todosFuncionarios'])) {
  function mostrarFuncionarios()
  {
    $funcionario = $_SESSION['todosFuncionarios'];
    /*trocou se o while pelo foreach pois o while precisa  de uma 
      condição que a cada iteração avalie se é verdeira ou falsa*/
    //já o foreach é mais viavel para a atribuição de arrays como esse.
    foreach ($funcionario as $funcionarios) {
      echo "<tr>";
      echo "<td>" . $funcionarios['id'] . "</td>";
      echo "<td>" . $funcionarios['nome'] . "</td>";
      echo "<td>" . $funcionarios['usuario'] . "</td>";
      echo "<td>" . $funcionarios['email'] . "</td>";
      echo "<td>" . $funcionarios['nivel_de_acesso'] . "</td>";
      echo "<td>
        <div class='btn-group col-md-12'>
          <a href='../classes/usuario.php?usuario=$funcionarios[usuario]' class='btn btn-primary botao'>
          <img src='../midia/sistema/lapis.png' class='imagem mt-1'>
          </a>

          <a href='#' class='btn btn-danger botao'>
           <img src='../midia/sistema/lixo.png' class='imagem mt-1'>
          </a>
        </div>
        </td>";
      echo "</tr>";
    }
  }
}

if (isset($_SESSION['pesquisarFuncionarios'])) {
  function pesquisarFuncionario()
  {
    $funcionarioB = $_SESSION['pesquisarFuncionarios'];
    foreach ($funcionarioB as $funcionariosB) {
      echo "<tr>";
      echo "<td>" . $funcionariosB['id'] . "</td>";
      echo "<td>" . $funcionariosB['nome'] . "</td>";
      echo "<td>" . $funcionariosB['usuario'] . "</td>";
      echo "<td>" . $funcionariosB['email'] . "</td>";
      echo "<td>" . $funcionariosB['nivel_de_acesso'] . "</td>";
      echo "<td>
        <div class='btn-group col-md-12'>
          <a href='../classes/usuario.php?usuario=$funcionariosB[usuario]' class='btn btn-primary botao'>
          <img src='../midia/sistema/lapis.png' class='imagem mt-1'>
          </a>

          <a href='#' class='btn btn-danger botao'>
           <img src='../midia/sistema/lixo.png' class='imagem mt-1'>
          </a>
        </div>
        </td>";
      echo "</tr>";

      
    }
  }
}

function protetorUpdate() 
{
  if (!isset($_SESSION['login'])) {
    header("location:../login/index.php");
  } 
  
   else if (!isset($_SESSION['consultaUsuarioGET']))
    {
       header("location:../usuario/consultar.php");
    } 

}

function mostrarFuncionario()
{
  if (isset($_SESSION['botaoPesquisar'])) {
    pesquisarFuncionario();
  } else {
     mostrarFuncionarios();
  }
}

if(isset($_SESSION['consultaUsuarioGET']))
{  
   $dadosFuncionario = $_SESSION['consultaUsuarioGET'];
}

?>

</html>