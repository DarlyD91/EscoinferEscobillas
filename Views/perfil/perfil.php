<?php
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos	
	$active_perfil="active";	
	$title="Perfil";
	
	$query_empresa=mysqli_query($con,"select * from usuario where idUsuario=1");
	$row=mysqli_fetch_array($query_empresa);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>
  </head>
  <body>
<br>
	<br>

	<div class="container">
      <div class="row">
      <form method="post" id="perfil">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
   
   
          <div class="panel panel-warning"><br>
              <h2 class="panel-title"><center><font size="5"><i class='glyphicon glyphicon-user'></i>PERFIL</font></center></h2>

            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				<div id="load_img">
					<img class="img-responsive" src="<?php echo $row['perfil'];?>" alt="Logo">
					
				</div>
				<br>				
					<div class="row">
  						<div class="col-md-12">
							<div class="form-group">
								<input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
							</div>
						</div>
						
					</div>
				</div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                      <tr>
                        <td class='col-md-3'>Nombres:</td>
                        <td><input type="text" class="form-control input-sm" name="nombreUsuario" value="<?php echo $row['nombreUsuario']?>" required></td>
                      </tr>
                      <tr>
                        <td>Apellido:</td>
                        <td><input type="text" class="form-control input-sm" name="apellidoUsuario" value="<?php echo $row['apellidoUsuario']?>" required></td>
                      </tr>
                      <tr>
                        <td>Correo:</td>
                        <td><input type="email" class="form-control input-sm" required name="correoUsuario" value="<?php echo $row['correoUsuario']?>"></td>
                      </tr>
					  <tr>
                        <td>Contraseña:</td>
                        <td><input type="text" class="form-control input-sm" name="passwordUsuario" placeholder="Nueva contraseña" required></td>
                      </tr>
					  <tr>
                        <td>Confirmar contraseña:</td>
                        <td><input type="text" class="form-control input-sm" name="passwordUsuario" placeholder="Confirme su contraseña" required></td>
                      </tr>
					  <tr>
                        <td>Telefono:</td>
                        <td><input type="number" class="form-control input-sm" name="telefonoUsuario" value="<?php echo $row["telefonoUsuario"];?>" required></td>
                      </tr>
                        
                     
                    </tbody>
                  </table>
                  
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">
                                         
                <button type="submit" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-refresh"></i> Actualizar Perfil</button>
   
                    </div>
            
          </div>
        </div>
		</form>
      </div>

	
	<?php
	include("footer.php");
	?>
  </body>
</html>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>
<script>
$( "#perfil" ).submit(function( event ) {
  $('.guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_perfil.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('.guardar_datos').attr("disabled", false);

		  }
	});
  event.preventDefault();
})


</script>

<script>
		function upload_image(){
				
				var inputFileImage = document.getElementById("imagefile");
				var file = inputFileImage.files[0];
				if( (typeof file === "object") && (file !== null) )
				{
					$("#load_img").text('Cargando...');	
					var data = new FormData();
					data.append('imagefile',file);
					
					
					$.ajax({
						url: "ajax/imagen_ajax.php",//Url a la que se envía la solicitud
						type: "POST",             	//Tipo de solicitud a enviar, llamada como método
						data: data, 			  	//Datos enviados al servidor, un conjunto de pares clave/valor (es decir, campos de formulario y valores)
						contentType: false,       	//El tipo de contenido utilizado al enviar datos al servidor.
						cache: false,             	
						processData:false,        	//Para enviar DOMDocument o archivo de datos no procesados, se establece en falso
						success: function(data)   	//Una función que se llamará si la solicitud tiene éxito
						{
							$("#load_img").html(data);
							
						}
					});	
				}
				
				
			}
    </script>

