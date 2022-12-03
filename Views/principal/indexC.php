<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/7d5fd77de7.js" crossorigin="anonymous"></script>

</head>
<body>
    <h1 class="text-center">Visualizar Pedido</h1>
    <div class="container-fluid row"></div>

   <!-- <form class="col-4 p-3">
      <h3 class="text-center text-secondary">Informacion del pedido</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Apellido</label>
    <input type="text" class="form-control" name="apellido">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">DNI</label>
    <input type="text" class="form-control" name="dni">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de nacimineto</label>
    <input type="date" class="form-control" name="fecha">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Correo</label>
    <input type="email" class="form-control" name="correo">
  </div>
 
  <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
</form>-->

  <div class="col-8 p-4">
  <table class="table table-bordered border-dark">
  <thead class="bg-info">
    <tr>
      <th scope="col">Id del Pedido</th>
      <th scope="col">Numero del pedido</th>
      <th scope="col">Precio del pedido</th>
      <th scope="col">Fecha del pedido</th>
      <th scope="col">Id del usuario</th>
      <th scope="col">ver</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include_once("../../Config/App/Conexion.php");
    $sql=$conexion->query(" select * from pedido ");
    while ($datos=$sql->fetch_object()){ ?>
      <tr>
      <th><?= $datos->idPedido ?></th>
      <td><?= $datos->id_transaccion ?></td>
      <td><?= $datos->Valor ?></td>
      <td><?= $datos->fechaPedido ?></td>
      <td><?= $datos->email_user ?></td>
      <td>

      <a href="VerPedido.html"  class="btn btn-small btn-warning"><i class="fa-solid fa-eye"></i></a>
      </td>
    </tr>
    <?php }
    ?>
    
  </tbody>
</table>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>