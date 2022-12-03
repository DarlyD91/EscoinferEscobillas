<?php include_once 'Views/template-principal/header.php'; ?>



  <!-- Start Banner Hero -->

    <section id="home-section" class="hero">
		  <div class="home-slider js-fullheight owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(Views/assets1/images/bg_1.jpg);">
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">Tienda Escoinfer Escobillas</span>
		          		<div class="horizontal">
		          			<h3 class="vr" style="background-image: url(Views/assets1/images/divider.jpg);">Disponible desde 2015</h3>
				            <h1 class="mb-4 mt-3">Repuestos de la mejor calidad <br><span>Precio &amp; Comodidad</span></h1>
				            <p>Repuestos para diferentes tipos de maquinaria</p>
				            
				            <p><a href="<?php echo BASE_URL . 'principal/shop' ?>" class="btn btn-primary px-5 py-3 mt-3">Ver más</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
	          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(Views/assets1/images/bg_2.jpg);">
	          	</div>
		          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">Tienda Escoinfer Escobillas</span>
		          		<div class="horizontal">
		          			<h3 class="vr" style="background-image: url(Views/assets1/images/divider.jpg);">Disponible desde 2015</h3>
				            <h1 class="mb-4 mt-3">Profesionales en <span>Repuestos</span> Modernos</h1>
				            <p></p>
				            
				            <p><a href="<?php echo BASE_URL . 'principal/shop' ?>" class="btn btn-primary px-5 py-3 mt-3">Ir a la Tienda</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

  <!-- sobre escoinfer-->

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light" id="nosotros">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(Views/assets1/images/about.jpg);"  >
						<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">ACERCA DE ESCOINFER</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
							<p>Somos una empresa dedicada al comercio de repuestos, contamos con servicio a domicilio, distintos metodos de pago y garantizamos la calidad de nuestros productos.</p>
							<div class="row ftco-services">
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			              </div>
			              <div class="media-body">
							<center><img src="Views/assets1/images/reembolso.png" width="66px" alt="30px" srcset=""></center><br>

			                <h3 class="heading">Reembolso</h3>
			                <p>Si tienes problemas con nuestros productos el reembolso es 100% efectivo</p>
			              </div>
			            </div>      
			          </div>
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
							<div class="icon d-flex justify-content-center align-items-center mb-4">
			              </div>
			              <div class="media-body">
							<center><img src="Views/assets1/images/camion-de-carga.png" width="90px" alt="30px" srcset=""></center>
			                <h3 class="heading">Domicilios</h3>
			                <p>En nuestra empresa contamos con servicio a domicilio.</p>
			              </div>
			            </div>    
			          </div>
			          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
			            <div class="media block-6 services">
			              <div class="icon d-flex justify-content-center align-items-center mb-4">
			              </div>
			              <div class="media-body">
							<center><img src="Views/assets1/images/porcentaje.png" width="66px" alt="30px" srcset=""></center><br>
			                <h3 class="heading">Productos garantizados</h3>
			                <p>Nuestros productos son 100% garantizados</p>
			              </div>
			            </div>      
			          </div>
			        </div>
						</div>
					</div>
				</div>
			</div>
		</section>




