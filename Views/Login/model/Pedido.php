<?php 
require_once('Conexion.php');

class pedido extends conexion{

  public function __construct(){
    $this->db=parent::__construct();
  }

  public function agregar($idUsuario, $nombreUsuario, $apellidoUsuario, $rolUsuario, $documentoUsuario, $direccionUsuario, $correoUsuario, $passwordUsuario, $telefonoUsuario, $estadoUsuario, $perfil){
    $agregar=$this->db->prepare("INSERT INTO  usuario(idUsuario, nombreUsuario, apellidoUsuario, rolUsuario, documentoUsuario, direccionUsuario, correoUsuario, passwordUsuario, telefonoUsuario, estadoUsuario, perfil) VALUES (:idUsuario, :nombreUsuario, :apellidoUsuario, :rolUsuario, :documentoUsuario, :direccionUsuario, :correoUsuario, :passwordUsuario, :telefonoUsuario, :estadoUsuario, :perfil);");
    $agregar->bindparam(':idUsuario', $idUsuario);
    $agregar->bindparam(':nombreUsuario', $nombreUsuario);
    $agregar->bindparam(':apellidoUsuario', $apellidoUsuario);
    $agregar->bindparam(':rolUsuario', $rolUsuario);
    $agregar->bindparam(':documentoUsuario', $documentoUsuario);
    $agregar->bindparam(':direccionUsuario', $direccionUsuario);
    $agregar->bindparam(':correoUsuario', $correoUsuario);
    $agregar->bindparam(':passwordUsuario', $passwordUsuario);
    $agregar->bindparam(':telefonoUsuario', $telefonoUsuario);
    $agregar->bindparam(':estadoUsuario', $estadoUsuario);
    $agregar->bindparam(':perfil', $perfil);
    
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
    $mostrar=$this->db->prepare("SELECT * FROM pedido WHERE idUsuario=:idUsuario;");
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
}
  