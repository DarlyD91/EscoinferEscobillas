<?php
    include("../../Config/App/Conexion.php");
    $con=conectar();

//Desactivar el estado del repuesto
if (isset($_GET['idRepuesto'])){
        $idRepuesto=$_GET['idRepuesto'];
        $sql="UPDATE repuesto SET estadoRepuesto=0 WHERE idRepuesto='$idRepuesto'";
        mysqli_query($con,$sql);
    }
  
    Header("Location: ../../Views/pagesG/listar.php");
?>