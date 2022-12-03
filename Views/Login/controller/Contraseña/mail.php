<?php

$usuario=$modeloUsuario->TraerUsuario($correoUsuario); 

$validar=$modeloUsuario->validar($correoUsuario);

if($agregar){
        echo "<script>
        Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Genial!!',
                text: 'El usuario fue registrado correctamente',
                showConfirmButton: false,
                timer: 4000
          })
          setTimeout(function(){window.location.href = '../../dist/index.html'}, 4000);
        </script>";

}else{
        echo "<script> window.location='../../dist/index.html'; </script>";
        
}

?>