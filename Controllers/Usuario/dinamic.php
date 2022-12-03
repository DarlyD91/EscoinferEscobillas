<?php 	
require_once('../../Models/Login/Usuario.php');

if($_POST){
		echo $id=$_POST['id'];
		echo $estado=$_POST['estado'];
		

		$modeloUsuario=new usuario();
		$dinamic=$modeloUsuario->dinamic($id, $estado);

		if($dinamic){
			header('Location:../../Views/templates/Usuario/list.php');
		}else{
			// header('Location:../../Views/templates/Usuario/add.php');
		}
}else{
	// header('Location:../../Views/templates/Usuario/add.php');
}