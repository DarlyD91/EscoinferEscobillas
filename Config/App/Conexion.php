<?php
class Conexion{
    private $conect;
    public function __construct()
    {
        $pdo = "mysql:host=".HOST.";dbname=".DB.";".CHARSET;
        try {
            $this->conect = new PDO($pdo, USER, PASS);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexion".$e->getMessage();
        }
    }
    public function conect()
    {
        return $this->conect;
    }
}

function conn(){
    $hostname = "localhost";
    $usuariodb = "root";
    $passworddb = "";
    $dbname = "escoinfer";

    //se genera la conexion al servidor
    $conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar;
}
?>

<?php
$conexion=new mysqli("localhost", "root", "", "escoinfer");
$conexion->set_charset("utf8");

?>

<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";

    $bd="escoinfer1";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>
