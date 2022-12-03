<?php 
    include("../../Config/App/Conexion.php");
    $con=conectar();

    $sql="SELECT * FROM repuesto as r JOIN categorias as c on r.id_categoria=c.id GROUP BY idRepuesto DESC;";
    $query=mysqli_query($con,$sql);
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets3/img/escoinfer/logo.png">
  <link rel="icon" type="image/png" href="../assets3/img/escoinfer/logo.png">
  <title>Repuestos</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets3/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets3/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets3/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets3/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <!-- limonte-sweetalert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>



<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0" href="./listar.php" target="_blank">
        <img src="../assets3/img/escoinfer/logo text derecha.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="./dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./listar.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bag-17 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Repuestos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./registrar.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-books text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Registrar Repuesto</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./listarC.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bag-17 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Categorias</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./registrarC.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-books text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Registrar Categorias</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Repuestos</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Repuestos</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
            <div class="dropdown" id="rompe">
                    <a class="nav-link dropdown-toggle float-end" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item float-center" href="../../index.php"><i class="fas fa-times-circle"></i> Cerrar Sesión</a></li>
                    </ul>
                </div>
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
              </a>
            </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->




    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>REPUESTOS</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Imagen</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Producto</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Precio</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cambiar Estado </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
                    </tr>
                  </thead>


                  <tbody>
                    <?php
                      while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                      <th class="text-center"><?php  echo $row['idRepuesto']?></th>

                      <th class="text-center">

                        <img class="avatar avatar-sm me-3" id="imagen" name="imagen" src="../assets3/img/escoinfer/Uploads/<?php echo $row['imagen'];?>">
                      </th>

                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"> <?php  echo $row['nombreRepuesto']?> </h6>
                            <p class="text-xs text-secondary mb-0"><?php  echo $row['descripcionRepuesto']?></p>
                          </div>
                        </div>
                      </td>

                      <th class="text-center"><?php  echo $row['precioUnidad']?></th>
                      <th class="text-center"><?php  echo $row['categoria']?></th>
                      <th class="text-center">
                        <?php
                          if($row['estadoRepuesto']=="1") 
                              echo "<a>Disponible</a>";
                          else 
                              echo "<a>Agotado</a>";
                        ?>
                      </th>
                      <th class="text-center js-addcart-detail" id="estado">
                        <?php 
                          if($row['estadoRepuesto']=="1")
                              echo "<a type='button' onclick='alerta()' href= ../../Models/Gerente/desactivarEstado.php?idRepuesto=".$row['idRepuesto']." class='btn btn-danger btn-sm' >Desactivar</a>";
                          else 
                              echo "<a type='button' onclick='alerta()' href= ../../Models/Gerente/activarEstado.php?idRepuesto=".$row['idRepuesto']." class='btn btn-success' >Activar</a>";
                        ?>
                      </th>

                      <th class="text-center"><a href="actualizar.php?EDITAR_ID=<?php echo $row['idRepuesto'] ?>" class="btn btn-info  ">Editar</a></th>
                    </tr>
                      <?php 
                          }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>







      <!--Footer-->
      <footer class="footer py-5">
    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Escoinfer Escobillas
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="../assets3/js/alertRepuesto.js"></script>
  <script src="../assets3/js/core/popper.min.js"></script>
  <script src="../assets3/js/core/bootstrap.min.js"></script>
  <script src="../assets3/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets3/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets3/js/argon-dashboard.min.js?v=2.0.4"></script>

  <script>

  </script>


</body>

</html>