<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }
    public function getProducto($id_producto)
    {
        $sql = "SELECT p.*, c.categoria FROM repuesto p INNER JOIN categorias c ON p.id_categoria = c.id WHERE p.idRepuesto = $id_producto";
        return $this->select($sql); //seleccionar varios elementos a las vez
    }
    //paginacion
    public function getProductos($desde, $porPagina)
    {
        $sql = "SELECT * FROM repuesto LIMIT $desde, $porPagina";
        return $this->selectAll($sql); //devolver el conjunto de datos
    }
    //obtener total productos
    public function getTotalProductos()
    {
        $sql = "SELECT COUNT(*) AS total FROM repuesto";
        return $this->select($sql); //seleccionar varios elementos a las vez
    }
    //productos relacionados por categoria
    public function getProductosCat($id_categoria, $desde, $porPagina)
    {
        $sql = "SELECT * FROM repuesto WHERE id_categoria = $id_categoria LIMIT $desde, $porPagina";
        return $this->selectAll($sql);  //devolver el conjunto de datos
    }
    //obtener total productos relacionados con la categoria
    public function getTotalProductosCat($id_categoria)
    {
        $sql = "SELECT COUNT(*) AS total FROM repuesto WHERE id_categoria = $id_categoria";
        return $this->select($sql); //seleccionar varios elementos a las vez
    }
    //productos relacionados aleatorios
    public function getAleatorios($id_categoria, $id_producto)
    {
        $sql = "SELECT * FROM repuesto WHERE id_categoria = $id_categoria AND idRepuesto != $id_producto ORDER BY rand() LIMIT 20";
        return $this->selectAll($sql);  //devolver el conjunto de datos
    }
    //Busqueda de productos
    public function getBusqueda($valor)
    {
        $sql = "SELECT * FROM repuesto WHERE nombreRepuesto LIKE '%".$valor."%' LIMIT 10";
        return $this->selectAll($sql); //seleccionar varios elementos a las vez
    }
    
}
 
?>