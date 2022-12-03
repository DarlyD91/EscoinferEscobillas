<?php 
    include("../../Config/App/Conexion.php");
    $con=conectar();

    $sql="SELECT * FROM repuesto as r JOIN categorias as c on r.id_categoria=c.id;";
    $query=mysqli_query($con,$sql);
      
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <title> PRODUCTOS </title>
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



<br>
  <!--Tabla de Listado de repuestos-->
  <table class="table table-bordered">
    <thead class="table" style="background-color: #ffe600">
      <tr>
          <th>#</th>
          <th>imagen</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Categoria</th>
          <th>Estado</th>
          <th>Cambiar Estado</th>
          <th>Editar</th>
      </tr>
    </thead>

    <tbody>
    <?php
      while($row=mysqli_fetch_array($query)){
    ?>
        <tr>
          <th><?php  echo $row['idRepuesto']?></th>
          <th><img src="../../Views/img/productos/<?php echo $us['imagen'];?>" alt="" width="200"></th>
          <th><?php  echo $row['nombreRepuesto']?></th>
          <th><?php  echo $row['descripcionRepuesto']?></th>
          <th><?php  echo $row['precioUnidad']?></th>
          <th><?php  echo $row['categoria']?></th>
          <th>
            <?php
              if($row['estadoRepuesto']=="1") 
                  echo "<a class='btn btn-outline-success' role='button0' aria-disabled='true'>Disponible</a>";
              else 
                  echo "<a class='btn btn-outline-danger' role='button0' aria-disabled='true'>Agotado</a>";
            ?>
          </th>
          <th id="estado">
            <?php 
              if($row['estadoRepuesto']=="1")
                  echo "<a type='button' onclick='return alerta()' href= ../../Models/Gerente/desactivarEstado.php?idRepuesto=".$row['idRepuesto']." class='btn btn-danger btn-sm' >Desactivar Disponibilidad</a>";
              else 
                  echo "<a type='button' onclick='return alerta()' href= ../../Models/Gerente/activarEstado.php?idRepuesto=".$row['idRepuesto']." class='btn btn-success' >Activar Disponibilidad</a>";
            ?>
          </th>
          <th><a href="actualizar.php?EDITAR_ID=<?php echo $row['idRepuesto'] ?>" class="btn btn-info">Editar</a></th>
        </tr>
          <?php 
              }
          ?>
    </tbody>
  </table>

  <script src="../../Views/assets/js/alertRepuesto.js"></script>

</body>
</html>