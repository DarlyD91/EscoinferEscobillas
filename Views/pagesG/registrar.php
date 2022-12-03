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
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets3/img/escoinfer/logo.png">
    <link rel="icon" type="image/png" href="../assets3/img/escoinfer/logo.png">
    <link rel="stylesheet" href="../assets3/css/formStyleG.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Registrar Repuestos</title>

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
          <a class="nav-link" href="./listar.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-bag-17 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Repuestos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./registrar.php">
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
          <h6 class="font-weight-bolder text-white mb-0">Registrar Repuestos</h6>
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








    


  <main class="main-content  mt-0">
    <div class="frm-container">
         <center><img class="logo-form" src="../assets3/img/escoinfer/logo.png">
       <h2>REGISTRAR REPUESTO</h2></center><br>
        <form id="frm-usuario" action="../../Models/Gerente/insert.php" method="POST" enctype="multipart/form-data">

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

        <!--Seleccionar estado del repuesto-->

        <div class="form-group" id="g-img">
          <div class="form-group-input">
            <label for="precioUnidad">Imagen del repuesto</label>
            <input type="file" name="imagen" id="imagen"> 
          </div> 
        </div>
                  
          <br> 

            <button type="submit" class="btn-enviar" onclick="registrar()">Enviar</button>
        </form>
    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



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
  </footer>0
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


  <script src="../assets3/js/functionsProd.js"></script>
  <script src="../assets3/js/alertRepuesto.js"></script>

</body>

</html>