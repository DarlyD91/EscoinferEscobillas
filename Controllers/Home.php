<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
        //session_destroy();
    }
    // funcion para la carga de las categorias y ver los productos nuevos
    public function index()
    {
        $data['title'] = 'Pagina Principal';
        $data['categorias'] = $this->model->getCategorias();
        $data['nuevoProductos'] = $this->model->getNuevoProductos();
        $this->views->getView('home', "index", $data);
    }
}