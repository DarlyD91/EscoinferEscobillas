<?php
include("../../Config/App/Conexion.php");
$con=conectar();

$idRepuesto=$_POST['idRepuesto'];
$nombreRepuesto=$_POST['nombreRepuesto'];
$descripcionRepuesto=$_POST['descripcionRepuesto'];
$precioUnidad=$_POST['precioUnidad'];
$estadoRepuesto=$_POST['estadoRepuesto'];
$imagen=$_FILES['imagen']['name'];
$id_categoria=$_POST['id_categoria'];

$sql="INSERT INTO repuesto VALUES('','$nombreRepuesto','$descripcionRepuesto','$precioUnidad','$estadoRepuesto','$imagen','$id_categoria')";


    if(isset($_FILES["imagen"])){
        $nombre = $_FILES["imagen"]["name"];
        $temporal=$_FILES["imagen"]["tmp_name"];
        $carpeta="../../Views/assets3/img/escoinfer/Uploads/";
        
        $movefile=move_uploaded_file($temporal, $carpeta .$nombre);
			
			if ($movefile) {
				echo "Se movio";
			}else{
				echo "No se movio";
			}
    }

    

$verificar=mysqli_query($con, "SELECT * FROM repuesto WHERE nombreRepuesto='$nombreRepuesto' ");

if(mysqli_num_rows($verificar) > 0){
    echo
    '<script>
    alert("Este repuesto ya existe");
    window.location = " ../../Views/pagesG/registrar.php";
    </script>';
    exit();
}else {
}

$query=mysqli_query($con,$sql);


if($query){
    Header("Location: ../../Views/pagesG/listar.php");
}else {
}

mysqli_close($con);
?>