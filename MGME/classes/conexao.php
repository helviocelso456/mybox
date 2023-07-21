<html>
<header>
    <link rel="stylesheet" href="../bootstrap-5.3.0-dist/css/bootstrap.css">
</header>

<?php
include_once "geral.php";

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'modulo_gestao';

class conexao
{
    public $conexao;

    public function __construct($servername, $username, $password, $dbname)
    {
        $dsn = "mysql:host=$servername; dbname=$dbname; charset=utf8mb4";

        try {
            $this->conexao = new PDO($dsn, $username, $password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "erro de conexão " . $e->getMessage();
        }
    }
}

$conexao = new conexao($servername, $username, $password, $dbname);
header("location:../home/index.php");

?>

</html>