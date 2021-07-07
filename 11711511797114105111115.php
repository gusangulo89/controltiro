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
	            <button id="nuevousr" class="btn btn-success" onclick="newUser()" data-toggle="tooltip" data-placement="bottom" title="Agregar">
		            <i class="fas fa-user-plus"></i> &nbsp; Nuevo Usuario
                </button>
            </div>
        </div>
        <div class="col-md-3">
		
        </div>
        <div class="col-md-6">
			
        </div>
    </div>
	<div class="row pt-3">
		<div class="col-md-12">
			<table id="tableUsuarios" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Consecutivo</th>
					<th>Nombre de Usuario</th>
                    <th>Vencimiento</th>
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
                        <td><strong><?php echo $detusuarios["username"]; ?></strong></td>
                        <td><?php echo $detusuarios["dfechavencimiento"]; ?></td>
						<td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-success" id="consultaUsuario"
									    data-toggle="tooltip" data-placement="bottom" title="Actualizar" onclick="consultaUsuario(<?php echo $detusuarios['id'];?> )">
									    <i class="fas fa-user-edit" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
						</td>
                        <td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-outline-warning"
									    data-toggle="tooltip" data-placement="bottom" title="Reestablecer Password" onclick="reestablecePass(<?php echo $detusuarios['id'];?>)">
									    <i class="fas fa-user-lock" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
                        </td>
                        <td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-info"
									    data-toggle="tooltip" data-placement="bottom" title="Desbloquear Usuario" onclick="desbloqueo(<?php echo $detusuarios['id'];?>)">
									    <i class="fas fa-unlock" style="width: 17px; height:17px;"></i>
								    </button>
                                </div>
							</div>
                        </td>
                        <td>
							<div class="text-center">
                                <div class="form-group">
								    <button type="button" class="btn btn-outline-secondary"
									    data-toggle="tooltip" data-placement="bottom" title="Bloquear Usuario" onclick="bloquearUSR(<?php echo $detusuarios['id']; ?>)">
									    <i class="fas fa-user-slash" style="width: 17px; height:17px;"></i>
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
	<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content nuevo-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-user-plus"></i>&nbsp;Nuevo usuario de Sistema.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color: white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="username" class="control-label"><strong>Nombre de Usuario:</strong></label>
									<input type="text" class="form-control" id="username" name="username" value="" placeholder="Alias o apodo">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label for="usrpassword1" class="control-label"><strong>Contrase&ntilde;a de Acceso:</strong></label>
									<input type="password" class="form-control" id="usrpassword1" name="usrpassword1" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label for="usrpassword2" class="control-label"><strong>Confirma Contrase&ntilde;a de Acceso:</strong></label>
									<input type="password" class="form-control" id="usrpassword2" name="usrpassword2" value="" onblur="comparaPass()">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="usrrol" class="control-label"><strong>Perfil de Acceso al Sistema:</strong></label>
									<select id="usrrol" name="usrrol" class="form-control">
										<option value="0">SELECCIONE</option>
										<?php
										$get_roles = new Consultainfo();
										$roles  = $get_roles->get_informacion("select * from catroles");
											foreach($roles as $detroles){ ?>
										<option value="<?php echo $detroles['idcatrol']?>">
										<?php echo $detroles['rolnombre']; ?></option>
										<?php }?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="guardarUsuario()">
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

	<div class="modal fade" id="modal-udp-usuario" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content act-datos-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-user-edit"></i>&nbsp;Actualizaci&oacute;n datos del Usuario.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color:white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="udp-username" class="control-label"><strong>Username:</strong></label>
									<input type="text" class="form-control" id="udp-userid" name="udp-userid" value="" hidden>
									<input type="text" class="form-control" id="udp-username" name="udp-username" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="udp-usrrol" class="control-label"><strong>Perfil de Acceso al Sistema:</strong></label>
									<select id="udp-usrrol" name="udp-usrrol" class="form-control">
										<option value="0"><div id="nomrol"></div></option>
										<?php
										$get_roles = new Consultainfo();
										$roles  = $get_roles->get_informacion("select * from catroles");
											foreach($roles as $detroles){ ?>
										<option value="<?php echo $detroles['idcatrol']?>">
										<?php echo $detroles['rolnombre']; ?></option>
										<?php }?>
									</select>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="actUsuario()">
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

	<div class="modal fade" id="modal-reestablecer-pass" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content act-datos-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-user-lock"></i>&nbsp;Reestablecimiento de Contrase&ntilde;a.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color:white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body scroll-modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="reset-username" class="control-label"><strong>Nombre de Usuario:</strong></label>
									<input type="text" class="form-control" id="reset-userid" name="udp-userid" value="" hidden>
									<input type="text" class="form-control" id="reset-username" name="reset-username" value="" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="reset-password1" class="control-label"><strong>Nueva Contrase&ntilde;a de Acceso:</strong></label>
									<input type="password" class="form-control" id="reset-password1" name="reset-password1">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="reset-password2" class="control-label"><strong>Confirma Contrase&ntilde;a de Acceso:</strong></label>
									<input type="password" class="form-control" id="reset-password2" name="reset-password2" value="" onblur="verifPassUdp()">
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					<div id="botonesResetPass">
					    
					</div>
				</div>
        	</div>
		</div>
	</div>

	<div class="modal fade" id="modal-desbloquear-usuario" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content act-datos-usuario">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-user-edit"></i>&nbsp;Desbloquear Usuario.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" style="color:white;" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="udp-username" class="control-label"><strong>Username:</strong></label>
									<input type="text" class="form-control" id="udp-userid" name="udp-userid" value="" hidden>
									<input type="text" class="form-control" id="udp-username" name="udp-username" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								
								
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					    <button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="actUsuario()">
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