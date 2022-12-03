<?php 
    include("../../Config/App/Conexion.php");
    $con=conectar();

    $sql="SELECT *FROM repuesto";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

    $sql="SELECT *FROM categorias";
    $query=mysqli_query($con,$sql);

    $categoria=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../Views/assets/css/formStyleG.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title> REGISTRAR REPUESTO </title>
</head>
<body>

<!--Navbar de Gerente-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="repuesto.php">Escoinfer Escobillas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="registrar.php">REGISTRAR</a>
      </li>
    </ul>
  </div>
</nav>

<!--Formulario de registro de Repuestos-->

<br>
<div class="frm-container">
    <center><h2>REGISTRAR REPUESTO</h2></center>
    <form id="frm-usuario" action="../../Models/Gerente/insert.php" method="POST">

    <!--Ingresar nombre del repuesto-->
    <div class="form-group" id="g-nombreRepuesto">
        <div class="form-group-input">
          <label for="nombreRepuesto">Nombre del repuesto</label>
            <input type="text" name="nombreRepuesto" id="nombreRepuesto" class="frm-input">
            <i class="bi bi-check-circle-fill frm-icono"></i>                        
            <span class="msn-error">Este nombre no es valido, mínimo 5 caracteres</span>
        </div>
    </div>

    <!--Ingresar descripción del repuesto-->
    <div class="form-group" id="g-descripcionRepuesto">
        <div class="form-group-input">
          <label for="descripcionRepuesto">Descripción del repuesto</label>
            <input type="text" name="descripcionRepuesto" id="descripcionRepuesto" class="frm-input">
            <i class="bi bi-check-circle-fill frm-icono"></i>                        
            <span class="msn-error">Esta descripción no es valida, mínimo 5 caracteres</span>
        </div>
    </div>

    <!--Seleccionar categoria del repuesto traida desde la base de datos-->
    <div class="form-group" id="g-id_categoria">
      <div class="form-group-input">
        <label for="id_categoria">Categoria del repuesto</label>
        <select name="id_categoria" id="id_categoria" class="frm-input" aria-label="Default select example">
            <option selected>Seleccione la categoria del repuesto</option>
            <?php
              while($categoria=mysqli_fetch_array($query)) {
                echo '<option value="'.$categoria['id'].'">'.$categoria['categoria'].'</option>';
              }
            ?>
        </select>
        <span class="msn-error">Seleccione la categoria del repuesto</span>
    </div>

    <!--Ingresar precio por unidad del producto-->
    <div class="form-group" id="g-precioUnidad">
        <div class="form-group-input">
          <label for="precioUnidad">Precio por unidad del repuesto</label>
            <input type="text" name="precioUnidad" id="precioUnidad" class="frm-input">
            <i class="bi bi-check-circle-fill frm-icono"></i>                        
            <span class="msn-error">Este valor de precio no es valido</span>
        </div>
    </div>

    <!--Seleccionar estado del repuesto-->
    <div class="form-group" id="g-estadoRepuesto">
        <div class="form-group-input">
        <label for="estadoRepuesto">Estado del repuesto</label>
        <select name="estadoRepuesto" id="estadoRepuesto" class="frm-input" aria-label="Default select example">
            <option selected>Seleccione el estado del repuesto</option>
            <option value="1">Activo</option>
            <option value="0">Agotado</option>
        </select>
        <span class="msn-error">Seleccione el estado del repuesto</span>
    </div>
       <br> 
       
        <input type="file" class="form-control mb-3" name="imagen"><br>

        <button type="submit" class="btn-enviar">Enviar</button>
    </form>
</div>
<script src="../../Views/assets/js/functionsProd.js"></script>
</body>
</html>