<!--Mostrar los productos nuevos-->
<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">PRODUCTOS</h2>
            <p>Algunos de los productos nuevos que tenemos para ti en Escoinfer Escobillas.</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
        <?php foreach ($data['nuevoProductos'] as $producto) { 
			if($producto['estadoRepuesto']==1){
				?>
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="product">
    					<a href="<?php echo BASE_URL . 'principal/detail/' . $producto['idRepuesto']; ?>" class="img-prod">
              			<img class="card-img rounded-0 img-fluid" src="<?php echo $producto['imagen']; ?>" alt="Colorlib Template">
						  
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
    						<!--<p class="bottom-area d-flex px-3">
    							<a href="#" class="add-to-cart text-center py-2 mr-1"><span>Agregar al carrito <i class="ion-ios-add ml-1"></i></span></a>
    							<a href="#" class="buy-now text-center py-2">Comprar ahora<span><i class="ion-ios-cart ml-1"></i></span></a>
    						</p>-->
    					</div>
    				</div>
    			</div>
          <?php }} ?>
    		</div>
    	</div>
    </section>

  
  <!-- End Featured Product -->


    <!--productos nuevos en nuestra empresa-->
    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 d-flex align-items-stretch">
    				<div class="img" style="background-image: url(Views/assets1/images/about-1.jpg);"></div>
    			</div>
    			<div class="col-md-4 py-md-5 ftco-animate">
    				<div class="text py-3 py-md-5">
	            <h2 class="mb-4">Productos nuevos en nuestras empresa</h2>
	            <p></p>
    				</div>
    			</div>
    		</div>

    		<div class="row">
    			<div class="col-md-5 order-md-last d-flex align-items-stretch">
    				<div class="img img-2" style="background-image: url(Views/assets1/images/about-2.jpg);"></div>
    			</div>
    			<div class="col-md-7 py-3 py-md-5 ftco-animate">
    				<div class="text text-2 py-md-5">
	            <h2 class="mb-4">Nueva colección de escobillas</h2>
	            <p>La variedad de escobillas aumenta en nuestra, empresa conoce lo nuevo que tenemos para ti</p>
	            <p><a href="<?php echo BASE_URL . 'principal/shop' ?>" class="btn btn-white px-4 py-3">Ir a la Tienda</a></p>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
      <div class="col-lg-6 m-auto">
        <h1 class="h1"><b>CATEGORIAS</b></h1>
        <p>
          Nuestras diferentes categorias para repuestos de maquinaria.
        </p>
      </div>
    </div>
    <div class="row">
      <?php foreach ($data['categorias'] as $categoria) { ?>
        <div class="col-12 col-md-2 p-5 mt-3">
          <a class="text-center mt-3 mb-3" id="brrrr" href="<?php  echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"><?php echo $categoria['categoria']; ?></a>
        </div>
      <?php } ?>
    </div>
  </section>
  <!-- End Categories of The Month -->
  



  

    <!--Cajas--><br><br>
	<section id="featured-services" class="featured-services">
		<div class="container" data-aos="fade-up">
  <div class="row">
	<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
	  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
		<center><img src="Views/assets1/images/camion-de-carga.png" width="80px" alt="30px" srcset=""></center>
		<center><h4 class="title">Envios</h4></center>
		<p class="description">Se realizan envios a domicilio a nivel nacional</p>
	  </div>
	</div>
	<div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
		<div class="icon-box" data-aos="fade-up" data-aos-delay="200">
			<center><img src="Views/assets1/images/proteger.png" width="70px" alt="30px" srcset=""></center><br>
		  <center><h4 class="title">Seguridad</h4></center>
		  <p class="description">Cuenta con un sistema de seguridad para tu información privada y movimientos</p>
		</div>
	  </div>

	  <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
		<div class="icon-box" data-aos="fade-up" data-aos-delay="300">
			<center><img src="Views/assets1/images/reembolso.png" width="70px" alt="30px" srcset=""></center><br>
		  <center><h4 class="title">Reembolsos</h4></center>
		  <p class="description">Algunos productos cuentan con reembolso en caso necesario</p>
		</div>
	  </div>

	  <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
		<div class="icon-box" data-aos="fade-up" data-aos-delay="400">
			<center><img src="Views/assets1/images/porcentaje.png" width="70px" alt="30px" srcset=""></center><br>
		  <center><h4 class="title">Productos garantizados</h4></center>
		  <p class="description">Los productos son de buena calidad y cuentan con garantia</p>
		</div>
	  </div>
	</div>
  </div>
</section><!--Final cajas--><br><br><br>

  

 
  <?php include_once 'Views/template-principal/footer.php'; ?>
  <script></script>
  
</body>

</html>