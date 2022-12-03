<?php
class HomeModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias";
        return $this->selectAll($sql);  //devolver el conjunto de datos
    }
    public function getNuevoProductos()
    {
        $sql = "SELECT * FROM repuesto ORDER BY idRepuesto DESC LIMIT 12";
        return $this->selectAll($sql);  //devolver el conjunto de datos
    }
}
 
?>