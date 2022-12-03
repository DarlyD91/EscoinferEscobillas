<?php
//include_once('../model/validar.php');
//sesssion_start();
//if (($_SESSION['correoUsuario']=$correoUsuario)!=''){
?>

<?php 
require_once('../model/Pedido.php');
$mdoeloPeido=new pedido();


$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
    <h1>Bienvenido Cliente</h1><br>
    <a href="../src/index.html">Cerrar Sesion</a>
    <br><br>
    <a href="">Ver pedidos</a>

    <hr>

    <h2>Pedidos Registrados</h2>

<?php
$Pedido=$mdoeloPeido->consultarxid($id); 
    if ($Pedido!=null) {
?>

<table>
    <thead>
        <th>ID</th>
        <th>ID_trac</th>
        <th>Valor</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Email_User</th>
        <th>ID_Us</th>
    </thead>
    <?php 
		foreach($Pedido as $pd){
	?>
    <tbody>
        <td><?php echo $pd['idPedido'];?></td>
        <td><?php echo $pd['id_transaccion'];?></td>
        <td><?php echo $pd['Valor'];?></td>
        <td><?php echo $pd['estado'];?></td>
        <td><?php echo $pd['fechaPedido'];?></td>
        <td><?php echo $pd['email'];?></td>
        <td><?php echo $pd['nombre'];?></td>
        <td><?php echo $pd['apellido'];?></td>
        <td><?php echo $pd['direccion'];?></td>
        <td><?php echo $pd['ciudad'];?></td>
        <td><?php echo $pd['email_user'];?></td>
        <td><?php echo $pd['idUsuario'];?></td>
    </tbody>

        <?php
        }
        ?>
</table>
<?php
}else{
    echo '<p>No hay pedidos afiliados a este usuario!</p>';
}
?>

<hr>
    <br><br>
    <a href="">Mi perfil</a>
</body>
</html>
<?php

?>