<?php
include_once('../../Config/App/Conexion.php');

//Se reciben los datos del formulario.
$nombreUsuario=$_POST['nombreUsuario'];
$apellidoUsuario=$_POST['apellidoUsuario'];
$documentoUsuario=$_POST['documentoUsuario'];
$direccionUsuario=$_POST['direccionUsuario'];
$correoUsuario=$_POST['correoUsuario'];
$passwordUsuario=$_POST['passwordUsuario'];
$telefonoUsuario=$_POST['telefonoUsuario'];

     
     //Se trae la variable "conectar" de la conexion y se realiza una consulta en la base de datos
     $conectar=conn(); 
     $sql="INSERT INTO `usuario` (`nombreUsuario`, `apellidoUsuario`, `documentoUsuario`, `direccionUsuario`, `correoUsuario`, `passwordUsuario`, `telefonoUsuario`) 
     VALUES ('$nombreUsuario', '$apellidoUsuario', '$documentoUsuario', '$direccionUsuario', '$correoUsuario', '$passwordUsuario', '$telefonoUsuario')";

     //Se verifica que el correo no se repita en la base de datos y se realiza una alerta si es asi.
         $verificar = mysqli_query($conectar, "SELECT * FROM usuario where correoUsuario='$correoUsuario' ");
          if(mysqli_num_rows($verificar) > 0){
               //Alerta
               echo '<script>
               alert("Este correo ya existe, intentalo de nuevo");
               window.location="../dist/index.php";
               </script>';
               exit();
          }

     $resul = mysqli_query($conectar, $sql); 
     if ($resul) {
         echo '<script>
               alert("Usuario registrado exitosamente");
               window.location="../../Views/principal/login.php";
          </script>';
         // exit();
     }else{
          echo '<script>
               alert("Usuario no registrado");
               window.location="../../Views/principal/login.php";
          </script>';
          //exit();
     }
     mysqli_close($conectar);
     //destroy();
?>