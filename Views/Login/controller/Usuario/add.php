<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escoinfer</title>

    <link rel="stylesheet" href="../../resources/css/sweet.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- Links paginacion data table -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
   <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <script src="https://kit.fontawesome.com/bcbd8b5d8b.js" crossorigin="anonymous"></script>

</head>
<body>
<?php 	
require_once('../../model/Usuario.php');

if($_POST){
		$idUsuario=$_POST['idUsuario'];
		$nombreUsuario=$_POST['nombre'];
		$apellidoUsuario=$_POST['apellido'];
		$documentoUsuario=$_POST['documento'];
		$direccionUsuario=$_POST['direccion'];
		$correoUsuario=$_POST['correo'];
		$passwordUsuario=$_POST['password'];
		$password_cifrado=password_hash($passwordUsuario, PASSWORD_DEFAULT);
		$telefonoUsuario=$_POST['telefono'];

		$modeloUsuario=new usuario();

		$validarCorreo=$modeloUsuario->validarCorreo($correoUsuario);

		$validarUsuario=$modeloUsuario->validarUsuario($nombreUsuario);

		$usuario=$modeloUsuario->TraerUsuario($correoUsuario); 

		$usua=$modeloUsuario->TraerID(); 

		foreach($usua as $us){
				$id=$us['IdUsuario'];

				echo $id;
		}

		if ($validarCorreo) {
			echo "<script>
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: 'Los siento..!',
				text: 'El correo ingresado ya existe, ingrese uno diferente',
				showConfirmButton: false,
				timer: 4000
			  })
	
			  setTimeout(function(){window.location.href = '../../dist/index.html'}, 4000);
			</script>";
		}elseif ($validarUsuario) {
			echo "<script>
			Swal.fire({
				position: 'center',
				icon: 'error',
				title: 'Los siento..!',
				text: 'El usuario ingresado ya existe, intente digitar uno diferente',
				showConfirmButton: false,
				timer: 4000
			  })
	
			  setTimeout(function(){window.location.href = '../../dist/index.html'}, 4000);
			</script>";
		}else{

		$agregar=$modeloUsuario->agregar($nombreUsuario, $apellidoUsuario, $documentoUsuario, $direccionUsuario, $correoUsuario, $password_cifrado, $telefonoUsuario);

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

	}
}else{
	echo "<script> window.location='../../dist/index.html'; </script>";
}

?>
</body>
</html>