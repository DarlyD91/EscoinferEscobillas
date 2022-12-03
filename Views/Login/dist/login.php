<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="../css/validacion.css">
  <script src="https://kit.fontawesome.com/6131ecdde6.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--Sweet Alert-->
  <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">

</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form id="frm-usuario" class="b" action="../model/registro.php" method="post">
			<img src="Logo text abajo.png" width="150px">
			<br>
			<h1>REGÍSTRATE</h1><br>
			<!--Campo Nombre-->
			<div class="form-group" id="g-nombreUsuario">
				<div class="form-group-input">
					<input id="nombreUsuario" type="text" class="frm-input" placeholder="Nombres" name="nombreUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">5 a 20 letras mayusculas o minusculas.</span>
				</div>
			</div>
			<!--Campo Apellido-->
			<div class="form-group" id="g-apellidoUsuario">
				<div class="form-group-input">
					<input id="apellidoUsuario" type="text" class="frm-input" placeholder="Apellidos" name="apellidoUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">5 a 20 letras mayusculas o minusculas.</span>
				</div>
			</div>
			<!--Campo Direccion-->
			<div class="form-group" id="g-direccionUsuario">
				<div class="form-group-input">
					<input id="direccionUsuario" type="text" class="frm-input" placeholder="Direccion" name="direccionUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">4 a 16 dígitos y solo puede contener numeros y letras</span>
				</div>
			</div>
			<!--Campo Documento-->
			<div class="form-group" id="g-documentoUsuario">
				<div class="form-group-input">
					<input id="documentoUsuario" type="number" class="frm-input" placeholder="Documento" name="documentoUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">4 a 16 dígitos y solo puede contener numeros</span>
				</div>
			</div>
			<!--Campo Telefono-->
			<div class="form-group" id="g-telefonoUsuario">
				<div class="form-group-input">
					<input id="telefonoUsuario" type="number" class="frm-input" placeholder="Telefono" name="telefonoUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">4 a 16 dígitos y solo puede contener numeros</span>
				</div>
			</div>
			<!--Campo Correo-->		
			<div class="form-group" id="g-correoUsuario">
				<div class="form-group-input">
					<input id="correoUsuario" type="text" class="frm-input" placeholder="Correo" name="correoUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">letras, numeros, puntos, guiones.</span>
				</div>
			</div>
			<!--Campo Contraseña-->
			<div class="form-group" id="g-passwordUsuario">
				<div class="form-group-input">
					<input id="passwordUsuario" type="password" class="frm-input" placeholder="Contraseña" name="passwordUsuario"/>
					<i class="fa-solid fa-circle-check frm-icono"></i>
					<span class="msn-error">de 4 a 12 dígitos.</span>
				</div>
			</div>
			<!--Boton "registrarse"-->
			<button id="b" type="submit">Regístrate</button>
			<!--<script src=../js/alertas.js></script>   onclick="ErrorRegistroCorreo()"-->
		</form>
	</div>
	<!---->
	<div class="form-container sign-in-container">
		<form action="../model/validar.php" method="post">
			
			<img src="Logo text abajo.png" width="150px">
			<br>
			<h1>INICIAR SESIÓN</h1><br>
			<input type="email" placeholder="Correo Electrónico" name="correoUsuario" required/>
			<input type="password" placeholder="Contraseña" name="passwordUsuario" required/>
			<a href="#">Olvidaste tu contraseña?</a>
			<button id="b" type="submit">Ingresar</button>
			<script src=../js/login.js></script>
			<!---->
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
<!-- partial -->
  <script  src="./script.js"></script>
  <script  src="../js/validacion.js"></script>
  <script  src="../sweetalert/dist/sweetalert2.all.min.js"></script>

</body>
</html>