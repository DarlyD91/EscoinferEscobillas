<?php

include("../../Config/App/Conexion.php");
$con=conectar();

//Sentencia para actualizar repuestos a la base de datos
$id=$_POST['idRepuesto'];
$nombreRepuesto=$_POST['nombreRepuesto'];
$descripcionRepuesto=$_POST['descripcionRepuesto'];
$precioUnidad=$_POST['precioUnidad'];
$id_categoria=$_POST['id_categoria'];

$sql="UPDATE repuesto SET nombreRepuesto='$nombreRepuesto', descripcionRepuesto='$descripcionRepuesto',precioUnidad='$precioUnidad', id_categoria='$id_categoria' WHERE idRepuesto='$id'";
$query=mysqli_query($con,$sql);

if($query){
    Header("Location: ../../Views/pagesG/listar.php");
}else {
    
}
?>