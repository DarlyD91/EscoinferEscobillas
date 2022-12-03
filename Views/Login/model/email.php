<?php

$paracorreo = "yhelsin2005@gmail.com";
$titulo = "Escoinfer Escobillas";
$mensaje = "Hola, por este medio podras recuperar tu contraseña: ";
$correoadmin = "escoinferel@gmail.com";

if (mail($paracorreo, $titulo, $mensaje, $correoadmin)) {
    echo "Correo enviado exitosamente";
    header("location:../view/restablecer.php");
}else {
    echo "Hubo un error, revisa e intenta de nuevo";
}

?>