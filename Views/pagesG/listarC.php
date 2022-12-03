<?php 
    include("../../Config/App/Conexion.php");
    $con=conectar();

    $sql="SELECT *FROM categorias GROUP BY id DESC";
    $query=mysqli_query($con,$sql);

      
?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets3/img/escoinfer/logo.png">
  <link rel="icon" type="image/png" href="../assets3/img/escoinfer/logo.png">
  <title>Categorias</title>

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
          <a class="nav-link" href="./listar.php">
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
          <a class="nav-link active" href="./listarC.php">
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Categorias</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Categorias</h6>
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







    
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-12">
          <div class="card mb-3">
            <div class="card-header pb-0">
            <h6  class="text-uppercase font-weight-bolder">CATEGORIAS</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
                    </tr>
                  </thead>


                  <tbody>
                  <?php
                    while($row=mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    <th class="text-center text-uppercase font-weight-bolder"><?php  echo $row['id']?></th>
                    <th class="text-center text-uppercase font-weight-bolder"><?php  echo $row['categoria']?></th>
                    <th class="text-center text-uppercase font-weight-bolder"><a href="actualizarC.php?EDITAR_ID=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
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


  <script src="../assets3/js/alertRepuesto.js"></script>

</body>

</html>