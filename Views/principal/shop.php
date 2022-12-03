<?php include_once 'Views/template-principal/header.php'; ?>


<!--?php
 foreach ($data['productos'] as $producto){ 
    if($producto['estadoRepuesto']=1){
    
?-->


<!-- Start Content -->

<div class="hero-wrap hero-bread" style="background-image: url('../Views/assets1/images/hand.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Encuentra aqui</a></span> <span>nuestra</span></p>
            <h1 class="mb-0 bread">Colección de productos</h1>
          </div>
        </div>
      </div>
    </div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>


            
            <!--Productos-->
            <div class="row">
                <?php
                foreach ($data['productos'] as $producto) {
                    if ($producto['estadoRepuesto'] == 1) {
                ?>

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
                <?php }
                } ?>
            </div>


            <!--Paginacion-->
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <?php
                    $url = BASE_URL . 'principal/shop/';
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    if ($data['pagina'] > 1) {
                        echo '<li class="page-item ">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-15 border-left-5 text-black" href="' . $url . $anterior . '"
                            tabindex="-1">Anterior</a>
                        </li>';
                    }
                    if ($data['total'] >= $siguiente) {
                        echo '<li class="page-item">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-15 border-left-5 text-black"
                            href="' . $url . $siguiente . '">Siguiente</a>
                    </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<!-- End Content -->

<?php include_once 'Views/template-principal/footer.php'; ?>

</body>

</html>