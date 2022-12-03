<?php
class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    //Funcion para la sesion del cliente y redirigir
    public function index()
    {
        if (!empty($_SESSION['correoUsuario'])) {
            header('Location: ' . BASE_URL);
        }
        $data['title'] = 'Tu perfil';
        $this->views->getView('principal', "perfil", $data);
    }
    //registrar pedidos
    public function registrarPedido()
    {
        $datos = file_get_contents('php://input'); //recibir por la entrada un string
        $json = json_decode($datos, true); //decodificar el string en json
        $pedidos = $json['pedidos'];
        $productos = $json['productos'];

        if (is_array($pedidos) && is_array($productos)) { //verificar si el json es igual a un array
            $id_transaccion = $pedidos['id'];
            $Valor = $pedidos['purchase_units'][0]['amount']['value'];
            $estado = $pedidos['status'];
            $fecha = date('Y-m-d H:i:s');
            $email = $pedidos['payer']['email_address'];
            $nombre = $pedidos['payer']['name']['given_name'];
            $apellido = $pedidos['payer']['name']['surname'];
            $direccion = $pedidos['purchase_units'][0]['shipping']['address']['address_line_1'];
            $ciudad = $pedidos['purchase_units'][0]['shipping']['address']['admin_area_2'];
            $email_user = $_SESSION['correoUsuario'];
            $data = $this->model->registrarPedido(
                $id_transaccion,
                $Valor,
                $estado,
                $fecha,
                $email,
                $nombre,
                $apellido,
                $direccion,
                $ciudad,
                $email_user
            );
            if ($data > 0) {
                foreach ($productos as $producto) {
                    $temp = $this->model->getProducto($producto['idProducto']);
                    $this->model->registrarDetalle($temp['nombreRepuesto'], $temp['precioUnidad'], $producto['cantidad'],$temp['idRepuesto'], $data);
                }
                $mensaje = array('msg' => 'pedido registrado','icono' => 'success');
            } else {
                $mensaje = array('msg' => 'error al registrar el pedido','icono' => 'error');
            }
            
        }else{
            $mensaje = array('msg' => 'error fatal con los datos','icono' => 'error');
        }
        echo json_encode($mensaje);
        die();
    }
    public function salir()
    {
        session_destroy();
        header('Location: '. BASE_URL);
    }
}
