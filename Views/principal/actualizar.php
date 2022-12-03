<?php 
    include("../../Config/App/Conexion.php");
    $con=conectar();

    $id = $_GET['EDITAR_ID'];

    $sql="SELECT * FROM repuesto WHERE idRepuesto='$id';";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

    $sql="SELECT * FROM categorias;";
    $query=mysqli_query($con,$sql);

    $categoria=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../Views/assets/css/formStyleG.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>ACTUALIZAR</title>
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

    <!--Formulario de Actuaización de Repuestos-->
    <br>
    <div class="frm-container">
    <center><h2>EDITAR REPUESTO</h2></center>
    <form id="frm-usuario" action="../../Models/Gerente/update.php" method="POST">
          <input type="hidden" name="idRepuesto" value="<?php echo $row['idRepuesto']?>">

          <!--Editar nombre del repuesto-->
          <div class="form-group" id="g-nombreRepuesto">
              <div class="form-group-input">
                <label for="nombreRepuesto">Nombre del repuesto</label>
                  <input type="text" name="nombreRepuesto" id="nombreRepuesto" class="frm-input" value="<?php echo $row['nombreRepuesto']  ?>">
                  <i class="bi bi-check-circle-fill frm-icono"></i>                        
                  <span class="msn-error">Este nombre no es valido, mínimo 5 caracteres</span>
              </div>
          </div>

          <!--Editar descripción del repuesto-->
          <div class="form-group" id="g-descripcionRepuesto">
              <div class="form-group-input">
                <label for="descripcionRepuesto">Descripción del repuesto</label>
                  <input type="text" name="descripcionRepuesto" id="descripcionRepuesto" class="frm-input" value="<?php echo $row['descripcionRepuesto']  ?>">
                  <i class="bi bi-check-circle-fill frm-icono"></i>                        
                  <span class="msn-error">Esta descripción no es valida, mínimo 5 caracteres</span>
              </div>
          </div>

          <!--Seleccionar categoria del repuesto-->
          <div class="form-group" id="g-id_categoria">
            <div class="form-group-input">
              <label for="id_categoria">Categoria del repuesto</label>
              <select name="id_categoria" id="id_categoria" class="frm-input" aria-label="Default select example" value="<?php echo $row['id']?>">
                  <?php
                    while($categoria=mysqli_fetch_array($query)) {
                      echo '<option value="'.$categoria['id'].'">'.$categoria['categoria'].'</option>';
                    }
                  ?>
              </select>
              <span class="msn-error">Seleccione la categoria del repuesto</span>
          </div>

          <!--Editar precio por unidad del producto-->
          <div class="form-group" id="g-precioUnidad">
              <div class="form-group-input">
                <label for="precioUnidad">Precio por unidad del repuesto</label>
                  <input type="text" name="precioUnidad" id="precioUnidad" class="frm-input" value="<?php echo $row['precioUnidad']  ?>">
                  <i class="bi bi-check-circle-fill frm-icono"></i>                        
                  <span class="msn-error">Este valor de precio no es valido</span>
              </div>
          </div>

          <!--Seleccionar estado del repuesto-->
          <div class="form-group" id="g-estadoRepuesto">
              <div class="form-group-input">
              <label for="estadoRepuesto">Estado del repuesto</label>
              <select name="estadoRepuesto" id="estadoRepuesto" class="frm-input" aria-label="Default select example" value="<?php echo $row['estadoRepuesto']  ?>">
                  <option value="1">Activo</option>
                  <option value="0">Agotado</option>
              </select>
              <span class="msn-error">Seleccione el estado del repuesto</span>
          </div><br> 

          <!--input type="file" class="form-control mb-3" name="imagen" placeholder="Imagen Del Repuesto" accept="image/*" value="</7?php echo $row['imagen']  ?>"/><br-->
          <button type="submit" class="btn-enviar" onclick="check()">Actualizar </button>
      </form>
    </div>
    <script src="../../Views/assets/js/functionsProd.js"></script>
    <script src="../../Views/assets/js/alertRepuesto.js"></script>
  </body>
</html>