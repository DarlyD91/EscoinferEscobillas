<?php
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos	
	$active_perfil="active";	
	//$title="Perfil";
	
	$query_empresa=mysqli_query($con,"select * from usuario where idUsuario=1");
	$row=mysqli_fetch_array($query_empresa);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar mi contraseña</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="../dist/style.css">
  <script src="https://kit.fontawesome.com/bcbd8b5d8b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../resources/css/sweet.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="form-container sign-in-container">
      <form action="../controller/Contraseña/editarpass.php" method="post">
        <img src="../dist/Logo text abajo.png" width="150px">
			<br>
			<h1>CAMBIAR MI CONTRASEÑA</h1><br>
            <td><input type="text" class="form-control input-sm" name="passwordUsuario" value="" placeholder="Digite su nueva contraseña" required></td><br>
            <td><input type="text" class="form-control input-sm" name="passwordUsuario" value="" placeholder="confirme su nueva contraseña" required></td><br>
			<button id="b" type="submit" onclick="email();">Confirmar</button>
            <script src=../controller/Contraseña/email.js></script>
      </form> 
  </div>
</div>

</body>
</html>