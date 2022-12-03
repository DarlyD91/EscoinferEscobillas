<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Formulario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h2>Registrar Usuario</h2>
    <form action="../../Models/Cliente/registro.php" name="form"  method="post">

        <!--pattern="" para el correo porderlo validar-->
        Nombre:<input type="text" name="nombreUsuario" required><p>
        Apellido:<input type="text" name="apellidoUsuario" required><p>
        Documento:<input type="text" name="documentoUsuario" required><p>
        Direccion:<input type="text" name="direccionUsuario" required><p>
        Correo:<input type="email" name="correoUsuario" required><p>
        Contraseña:<input type="password" name="passwordUsuario" required><p>
        Telefono:<input type="number" name="telefonoUsuario" required><p>
            <input type="submit" value="Registrar">
            <input type="reset" value="Borrar">
    </form>
    
</body>
</html>