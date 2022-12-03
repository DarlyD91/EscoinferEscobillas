<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
    }
    //vista about para ver la vista about
    public function about()
    {
        $data['title'] = 'Nuestro Equipo';
        $this->views->getView('principal', "about", $data);
    }
    //vista de carga para el login
    public function login()
    {
        $this->views->getView('principal', "index");
    }
    //vista de carga para los clientes
    public function clientes()
    {
        $this->views->getView('principal', "cliente");
    }
    public function gerente()
    {
        $this->views->getView('principal', "gerente");
    }

    //carga del vista perfil 
    public function perfil()
    {
        $this->views->getView('perfil', "perfil");
    }
    //vista productos
    public function shop($page)
    {
        $pagina = (empty($page)) ? 1 : $page;  //funcionamiento del por pagina
        $porPagina = 20;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestros Productos';  
        $data['productos'] = $this->model->getProductos($desde, $porPagina);  //carga de los productos 
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos(); //invocar la funcion del modelo
        $data['total'] = ceil($total['total'] / $porPagina);    //mostrar el total de productos en el porpagina
        $this->views->getView('principal', "shop", $data);      //carga de vista productos
    }
    //vista detalles
    public function detail($id_producto)
    {
        $data['producto'] = $this->model->getProducto($id_producto);    //carga de los productos especifico
        $id_categoria = $data['producto']['id_categoria'];  //mostrar productos que pertenescan a la misma categoria
        $data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['idRepuesto']);    //mostrar los productos relacionados
        $data['title'] = $data['producto']['nombreRepuesto'];   //cargar el nombre del repuesto
        $this->views->getView('principal', "detail", $data);    //cargar la vista detalle
    }
    
    //vista categorias
    public function categorias($datos)
    {
        $id_categoria = 1;  //mostrar categoria 
        $page = 1;     //paginacion
        $array = explode(',', $datos);  //convertir el string en array
        if (isset($array[0])) {
            if (!empty($array[0])) {        //recorrer el array
                $id_categoria = $array[0];
            }
        }
        if (isset($array[1])) {         //recorrer el array devolver verdadero
            if (!empty($array[1])) {    //Determinar si la variable se encuentra vacia
                $page = $array[1];
            }
        }
        $pagina = (empty($page)) ? 1 : $page;    //invocar el por pagina en las categorias
        $porPagina = 20;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria); //mostrar productos totales por categorias
        $data['total'] = ceil($total['total'] / $porPagina);    //devolver el por pagina

        $data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $porPagina);  //seleccionar los productos por categoria
        $data['title'] = 'categorias';
        $data['id_categoria'] = $id_categoria;
        $this->views->getView('principal', "categorias", $data);    //cargar la vista
    }

    /*Carrito de compras*/
    public function listaProductos()
    {
        $datos = file_get_contents('php://input');  // transmitir el contenido de un fichero a una cadena
        $json = json_decode($datos, true);  //Devuelve el valor codificado en json en un tipo de PHP apropiado
        $array['productos'] = array();     //recorrer el array indicando los porductos
        $total = 0.00;
        if (!empty($json)) {
            foreach ($json as $producto) {        
                $result = $this->model->getProducto($producto['idProducto']);      //seleccionar los productos
                $data['id'] = $result['idRepuesto'];        //traer los datos registrados en la base por medio del modelo
                $data['nombre'] = $result['nombreRepuesto'];
                $data['precio'] = $result['precioUnidad'];
                $data['cantidad'] = $producto['cantidad'];
                $data['imagen'] = $result['imagen'];
                $SubTotal = $result['precioUnidad'] * $producto['cantidad'];
                $data['SubTotal'] = number_format($SubTotal, 2);   //numeros decimales al final 
                array_push($array['productos'], $data);  //agregar productos al array
                $total += $SubTotal;
            }
        }
        
        $array['total'] = number_format($total, 2); //numeros decimales al final 
        $array['totalPaypal'] = number_format($total, 2, '.', ''); //total en la app paypal
        $array['moneda'] = MONEDA;  //para mostrar en la vista
        echo json_encode($array, JSON_UNESCAPED_UNICODE);   //convertir a un string
        die();
    }
    //cargar la vista cliente
    public function cliente()
    {
        $data['title'] = 'Tu carrito de compras';
        $this->views->getView('principal', "perfil", $data);
    }
    public function busqueda($valor)
    {
        $data = $this->model->getBusqueda($valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);   //convertir a un string
        die();
    }
    
}
