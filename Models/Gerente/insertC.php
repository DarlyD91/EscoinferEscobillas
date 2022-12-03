<?php
include("../../Config/App/Conexion.php");
$con=conectar();

$categoria=$_POST['categoria'];

$sql="INSERT INTO categorias VALUES('','$categoria', '')";

$verificar=mysqli_query($con, "SELECT * FROM categorias WHERE categoria='$categoria' ");

if(mysqli_num_rows($verificar) > 0){
    echo
    '<script>
    alert("Esta categoria ya existe");
    window.location = " ../../Views/pagesG/registrarC.php";
    </script>';
    exit();
}else {
}

$query=mysqli_query($con,$sql);


if($query){
    Header("Location: ../../Views/pagesG/listarC.php");
}else {
}

mysqli_close($con);
?>
