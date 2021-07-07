<?php
//librerias necesarias de php
include ("menu.php");
include ("heather-and-footer.php");
include ("sqlmetodos.php");
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
	$list_usuarios = new Consultainfo();
	$usuarios = $list_usuarios->get_informacion("select * from usuarios");
?>
<div class="container p-4">
	<div class="row p-1">
		<div class="col-md-12">
			<h2 class="text-center">ADMINISTRACI&Oacute;N DE USUARIOS.</h2>	
		</div>
    </div>
    <div class="row p-1">
        <div class="col-md-3">
            <div class="form-group">
	            <button id="nuevorol" class="btn btn-info" onclick="verRoles()" data-toggle="tooltip" data-placement="bottom" title="Agregar">
		            <i class="fas fa-list"></i> &nbsp; Roles de Usuarios
                </button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
	            <button id="nuevousr" class="btn btn-success" onclick="newUser()" data-toggle="tooltip" data-placement="bottom" title="Operaciones">
		            <i class="fas fa-user-plus"></i> &nbsp; Nuevo Usuario
                </button>
            </div>
        </div>
        <div class="col-md-6">
			<div class="form-group">
	            <button id="nuevorol" class="btn btn-secondary" onclick="editUsuario()" data-toggle="tooltip" data-placement="bottom" title="Agregar">
		            <i class="fas fa-list"></i> &nbsp; Editar datos del usuario.
                </button>
            </div>
        </div>
    </div>
	<div class="row pt-3">
		<div class="col-md-12">
			<table id="tableUsuarios" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Username</th>
                    <th>Fecha Alta</th>
                    <th>Fecha &Uacute;ltima Mod.</th>
                    <th>Vencimiento</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
				<?php
					foreach($usuarios as $detusuarios):
				?>
					<tr>
						<td><?php echo $detusuarios["id"]; ?></td>
						<td><?php echo $detusuarios["nombre"]; ?></td>
                        <td><?php echo $detusuarios["apellido"]; ?></td>
                        <td><strong><?php echo $detusuarios["username"]; ?></strong></td>
                        <td><?php echo $detusuarios["fechaalta"]; ?></td>
                        <td><?php echo $detusuarios["fechaultimamod"]; ?></td>
                        <td><?php echo $detusuarios["dfechavencimiento"]; ?></td>
						<td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-success" id="consultaUsuario"
									    data-toggle="tooltip" data-placement="bottom" title="Actualizar" onclick="verRoles()">
									    <i class="fas fa-user-edit" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
						</td>
						<td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-outline-info"
									    data-toggle="tooltip" data-placement="bottom" title="Roles de Usuario" onclick="consultaUsuario()">
									    <i class="fas fa-list" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
                        </td>
                        <td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-outline-warning"
									    data-toggle="tooltip" data-placement="bottom" title="Reestablecer Password" onclick="consultaUsuario()">
									    <i class="fas fa-user-lock" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
                        </td>
                        <td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-info"
									    data-toggle="tooltip" data-placement="bottom" title="Desbloquear Usuario" onclick="consultaGrado(<?php echo $detusuarios['id']; ?>)">
									    <i class="fas fa-unlock" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
                        </td>
                        <td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-outline-secondary"
									    data-toggle="tooltip" data-placement="bottom" title="Bloquear Usuario" onclick="">
									    <i class="fas fa-user-slash" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
						</td>
                        <td>
                            <div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-danger"
									    data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="">
									    <i class="fas fa-user-minus" style="width: 17px; height:17px;"></i>
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
	<div class="modal fade" id="catalogoRoles" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>Cat&aacute;logo de Roles</h2>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body scroll-modal-body">
					<div class="container">
						<div class="row pt-3">
							<div class="col-md-12">
								<table id="tableRoles" class="table table-striped table-hover table-bordered">
									<thead class="thead-dark">
										<th>Id</th>
										<th>Rol de Accso</th>
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


	<div class="modal fade" id="operaciones" tabindex="-1" role="dialog">
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
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="">
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
    
    pie();
    
?>

<!-- Validaci�n de contacto -->
	
<!-- Librerias JS -->
	<?php 
	   libreriasJS();
	?>
	<script type="text/javascript">
		window.onload = function(){
				new JsDatePick({
					useMode:2,
					target:"usrfecha",
					dateFormat:"%d de %M del %Y"
					});
			};

		$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			  //$('[data-toggle="tooltip"]').html("<div style='background-color: red;'></div>");
		});
		
		$(document).ready(function(){
			$('#tableUsuarios').dataTable({
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