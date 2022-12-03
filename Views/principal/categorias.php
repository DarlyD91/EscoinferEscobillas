<?php include_once 'Views/template-principal/header.php';?>

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="#">Productos</a>
                            </li>
                        </ul>
                    </div>
                </div>



                <!--Card-
                <div class="row">
                    <?php 
                    foreach ($data['productos'] as $producto) { 
                        if($producto['estadoRepuesto']==1){    
                        ?>
                    <div class="col-md-3">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo $producto['imagen']; ?>">
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-util text-white mt-2" href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>"><i
                                                    class="fas fa-eye"></i></a></li>
                                        <li><a class="btn btn-util text-white mt-2 btnAddCarrito" href="#" prod="<?php echo $producto['idRepuesto']; ?>"><i
                                                    class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>" class="h3 text-decoration-none"><?php echo $producto['nombreRepuesto']; ?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    
                                    <li class="pt-2">
                                        <span
                                            class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span
                                            class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <p class="text-center mb-0"><?php echo MONEDA . ' ' .$producto['precioUnidad']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>-->



    	
    	<div class="container">
    		<div class="row">
            <?php 
                    foreach ($data['productos'] as $producto) { 
                        if($producto['estadoRepuesto']==1){    
                        ?>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>" class="img-prod">
              			<img class="card-img rounded-0 img-fluid" src="<?php echo $producto['imagen']; ?>" alt="Colorlib Template">
                          <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <!--<li><a class="btn btn-util text-warning mt-10-red btnAddCarrito" href="#" prod="<?php echo $producto['idRepuesto']; ?>"><i
                                                    class="fas fa-cart-plus"></i></a></li>-->
                                    </ul>
                                </div>
						  
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 px-3">
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
          <?php }} ?>
    		</div>
    	</div>

                <!--por pagina-->
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                    <?php 
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    $url = BASE_URL .'principal/categorias/' . $data['id_categoria'];
                    if ($data['pagina'] > 1) {
                        echo '<li class="page-item ">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="'. $url .'/'. $anterior.'"
                            tabindex="-1">Anterior</a>
                        </li>';
                    }
                    if ($data['total'] >= $siguiente) {
                        echo '<li class="page-item">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-white"
                            href="'. $url .'/' .$siguiente.'">Siguiente</a>
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