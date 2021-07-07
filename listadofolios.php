<?php
//librerias necesarias de php
include ("menu.php");
include ("heather-and-footer.php");
include ("modal-messages.php");
session_start();
if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
	echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
	header("location:index?nologin=false");
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
<div class="container">
	<!--<form action="">-->
		<div class="row justify-content-center pt-3">
			<div class="col-md-12">
					<div class="form-group text-center">
						<h2 class="display-5">CONSULTA DE FOLIOS </h2>
					</div>
			</div>
		</div>
		<div class="row justify-content-center pt-3">
			<div class="form-group formulario">
				<div class="row justify-content-center">
					<label class="control-label text-dark"><strong>N&Uacute;MERO DE FOLIO</strong></label>
				</div>
				<div class="row justify-content-center">
					<div class="form-group mx-sm-4">
					<input type="text" class="form-control" id="bus-nofolio" name="bus-nofolio" placeholder="N&uacute;mero de Folio">
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="form-group mx-sm-4">
						<button type="button" class="btn btn-primary" id="noempleado" name="noempleado" onclick="consultaFolio()" >
							<i class="fas fa-search"></i>
				  			Buscar Folio
						</button>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<hr>
	<!--</form>-->
</div>

<!-- Mensajes y alertas modales -->
		<div class="modal fade" id="modal-folio" tabindex="-1" role="dialog">
    	    <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content consulta-folio">
            		<div class="modal-header">
            		  <h3 class="modal-title" id="myModalLabel"></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
					</div>
					<div class="modal-body">
						<input class="form-control" type="text" id="udp-folio">
           	    	</div>   
            	   	<div class="modal-body scroll-modal-body">
                		<div class="row">
							<div id="muestraFolio">

							</div>
						</div>                   
            	    </div>
				    <div class="modal-footer">
				   		<button type="button" class="btn btn-info" name="modificar" id="modificar" onclick="modificafolio()">
							<i class="fas fa-pencil-alt"></i>
						  	Modificar
					    </button>
					    <button type="button" class="btn btn-light" name="imprimir" id="imprimir" onclick="muestraReporte()">
							<i class="fas fa-file-pdf"></i>
							Imprimir
					   	</button>
					   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" data-dismiss="modal">
							<i class="fas fa-times"></i>
							Cancelar
					   	</button>                    
            	    </div>
        	   </div>
		    </div>
	   	</div>
	   	<!-- Mensaje de error de modal -->
	   	<div class="modal fade" id="modal-folio-error" tabindex="-1" role="dialog">
    	    <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content folio-no-existe">
            		<div class="modal-header">
            		  <h3 class="modal-title" id="myModalLabel"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;ERROR EL FOLIO INGRESADO NO EXISTE&nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
            	   	</div>
            	   	<div class="modal-body">
					   <div id="textoerror"> </div>
            	    </div>
        	   </div>
		    </div>
		</div>
		<!-- Modal que contiene el reporte PDF -->
		<div class="modal fade" id="modal-folio-pdf" tabindex="-1" role="dialog">
    	    <div class="modal-dialog modal-xl">
                <div class="modal-content folio-fondo-pdf">
            		<div class="modal-header">
            		  <h3 class="modal-title" id="myModalLabel"><i class="fas fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;<strong>REPORTE PDF DEL FOLIO</strong></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
            	   	</div>
            	   	<div class="modal-body">
						<div id="objetopdf">
							
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
    mensajesmodales();
?>

<!-- Pie de P�gina -->
<?php
    
    //pie();
    
?>

<!-- Validaci�n de contacto -->
	
<!-- Librerias JS -->
	<?php 
	   libreriasJS();
	?>
  </body>
</html>
