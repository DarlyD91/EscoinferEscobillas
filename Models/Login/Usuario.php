<?php 
require_once('../../Config/App/Conexionn.php');

class usuario extends conexionn{

  public function __construct(){
    $this->db=parent::__construct();
  }

  public function agregar($nombreUsuario, $apellidoUsuario, $documentoUsuario, $direccionUsuario, $correoUsuario, $passwordUsuario, $telefonoUsuario){
    $agregar=$this->db->prepare("INSERT INTO  usuario(nombreUsuario, apellidoUsuario, documentoUsuario, direccionUsuario, correoUsuario, passwordUsuario, telefonoUsuario) VALUES (:nombreUsuario, :apellidoUsuario, :documentoUsuario, :direccionUsuario, :correoUsuario, :passwordUsuario, :telefonoUsuario);");
    $agregar->bindparam(':nombreUsuario', $nombreUsuario);
    $agregar->bindparam(':apellidoUsuario', $apellidoUsuario);
    $agregar->bindparam(':documentoUsuario', $documentoUsuario);
    $agregar->bindparam(':direccionUsuario', $direccionUsuario);
    $agregar->bindparam(':correoUsuario', $correoUsuario);
    $agregar->bindparam(':passwordUsuario', $passwordUsuario);
    $agregar->bindparam(':telefonoUsuario', $telefonoUsuario);
    
    if($agregar->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function consultar(){
    $rows=null;
    $mostrar=$this->db->prepare(" SELECT *FROM usuario ORDER BY rolUsuario;");
    $mostrar->execute();
    while($result=$mostrar->fetch()){
      $rows[]=$result;
    }
    return $rows;
  }

  public function consultarxid($idUsuario){
    $rows=null;
    $mostrar=$this->db->prepare("SELECT * FROM usuario WHERE idUsuario=:idUsuario;");
    $mostrar->bindparam(':idUsuario', $idUsuario);
    $mostrar->execute();
    while($result=$mostrar->fetch()){
      $rows[]=$result;
    }
    return $rows;
  }

  public function TraerID(){
    $rows=null;
    $mostrar=$this->db->prepare("SELECT IdUsuario FROM usuario order by IdUsuario desc limit 1;");
    $mostrar->execute();
    while($result=$mostrar->fetch()){
      $rows[]=$result;
    }
    return $rows;
  }

  public function verAdm($idUsuario){
    $rows=null;
    $mostrar=$this->db->prepare("SELECT * FROM usuario AS us JOIN Administrador AS ad ON us.idUsuario=ad.idUsuario_FK WHERE idUsuario=:idUsuario;");
    $mostrar->bindparam(':idUsuario', $idUsuario);
    $mostrar->execute();
    while($result=$mostrar->fetch()){
      $rows[]=$result;
    }
    return $rows;
  }

  public function verCli($idUsuario){
    $rows=null;
    $mostrar=$this->db->prepare("SELECT * FROM usuario AS us JOIN Cliente AS cl ON us.idUsuario=cl.idUsuario_FK WHERE idUsuario=:idUsuario;");
    $mostrar->bindparam(':idUsuario', $idUsuario);
    $mostrar->execute();
    while($result=$mostrar->fetch()){
      $rows[]=$result;
    }
    return $rows;
  }

  public function verCaj($idUsuario){
    $rows=null;
    $mostrar=$this->db->prepare("SELECT * FROM usuario AS us JOIN Cajero AS cj ON us.idUsuario=cj.idUsuario_FK JOIN TipoDoc AS tp ON cj.idTipoDoc_FK=tp.idTipoDoc WHERE idUsuario=:idUsuario;");
    $mostrar->bindparam(':idUsuario', $idUsuario);
    $mostrar->execute();
    while($result=$mostrar->fetch()){
      $rows[]=$result;
    }
    return $rows;
  }

  public function actualizar($idUsuario, $nombreUsuario, $correoUsuario, $passworUsuario, $rolUsuario){
    $editar=$this->db->prepare("UPDATE usuario SET idUsuario=:idUsuario, nombreUsuario=:nombreUsuario, correoUsuario=:correoUsuario, passworUsuario=:passworUsuario, rolUsuario=:rolUsuario WHERE idUsuario=:idUsuario");
    $editar->bindparam(':idUsuario', $idUsuario);
    $editar->bindparam(':nombreUsuario', $nombreUsuario);
    $editar->bindparam(':correoUsuario', $correoUsuario);
    $editar->bindparam(':passworUsuario', $passworUsuario);
    $editar->bindparam(':rolUsuario', $rolUsuario);
    if($editar->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function delete($id){
    $rows=null;
    $eliminar=$this->db->prepare("DELETE FROM usuario WHERE idUsuario=:id");
    $eliminar->bindparam(':id', $id);
    $eliminar->execute();
    if($eliminar->execute()){
      return true;
    }else{
      return false;
    }
  }

  public function validar($correoUsuario, $passwordUsuario){
  $sentencia=$this->db->prepare("SELECT * FROM usuario WHERE correoUsuario=:correoUsuario AND passwordUsuario=:passwordUsuario;");
    $sentencia->bindparam(':correoUsuario',$correoUsuario);
    $sentencia->bindparam(':passwordUsuario',$passwordUsuario);

    $sentencia->execute();

    if ($sentencia->rowCount()==1) {
      return true;
    }else{
      return false;
    }
  }

  public function validarCorreo($correoUsuario){
    $sentencia=$this->db->prepare("SELECT * FROM usuario WHERE correoUsuario=:correoUsuario");
      $sentencia->bindparam(':correoUsuario',$correoUsuario);
      $sentencia->execute();
  
      if ($sentencia->rowCount()==1) {
        return true;
      }else{
        return false;
      }
    }

  public function validarUsuario($nombreUsuario){
    $sentencia=$this->db->prepare("SELECT * FROM usuario WHERE nombreUsuario=:nombreUsuario");
      $sentencia->bindparam(':nombreUsuario',$nombreUsuario);
      $sentencia->execute();
      
      if ($sentencia->rowCount()==1) {
        return true;
      }else{
        return false;
      }
  }

  public function dinamic($id, $estado){
    $dinamic=$this->db->prepare("UPDATE usuario SET estadoUsuario=:estado WHERE idUsuario=:id");
      $dinamic->bindparam(':id',$id);
      $dinamic->bindparam(':estado',$estado);

      $dinamic->execute();
  
      if ($dinamic->execute()) {
        return true;
      }else{
        return false;
      }
    }

    public function TraerIDCl($correoUsuario){
      $rows=null;
      $mostrar=$this->db->prepare("SELECT u.idUsuario, c.idCliente FROM usuario as u join Cliente as c on u.idUsuario=c.idUsuario_FK WHERE correoUsuario=:correoUsuario;");
      $mostrar->bindparam(':correoUsuario', $correoUsuario);
      $mostrar->execute();
      while($result=$mostrar->fetch()){
        $rows[]=$result;
      }
      return $rows;
    }

    public function TraerIDCj($correoUsuario){
      $rows=null;
      $mostrar=$this->db->prepare("SELECT u.idUsuario, c.idCajero FROM usuario as u join Cajero as c on u.idUsuario=c.idUsuario_FK WHERE correoUsuario=:correoUsuario;");
      $mostrar->bindparam(':correoUsuario', $correoUsuario);
      $mostrar->execute();
      while($result=$mostrar->fetch()){
        $rows[]=$result;
      }
      return $rows;
    }

    public function TraerIDAd($correoUsuario){
      $rows=null;
      $mostrar=$this->db->prepare("SELECT u.idUsuario, a.idAdministrador FROM usuario as u join Administrador as a on u.idUsuario=a.idUsuario_FK WHERE correoUsuario=:correoUsuario;");
      $mostrar->bindparam(':correoUsuario', $correoUsuario);
      $mostrar->execute();
      while($result=$mostrar->fetch()){
        $rows[]=$result;
      }
      return $rows;
    }


    public function TraerUsuario($correoUsuario){
      $rows=null;
      $mostrar=$this->db->prepare("SELECT * FROM usuario WHERE correoUsuario=:correoUsuario;");
      $mostrar->bindparam(':correoUsuario', $correoUsuario);
      $mostrar->execute();
      while($result=$mostrar->fetch()){
        $rows[]=$result;
      }
      return $rows;
    }

}
?>