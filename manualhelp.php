<?php
//librerias necesarias de php
include ("menu.php");
include ("heather-and-footer.php");
include ("modal-messages.php");
include ("sqlmetodos.php");

session_start();

	if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
		echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
		header("location:index.php?nologin=false");
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
       switch($_SESSION["idcatrol"]){
		case 1:
			menuAdministrador();
		break;
		
		case 2:
			menuUsuario();
		break;

		case 3:
			menuConsultaUsuario();
		break;

		default:
			echo utf8_decode("Menú no disponible");
	break;

	}
    ?>  		
<!-- Cuerpo de la p�gina -->
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Manual de Usuario</h1>
                <p>
                    En este apartado encontrar&aacute; toda la ayuda necesaria para poder operar el SCCP v. 1.0, desde el manejo de cat&aacute;logos,
                    as&iacute; como la generaci&oacute;n de folios y el control de los mismos.
                </p>
                <p>
                    La administraci&oacute;n de usuario va comprometida con los roles de acceso, o mejor dicho los perfiles de acceso al sistema. Este
                    sistema est&aacute; diseñado para llevar la gesti&oacute;n de cada uno de los folios as&iacute; como la administraci&oacute;n de 
                    cat&aacute;logos, como podr&aacute; observar el sistema se divide en tres apartados, manejo de cat&aacute;logos, generaci&oacute;n
                    de folios y administraci&oacute;n del sistema.
                </p>
        </div>
    </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-12">
        <h2>Vista Previa del Manual de Usuario.</h2>
		<embed src="manual/manualUsuarioSCCP.pdf#page=1&zoom=130&navpanes=1&scrollbar=0" type="application/pdf" width="100%" height="600px" />
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>
<!-- M O D A L E S -->
	<div class="modal fade" id="modalNuevoGrado" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>Nuevo Grado.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="grado" class="control-label"><strong>Descripci&oacute;n Grado:</strong></label>
									<input type="text" class="form-control" id="grado" name="grado" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="observaciones" class="control-label"><strong>Observaciones:</strong></label>
									<input type="text" class="form-control" id="observaciones" name="observaciones" value="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="guardaGrado()">
							<i class="fas fa-save"></i>
							Guardar
					   	</button>
					   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" data-dismiss="modal">
							<i class="fas fa-times"></i>
							Cancelar
					   	</button>
				</div>
        	</div>
		</div>
	</div>

	<div class="modal fade" id="modal-udp-grado" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h3 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Actualizaci&oacute;n registro Situaci&oacute;n.</h3>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="udpgradoid" name="udpgradoid" value="" hidden>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="udpgrado" class="control-label"><strong>Descripci&oacute;n de Situaci&oacute;n:</strong></label>
									<input type="text" class="form-control" id="udpgrado" name="udpgrado" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="udpobservaciones" class="control-label"><strong>Observaciones:</strong></label>
									<input type="text" class="form-control" id="udpobservaciones" name="udpobservaciones" value="">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="udpGrado()">
							<i class="fas fa-save"></i>
							Guardar
					   	</button>
					   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" data-dismiss="modal">
							<i class="fas fa-times"></i>
							Cancelar
					   	</button>
				</div>
        	</div>
		</div>
	</div>
	<hr>
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
		
		$(document).ready(function(){
			$('#tableGrados').dataTable({
				"destroy":true,
            	"language": {
                	"url": "json/spanish.json"
            	}
			});
		});
	</script>
  </body>
</html>