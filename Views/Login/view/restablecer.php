<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar mi contraseña</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="../dist/style.css">
  <script src="https://kit.fontawesome.com/bcbd8b5d8b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../resources/css/sweet.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
  <div class="form-container sign-in-container">
      <form action="../model/email.php" method="post">
        <img src="../dist/Logo text abajo.png" width="150px">
			<br>
			<h1>RECUPERAR MI CONTRASEÑA</h1><br>
			<input type="email" placeholder="Correo Electrónico" name="correoUsuario" required/><br>
			<button id="b" type="submit" onclick="restablecer();">Restablecer</button>
            <script src=../controller/Contraseña/recuperar.js></script>
      </form> 
  </div>
</div>

</body>
</html>
