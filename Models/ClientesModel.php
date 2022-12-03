<?php
class ClientesModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    // funcion para registrar el pedido
    public function registrarPedido($id_transaccion, $Valor, $estado, $fecha, 
    $email, $nombre, $apellido, $direccion, $ciudad, $email_user)
    {
        $sql = "INSERT INTO pedido (id_transaccion, Valor, estado, fechaPedido, email, nombre, apellido, direccion, ciudad, email_user) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $datos = array($id_transaccion, $Valor, $estado, $fecha, $email, $nombre, $apellido, $direccion, $ciudad, $email_user);
        $data = $this->insertar($sql, $datos);
        if ($data > 0) {
            $res = $data;
        }else{
            $res = 0;
        }
        return $res;
    }
    public function getProducto($id_producto)
    {
        $sql = "SELECT * FROM repuesto WHERE idRepuesto = $id_producto";
        return $this->select($sql); //seleccionar varios elementos a las vez
    }
    public function registrarDetalle($producto,$precio,$cantidad,$id_Repuesto, $id_pedido){
        $sql = "INSERT INTO detalle (nombreRepuesto, precio, cantidadProducto, idRepuesto, idPedido) VALUES (?,?,?,?,?)";
        $datos = array($producto,$precio,$cantidad,$id_Repuesto,$id_pedido);
        $data = $this->insertar($sql, $datos);
        if ($data > 0) {
            $res = $data;
        }else{
            $res = 0;
        }
        return $res;
    }

}
 
?>