<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title"><i class="fas fa-cart-arrow-down"></i> Carrito</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <center><table class="table-bordered table-striped table-hover align-middle center" id="tableListaCarrito" style="width: 100%;">
          <thead>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>SubTotal</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table></center>
      </div>
      <div class="d-flex justify-content-around mb-3">
        <h3 id="totalGeneral"></h3>
        <?php if (!empty($_SESSION['correoUsuario'])) { ?>
      <!--</div>-->
      <a class="btn btn-primary" href="<?php echo BASE_URL . 'principal/cliente'; ?>">Procesar pedido</a>
      <?php }else{?>
        <a class="btn btn-primary" href="<?php echo BASE_URL . 'principal/login'; ?>" onclick="abrirModalLogin();">Inicia sesion</a>
        <?php } ?>
    </div>
  </div>
</div>
</div>


<!--Footer-->
<footer class="ftco-footer bg-light ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="bi bi-chevron-double-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Escoinfer Escobillas</h2>
              <p>Gracias por visitarnos.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="shop.html" class="py-2 d-block">Tienda</a></li>
                <li><a href="about.html" class="py-2 d-block">Sobre Nosotros</a></li>
                <li><a href="contact.html" class="py-2 d-block">Contactanos</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Ayuda</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li class="py-2 d-block">Terminos &amp; Condiciones</li>
	                <li class="py-2 d-block">política de Privacidad</li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block"></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Tienes dudas?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Carrera 5bis #11B 15Sur, Usme, Bogotá, Colombia</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+57 311-878-8351</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Escoinferel@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
			<img src="<?php echo BASE_URL; ?>Views/assets1/images/Logo text derecha.png" alt="200px" width="320px"><br><br>

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Escoinfer Escobillas <i class="icon-heart color-danger" aria-hidden="true"></i>  <a href="https://colorlib.com" target="_blank"></a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
  <!-- End Footer -->

  <!-- Start Script -->
  <script src="<?php echo BASE_URL; ?>Views/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/templatemo.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/all.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/sweetalert2.all.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/carrito.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/login.js"></script>
  <script>
    const base_url = '<?php echo BASE_URL; ?>';
  </script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/carrito.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets/js/login.js"></script>
  <!-- End Script -->


  
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/popper.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/bootstrap.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery.stellar.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/owl.carousel.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/aos.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/scrollax.min.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/google-map.js"></script>
  <script src="<?php echo BASE_URL; ?>Views/assets1/js/main.js"></script>

  