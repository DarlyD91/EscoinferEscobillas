<?php

include("../../Config/App/Conexion.php");
$con=conectar();

//Sentencia para actualizar repuestos a la base de datos
$id=$_POST['id'];
$categoria=$_POST['categoria'];

$sql="UPDATE categorias SET categoria='$categoria' WHERE id='$id'";
$query=mysqli_query($con,$sql);

if($query){
    Header("Location: ../../Views/pagesG/listarC.php");
}else {
    
}