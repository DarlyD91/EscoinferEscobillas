<?php

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombreUsuario'])) {
           $errors[] = "nombreUsuario esta vacío";
        }else if (empty($_POST['apellidoUsuario'])) {
           $errors[] = "apellidoUsuario esta vacío";
        } else if (empty($_POST['correoUsuario'])) {
           $errors[] = "correoUsuario esta vacío";
        } else if (empty($_POST['passwordUsuario'])) {
           $errors[] = "passwordUsuario esta vacío";
        } else if (empty($_POST['telefonoUsuario'])) {
           $errors[] = "telefonoUsuario esta vacío";
        }   else if (
			!empty($_POST['nombreUsuario']) &&
			!empty($_POST['apellidoUsuario']) &&
			!empty($_POST['correoUsuario']) &&
			!empty($_POST['passwordUsuario']) &&
			!empty($_POST['telefonoUsuario']) 
		){
			
		/*Conecta la base de datos*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

		$nombreUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["nombreUsuario"],ENT_QUOTES)));
		$apellidoUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["apellidoUsuario"],ENT_QUOTES)));
		$correoUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["correoUsuario"],ENT_QUOTES)));
		$passwordUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["passwordUsuario"],ENT_QUOTES)));
		$telefonoUsuario=mysqli_real_escape_string($con,(strip_tags($_POST["telefonoUsuario"],ENT_QUOTES)));

		$sql="UPDATE usuario SET nombreUsuario='".$nombreUsuario."', apellidoUsuario='".$apellidoUsuario."', documentoUsuario='".$documentoUsuario."', direccionUsuario='".$direccionUsuario."', correoUsuario='".$correoUsuario."', passwordUsuario='".$passwordUsuario."', telefonoUsuario='".$telefonoUsuario."' WHERE idUsuario='1'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Datos han sido actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
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
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>