<?php 	
require_once('../../Models/Usuario.php');

if($_POST){
		$idUsuario=$_POST['idUsuario'];
		$nombreUsuario=$_POST['nombreUsuario'];
		$correoUsuario=$_POST['correoUsuario'];
		$passworUsuario=$_POST['passworUsuario'];
		$rolUsuario=$_POST['rolUsuario'];

		$modeloUsuario=new usuario();
		$actualizar=$modeloUsuario->actualizar($idUsuario, $nombreUsuario, $correoUsuario, $passworUsuario, $rolUsuario);

		if($actualizar){
			header('Location:../../Views/templates/Usuario/list.php');
		}else{
			header('Location:../../Views/templates/Usuario/edit.php');
		}
}else{
	header('Location:../../Views/templates/Usuario/edit.php');
}


?>