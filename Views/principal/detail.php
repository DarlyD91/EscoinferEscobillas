<?php include_once 'Views/template-principal/header.php'; ?>



<div class="hero-wrap hero-bread" style="background-image: url('<?php echo BASE_URL; ?>Views/assets1/images/hand.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"></span> <span class="mr-2"></a></span> <span>Bienvenido a los</span></p>
            <h1 class="mb-0 bread">Detalles del producto</h1>
          </div>
        </div>
      </div>
    </div>




    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3" id="rompe">
                        <img class="card-img img-fluid" src="<?php echo $data['producto']['imagen']; ?>" alt="Card image cap"
                            id="product-detail">
                    </div>
                   
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card" id="rompe">
                        <div class="card-body" >
                            <h1 class="h1"><?php echo $data['producto']['nombreRepuesto']; ?></h1>
                            <p class="h5 py-2"><?php echo  MONEDA . '  ' . '$' .number_format ($data['producto']['precioUnidad'], 2, '.', '.'); ?></p>
                        
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Categoria:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['categoria']; ?></strong></p>
                                </li>
                            </ul>

                            <h6>Descripcion:</h6>
                            <p><?php echo $data['producto']['descripcionRepuesto']; ?></p>

                            <form action="" method="GET">
                                <input type="hidden" id="idProducto" value="<?php echo $data['producto']['idRepuesto']; ?>">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Cantidad:
                                                <input type="hidden" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="badge btn-util" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="badge btn-util" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="row pb-3">
                                    <!--<div class="col d-grid">
                                        <button type="submit" class="btn btn-util btn-lg" name="submit"
                                            value="buy">Comprar</button>
                                    </div>-->
                                    <div class="col d-grid">
                                        <!--<button type="button" class="btn btn-util btn-lg" id="btnAddCart">Agregar al carrito</button>-->
                                        <p><a href="#" class="btn btn-primary px-5 py-3 mt-3" id="btnAddCart">Agregar al carrito</a></p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Productos Relacionados</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div class="row">
                <?php foreach ($data['relacionados'] as $producto) { ?>

                    <div class="col-md-3">
                        <div class="col-sm col-md-4 col-lg ftco-animate">

                            <div class="product border border-black">
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>" class="img-prod">
                                    <img class="card-img rounded-0 img-fluid" src="<?php echo $producto['imagen']; ?>" alt="Colorlib Template">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                            <!--<li><a class="btn btn-util text-warning mt-10-red btnAddCarrito" href="#" prod="<?php echo $producto['idRepuesto']; ?>"><i
                                                    class="fas fa-cart-plus"></i></a></li>-->
                                        </ul>
                                        <div class="overlay"></div>
                                    </div>
                                </a>
                                
                                <div class="text py-3 px-3 border border-black">
                                    <h3><a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><?php echo $producto['nombreRepuesto']; ?></a></h3>
                                    <div class="d-flex">
                                        <div class="price">
                                            <p class="price"><a>$<?php echo $producto['precioUnidad']; ?></a>
                                        </div>
                                        <div class="rating">
                                            <p class="text-right">
                                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><i class="bi bi-star"></i></a>
                                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><i class="bi bi-star"></i></a>
                                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><i class="bi bi-star"></i></a>
                                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><i class="bi bi-star"></i></a>
                                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><i class="bi bi-star"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="#" class="add-to-cart text-center py-2 mr-1 btnAddCarrito" prod="<?php echo $producto['idRepuesto']; ?>"><span>Agregar al carrito <i class="fas fa-cart-plus"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- End Article -->


    
    <?php include_once 'Views/template-principal/footer.php'; ?>

    <script src="<?php echo BASE_URL; ?>Views/assets/js/modulos/detail.js"></script>

>

</html>