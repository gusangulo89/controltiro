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
    }else if($_SESSION["idcatrol"] == 3){
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
<?php
	$list_arma = new Consultainfo();
	$arma = $list_arma->get_informacion("select * from catarmas");
?>
<div class="container p-4">
	<div class="row p-1">
		<div class="col-md-12">
			<h2 class="text-center">CAT&Aacute;LOGO DE ARMAS</h2>	
		</div>
	</div>
	<button id="nuevo" class="btn btn-success" onclick="registrarNuevaArma()" data-toggle="tooltip" data-placement="bottom" title="Agregar">
		<i class="fas fa-edit"></i> &nbsp; Nueva Arma
	</button>
	<div class="row pt-3">
		<div class="col-md-12">
			<table id="tableSectores" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Id</th>
					<th>Tipo de Arma</th>
					<th>Calibre</th>
					<th>Observaciones</th>
					<th></th>
				</thead>
				<tbody>
				<?php
					foreach($arma as $detarma):
				?>
					<tr>
						<td><?php echo $detarma["idcatarmas"]; ?></td>
						<td><?php echo $detarma["tipoarma"]; ?></td>
						<td><?php echo $detarma["calibre"]; ?></td>
						<td><?php echo $detarma["observaciones"]; ?></td>
						<td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-success"
									    data-toggle="tooltip" data-placement="bottom" title="Actualizar" 
										onclick="consultaArma(<?php echo $detarma['idcatarmas']; ?>)">
									    <i class="far fa-edit" style="width: 17px; height:17px;"></i>
									</button>
								</div>
								<div class="form-group">
								    <button type="button" class="btn btn-danger"
									    data-toggle="tooltip" data-placement="bottom" title="Eliminar" 
										onclick="eliminarArma(<?php echo $detarma['idcatarmas']?>)">
									    <i class="fas fa-trash-alt" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
						</td>
					</tr>
				<?php
					endforeach;
				?>
				</tbody>
			</table>	
		</div>
	</div>
</div>
<!-- M O D A L E S -->
	<div class="modal fade" id="modalNuevaArma" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Registro nuevo armamento.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="tipoarma" class="control-label"><strong>Tipo de Arma:</strong></label>
									<input type="text" class="form-control" id="tipoarma" name="tipoarma" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="calibre" class="control-label"><strong>Calibre:</strong></label>
									<input type="text" class="form-control" id="calibre" name="calibre" value="">
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
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="guardarArma()">
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

	<div class="modal fade" id="modal-udp-arma" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h3 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Actualizaci&oacute;n datos Arma.</h3>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" id="udparmaid" name="armaid" value="" hidden>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="udptipoarma" class="control-label"><strong>Tipo Arma:</strong></label>
									<input type="text" class="form-control" id="udptipoarma" name="udptipoarma" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="udpcalibre" class="control-label"><strong>Tipo de Sector:</strong></label>
									<input type="text" class="form-control" id="udpcalibre" name="udpcalibre" value="">
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
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="udpArma()">
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

	<div class="modal fade" id="modal-add-sector" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Proceso correcto.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div id="txt-add-sector">

					</div>
				</div>
        	</div>
		</div>
	</div>

	<div class="modal fade" id="modal-del-sector" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content eliminar-row-crud">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Sector borrado de Base de Datos.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div id="txt-del-sector">

					</div>
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
		
		$(document).ready(function(){
			$('#tableSectores').dataTable({
				"destroy":true,
            	"language": {
                	"url": "json/spanish.json"
            	}
			});
		});
	</script>
  </body>
</html>