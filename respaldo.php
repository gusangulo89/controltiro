<?php
//librerias necesarias de php
include ("menu.php");
include ("heather-and-footer.php");
include ("modal-messages.php");
include ("sqlmetodos.php");

session_start();
    if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
	    echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
	    header("location:index?nologin=false");
    }else if($_SESSION["idcatrol"] != 1){
	        echo "<script> alert('No tiene los permisos necesarios para operar este cat\u00E1logo. Consulte al administrador del sistema.')";
	        header("location:principal");
        }
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
	<!-- Barra de Usuario y cierr de Sesi�n -->
	<?php 
	   barra_cierre_sesion();
	?>
	
	  <!-- Menu of navigation -->
	<?php 
        menuAdministrador();
    ?>  		
<!-- Cuerpo de la p�gina -->
<div class="container p-4">
	<div class="jumbotron">
		<h1 class="display-4">Respaldo de Base de Datos.</h1>
  		<p class="lead">Esto es un m&oacute;dulo de respaldo de bases de datos del Sistema de Control y Captura de Personal. Es importante generar
			los respaldos de su sistema para tener la informaci&oacute;n asegurada de su sistema, lo recomendable es hacerlo cada semana.
		</p>
  		<hr class="my-4">
  		<p>Haga clic en el bot&oacute;n azul para realizar su respaldo.</p>
  		<button class="btn btn-primary btn-lg" href="#" role="button" onclick="respaldar()">Ejecutar Respaldo</button>
	</div>
</div>
<!-- M O D A L E S -->
	<div class="modal fade" id="modalRespaldo" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content act-datos-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-database"></i>&nbsp;Generando Respaldo de la Base de Datos.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color: white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body scroll-modal-body">
					<div class="container">
						<div class="progress">
  							<div id="dynamic" class="progress-bar progress-bar-striped bg-info active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
    							<span class="barraProgreso" id="current-progress"></span>
  							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" data-dismiss="modal">
							<i class="fas fa-times"></i>
							Cancelar
					   	</button>
				</div>
        	</div>
		</div>
    </div>
<?php
    
    //pie();
    
?>

<!-- Validaci�n de contacto -->
	
<!-- Librerias JS -->
	<?php 
	   libreriasJS();
	?>
	<script type="text/javascript">
		$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			  //$('[data-toggle="tooltip"]').html("<div style='background-color: red;'></div>");
		});
	</script>
  </body>
</html>