<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar mi contraseña</title>
</head>
<body>
<?php
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['passwordUsuario'])) {
           $errors[] = "passwordUsuario esta vacío";
        } else if (empty($_POST['passwordUsuario'])) {
            $errors[] = "passwordUsuario esta vacío";
        }   else if (
			!empty($_POST['passwordUsuario']) &&
			!empty($_POST['passwordUsuario']) 
		){
			
		/*Conecta la base de datos*/
		require_once ("../../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../../config/conexion.php");//Contiene funcion que conecta a la base de datos

		$passwordUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["passwordUsuario"],ENT_QUOTES)));
		$telefonoUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["passwordUsuario"],ENT_QUOTES)));

		$sql="UPDATE usuario SET  passwordUsuario='".$passwordUsuario."' WHERE idUsuario='1'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Grandioso!, se ha restablecido la contraseña";
                header("location:../../view/cambiar.php");
                
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="submit" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-warning" role="alert">
						<button type="submit" class="close" data-dismiss="alert">&times;</button>
						<!--<strong>¡Bien hecho!</strong>-->
						<?php
							foreach ($messages as $message) {
								echo $message;
								}
							?>
				</div>
				<?php
			}
            
?>
<script src=recuperar.js></script>
</body>
</html>

