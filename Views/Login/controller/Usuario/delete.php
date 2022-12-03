<?php 
require_once('../../Models/Usuario.php');

if($_GET){
		echo $id=$_GET['id'];
		$modeloUsuario=new usuario();
		$eliminar=$modeloUsuario->delete($id);

		if($eliminar){
			header('Location:../../Views/templates/Usuario/list.php');
		}else{
			header('Location:../../Views/templates/Usuario/delete.php');
		}
}else{
	header('Location:../../Views/templates/Usuario/delete.php');
}
?>