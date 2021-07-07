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
	$list_grados = new Consultainfo();
	$grados = $list_grados->get_informacion("select * from catgrados");
?>
<div class="container p-4">
	<div class="row p-1">
		<div class="col-md-12">
			<h2 class="text-center">CAT&Aacute;LOGO DE GRADOS JERARQU&Iacute;COS.</h2>	
		</div>
	</div>
	<button id="nuevo" class="btn btn-success" onclick="agregarGrado()" data-toggle="tooltip" data-placement="bottom" title="Agregar">
		<i class="fas fa-edit"></i> &nbsp; Nuevo Grado
	</button>
	<div class="row pt-3">
		<div class="col-md-12">
			<table id="tableGrados" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Id</th>
					<th>Descripci&oacute;n Grado</th>
					<th>Observaciones</th>
					<th></th>
                    <th></th>
				</thead>
				<tbody>
				<?php
					foreach($grados as $detgrados):
				?>
					<tr>
						<td><?php echo $detgrados["idcatgrados"]; ?></td>
						<td><?php echo $detgrados["nombre"]; ?></td>
						<td><?php echo $detgrados["observaciones"]; ?></td>
						<td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-success"
									    data-toggle="tooltip" data-placement="bottom" title="Actualizar" onclick="consultaGrado(<?php echo $detgrados['idcatgrados']; ?>)">
									    <i class="far fa-edit" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
						</td>
                        <td>
                            <div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-danger"
									    data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="eliminarGrado(<?php echo $detgrados['idcatgrados']; ?>)">
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