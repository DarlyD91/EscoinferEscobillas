<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/dist/style.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>Views/src/styles.css">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>Views//assets3/img/escoinfer/logo.png">
  <script src="https://kit.fontawesome.com/bcbd8b5d8b.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" id="container">
  <div class="form-container sign-up-container">
      <form action="<?php echo BASE_URL; ?>Controllers/Usuario/add.php" method="post" class="formulario" id="formulario"><br>
       <!--<img src="<?php echo BASE_URL; ?>Views/dist/Logo text abajo.png" width="100px">-->
        <input type="hidden" name="idUsuario">
        <h1><center>REGISTRATE</center></h1>
          <!-- Campo: Nombre -->
          <div class="formulario__grupo" id="grupo__nombre">
              <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Nombre">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">Tiene que ser de 4 a 16 dígitos (letras y guion bajo).</p>
          </div>
          <!-- Campo: Apellido -->
          <div class="formulario__grupo" id="grupo__apellido">
              <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="apellido" id="apellido" placeholder="Apellido">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">Tiene que ser de 4 a 16 dígitos (letras y guion bajo).</p>
          </div>
          <!--Campo: Documento-->
          <div class="formulario__grupo" id="grupo__documento">
              <div class="formulario__grupo-input">
                  <input type="number" class="formulario__input" name="documento" id="documento" placeholder="Numero de documento">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">Debe tener minimo 8 caracteres y maximo de 10.</p>
          </div>
          <!--Campo: Direccion-->
          <div class="formulario__grupo" id="grupo__direccion">
              <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Direccion">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">Debe tener minimo 7 caracteres y maximo de 50.</p>
          </div>
          <!-- Campo: Teléfono -->
          <div class="formulario__grupo" id="grupo__telefono">
              <div class="formulario__grupo-input">
                  <input type="number" class="formulario__input" name="telefono" id="telefono" placeholder="Telefono">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">Solo puede contener numeros, maximo 15 dígitos.</p>
          </div>
          <!-- Campo: Correo Electronico -->
          <div class="formulario__grupo" id="grupo__correo">
              <div class="formulario__grupo-input">
                  <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo electronico">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">El correo debe coincidir con el siguiente formato: "correo@dominio.extension"</p>
          </div>
          <!-- Campo: Contraseña -->
          <div class="formulario__grupo" id="grupo__password">
              <div class="formulario__grupo-input">
                  <input type="password" class="formulario__input" name="password" id="password" placeholder="Contraseña">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
              </div>
              <p class="formulario__input-error">Tiene que ser de 4 a 12 dígitos.</p>
          </div>
        
          <!-- Campo: Terminos y Condiciones -->
			<div class="formulario__grupo" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Aceptar Terminos y Condiciones
				</label>
			</div>

          <button id="b" type="submit"  class="bio">Regístrate</button>
      </form>
  </div>
  <div class="form-container sign-in-container">
      <form action="<?php echo BASE_URL; ?>Controllers/Usuario/Login.php" method="post">
        <img src="<?php echo BASE_URL; ?>Views/dist/Logo text abajo.png" width="150px">
			<br>
			<h1>INICIAR SESIÓN</h1><br>
			<input type="email" placeholder="Correo Electrónico" class="v" name="correoUsuario" required/>
			<input type="password" placeholder="Contraseña" name="passwordUsuario" class="v" required/>
			<a href="<?php echo BASE_URL; ?>Controllers/Contraseña/restablecer.php">Olvidaste tu contraseña?</a>
			<button id="b" type="submit">Ingresar</button>
     </form> 
  </div>
  <div class="overlay-container">
      <div class="overlay">
          <div class="overlay-panel overlay-left">
            <div id="whiter">
              <h1>Bienvenido</h1>
              <p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
              <button class="ghost" id="signIn">Iniciar sesión</button>
            </div>
          </div>
          <div class="overlay-panel overlay-right">
            <div id="whiter">
                <h1>Bienvenido</h1>
                <p>Si no tienes una cuenta Regístrate aqui.</p>
                <button class="ghost" id="signUp">Regístrate</button>
            </div>
        </div>
      </div>
  </div>
</div>

<script src="<?php echo BASE_URL; ?>Views/src/script.js"></script>
<script src="<?php echo BASE_URL; ?>Views/src/alerta.js"></script>
<script src="<?php echo BASE_URL; ?>Views/src/login.js"></script>
<script src="<?php echo BASE_URL; ?>Views/src/validacion.js"></script>

</body>
</html>