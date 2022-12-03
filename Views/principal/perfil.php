<?php include_once 'Views/template-principal/header.php'; ?>

<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body shadow-lg">
                    <div class="modal-body">
                        <table class="table-bordered table-striped table-hover align-middle" id="tableListaProductos" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <h3 id="totalProductos"></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-lg" id="rompe">
                <div class="dropdown" id="rompe">
                    <a class="nav-link dropdown-toggle float-end" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASE_URL . 'clientes/salir' ?>"><i class="fas fa-times-circle"></i> Cerrar Sesión</a></li>
                    </ul>
                </div>
                <div class="card-body text-center">
                    <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'Views/assets/img/clientes/default.png' ?>" alt="" id="rompe">
                    <a type="nav-link" href="<?php echo BASE_URL . 'Views/perfil/perfil.php' ?>">Ver Perfil</a>
                    <hr>
                    <p>Escoinfer E</p>
                    <p><?php echo $_SESSION['correoUsuario'] ?></p>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item" id="prp">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="prpr">
                                    Paypal
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="prp">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="prpr">
                                    Otros metodos de pago
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<?php include_once 'Views/template-principal/footer.php'; ?>
<script src="<?php echo BASE_URL . 'Views/assets/js/clientes.js'; ?>"></script>

</body>

</html>