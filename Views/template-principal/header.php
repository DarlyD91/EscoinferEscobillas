<!DOCTYPE html>
<html lang="en">

<head>

    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>Views/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>Views/assets/img/favicon.ico">

    <link rel="stylesheet" href="<#?php echo BASE_URL; ?>Views/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<#?php echo BASE_URL; ?>Views/assets/css/templatemo.css">
    <link rel="stylesheet" type="text/css" href="<#?php echo BASE_URL . 'Views/assets/css/styles.css'; ?>">-->

    <!--<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,30
    0;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:
    wght@700;800;900&display=swap"rel="stylesheet">-->


    <!-- Load fonts style after rendering the layout styles 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">-->

    <!-- Slick 
    <link rel="stylesheet" type="text/css" href="<#?php echo BASE_URL . 'Views/assets/css/slick/slick.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<#?php echo BASE_URL . 'Views/assets/css/slick/slick-theme.css'; ?>">-->

    <!--styles-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>Views//assets3/img/escoinfer/logo.png">


    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/animate.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/aos.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/assets1/css/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Views/assets1/css/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'Views/assets1/css/cajas.css'; ?>">


    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&currency=<?php echo MONEDA; ?>"></script>

</head>

<body class="goto-here">
    <!-- navbar 
    <div class="hero">
        <nav>
            <img class="img-fluid" src="<?php echo BASE_URL; ?>Views/assets/img/Logo icono.png" alt="" width="80px">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contactanos</a></li>
                </ul>
                <li class="nav-item">
                    <a type="nav-link" href="<#?php echo BASE_URL . 'principal/login'; ?>">Iniciar sesion</a>
                </li>
                <#?php if (!empty($_SESSION['correoUsuario'])) { ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo BASE_URL . 'principal/cliente'; ?>" id="btnModalLogin">
                    <img class="img-thumbnail" src="<?php echo BASE_URL . 'Views/assets/img/clientes/iconoperfil.jpg' ?>" alt="-LOGO-CLIENTE" width="50">    </a>
                    </a>
                    <#?php }else{?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo BASE_URL . 'principal/login'; ?>">
                    <i class="fas fa-fw fa-user text-dark mr-3">
                    </i>
                    <#?php } ?>
                
                
        </nav>
    </div>-->


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL; ?>Views/assets1/images/Logo text derecha.png" width="210px"></a>
            <!--<a class="navbar-brand" href="index.html">Escoinfer</a>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menú
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="<?php echo BASE_URL ?>" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL . 'principal/shop' ?>" class="nav-link">Tienda</a></li>
                    <li class="nav-item "><a href="#nosotros" class="nav-link <#?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>">Sobre Nosotros</a></li>
                    <!--<li class="nav-item"><a href="contact.html" class="nav-link">Contacto</a></li>-->
                    <!--<li class="nav-item"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>Carrito</a></li>-->
                    <li class="nav-item cta cta-colored"><a href="<?php echo BASE_URL . 'principal/login'; ?>" class="nav-link">Iniciar Sesión</a></li>
                    <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search text-dark"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-item" href="#" id="verCarrito">
                        <i class="fas fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-10 left-100 translate-middle badge rounded-pill bg-util text-dark" id="btnCantidadCarrito">0</span>
                    </a>
                </div>
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->



    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Buscar ...">
                    <button type="submit" class="input-group-text bg-util text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                <div class="row" id="resultBusqueda">

                </div>
            </div>

        </div>
    </div>