<?php 
class Conexion{
	protected $db;
	private $driver="mysql";
	private $host="localhost";
	private $bd="escoinfer";
	private $usuario="root";
	private $clave="";

public function __construct(){
	try{
		$db=new PDO("{$this->driver}: host={$this->host}; dbname={$this->bd}", $this->usuario, $this->clave);
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;

	}catch(PDOException $e){
		echo "No se pudo estabelecer la conexion con la base de datos". $e->getMessage();
		}
 	}
}

?>