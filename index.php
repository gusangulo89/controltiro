<?php 
    //librerias necesarias de php
    include ("heather-and-footer.php");
    include ("modal-messages.php");
?>

<!DOCTYPE html>
<html lang="es">
    <!-- Etiqueta head -->
  	<?php 
        cabeceroPrincipal();
  	?>
	<body>
    <!-- Cabecero de cada pantalla -->
	<?php 
	   cabecera();
	?>  		
<!-- Cuerpo de la p�gina -->
<div class="mx-auto fondo-login">
	<div class="container" id="enter">
		<div class="row justify-content-center pt-5 mt-5 mr-1">
			<div class="col-md-6 pt-5 formulario">
				<div class="form-group text-center pt-3">
					<h1 class="text-light">Iniciar Sesi&oacute;n</h1>
				</div>
				<div class="form-group mx-sm-4 pb-3">
					<input type="text" id="username" class="form-control fondo-input" placeholder="Ingrese su Usuario">
				</div>
				<div class="form-group mx-sm-4 pb-3">
					<input type="password" id="password" class="form-control fondo-input"	placeholder="Ingrese su Contrase&ntilde;a">
				</div>
				<div class="form-group mx-sm-4 pb-3">
					<input type="button" class="btn btn-block ingresar"	value="Ingresar" onclick="iniciarSesion()">
				</div>
			</div>
			<div class="col-md-6 pt-5 formulario">
				<img src="img/login_001.jpg" class="img-fluid" alt="Responsive image" >
			</div>
		</div>
		<br>
		<br>
	</div>
</div>
<qrcode value="Value to Coder" ec="H" style="width: 50mm; background-color: white; color: black;"></qrcode>	
	<br>
<!-- Mensajes y alertas modales -->
	<div class="modal fade" id="modal-usuario" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content eliminar-row-crud">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><div id="txt-titulo"></div></h2>
                	   	<button type="button" style="color: white;" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div id="txt-message">

					</div>
				</div>
        	</div>
		</div>
	</div>

<!-- Pie de P�gina -->
<?php
    
    pie();
    
?>

<!-- Validaci�n de contacto -->
	
<!-- Librerias JS -->
	<?php 
	   libreriasJS();
	?>
	
	</script>
	<script type="text/javascript">
	window.onload = verificaInicioSesion();
	function verificaInicioSesion() {
		var url = window.location.href;
		var resp = url.substr(-5);
		if(resp == "false"){
		   $("#txt-titulo").html("<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;&nbsp;Alerta");
		   $("#txt-message").html("Debe iniciar sesi\u00F3n con un usuario v\u00E1lido, consulte al administrador del sistema. Presione enter "
		   +"para continuar");
		   $("#modal-usuario").modal("show");
		}
		
		//alert(resp);
	}
</script>
  </body>
</html> 