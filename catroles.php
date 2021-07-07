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
<?php
	$rows_roles = new Consultainfo();
	$roles = $rows_roles->get_informacion("select * from catroles");
?>
<div class="container p-4">
	<div class="row p-1">
		<div class="col-md-12">
			<h2 class="text-center">CAT&Aacute;LOGO DE ROLES.</h2>	
		</div>
    </div>
    <div class="row p-1">
        <div class="col-md-6">
			<div class="form-group">
	            <button id="nuevousr" class="btn btn-success" onclick="nuevoRol()" data-toggle="tooltip" data-placement="bottom" title="Agregar nuevo rol de Usuario">
		            <i class="fas fa-list"></i> &nbsp; Nuevo Perfil de Acceso al Sistema
                </button>
            </div>
        </div>
        <div class="col-md-3">
		
        </div>
        <div class="col-md-3">
			
        </div>
    </div>
	<div class="row pt-3">
	    <div class="col-md-12">
			<table id="tableRoles" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Id</th>
					<th>Rol de Acceso</th>
					<th>Observaciones</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					<?php
						$list_rol = new Consultainfo();
						$roles = $list_rol->get_informacion("select * from catroles");
							foreach($roles as $detroles):
					?>
				<tr>
					<td><?php echo $detroles["idcatrol"]; ?></td>
					<td><?php echo $detroles["rolnombre"]; ?></td>
					<td><?php echo $detroles["observaciones"]; ?></td>
					<td>
						<div class="text-center">
           					<div class="form-group">
		    					<button type="button" class="btn btn-success"
			        				data-toggle="tooltip" data-placement="bottom" title="Actualizar" 
			    					onclick="consultaRol(<?php echo $detroles['idcatrol']; ?>)">
		    	    				<i class="far fa-edit" style="width: 17px; height:17px;"></i>
								</button>
							</div>
						</div>
					</td>
					<td>
						<div class="text-center">
							<div class="form-group">
								<button type="button" class="btn btn-danger"
									data-toggle="tooltip" data-placement="bottom" title="Eliminar" 
									onclick="eliminarRol(<?php echo $detroles['idcatrol']; ?>)">
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
</div>
<!-- M O D A L E S -->
	<div class="modal fade" id="modalNuevoRol" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content act-datos-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-clipboard-list"></i>&nbsp;Nuevo perfil de acceso al Sistema.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color: white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body scroll-modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="nombrerol" class="control-label"><strong>Nombre del Perfil de Acceso:</strong></label>
									<input type="text" class="form-control" id="nombrerol" name="nombrerol" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="observacionesrol" class="control-label"><strong>Observaciones:</strong></label>
									<input type="text" class="form-control" id="observacionesrol" name="observacionesrol">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="saveRol()">
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
    

    <div class="modal fade" id="modalUDPRol" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content act-datos-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-clipboard-list"></i>&nbsp;Actualizaci&oacute;n Perfil de Acceso al Sistema.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color: white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body scroll-modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
                                <label for="udpnombrerol" class="control-label"><strong>Nombre del Perfil de Acceso:</strong></label>
                                    <input type="text" class="form-control" id="udprolid" name="udprolid" value="" hidden>
									<input type="text" class="form-control" id="udpnombrerol" name="udpnombrerol" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="observacionesrol" class="control-label"><strong>Observaciones:</strong></label>
									<input type="text" class="form-control" id="udpobservacionesrol" name="udpobservacionesrol">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="udpRol()">
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
			$('#tableRoles').dataTable({
				"destroy":true,
            	"language": {
                	"url": "json/spanish.json"
            	}
			});
			$('#tableRoles').dataTable({
				"destroy":true,
            	"language": {
                	"url": "json/spanish.json"
            	}
			});
		});
	</script>
  </body>
</html>