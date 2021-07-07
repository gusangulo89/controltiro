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
	$list_responsable = new Consultainfo();
	$responsable = $list_responsable->get_informacion("select responsable.idcatrespongrupo,sector.sectornombre as sector, responsable.noempleado, grados.nombre as grado, 
    elemento.nombre, responsable.observaciones
    from catrespongrupo as responsable
    inner join personal as elemento on responsable.noempleado = elemento.noempleado
    left join catniveles as grados on elemento.idcatgrados = grados.idcatgrados
    left join catsector as sector on elemento.idcatsector = sector.idcatsector");
?>
<div class="container p-4 ">
	<div class="row p-1">
		<div class="col-md-12">
			<h2 class="text-center">CAT&Aacute;LOGO DE RESPONSABLES DE GRUPO</h2>	
		</div>
	</div>
	<button id="nuevo" class="btn btn-success" onclick="agregaResponsable()" data-toggle="tooltip" data-placement="bottom" title="Agregar">
		<i class="fas fa-edit"></i> &nbsp; Ingresar Responsable.
	</button>
	<div class="row pt-3 containergus">
		<div class="col-md-12">
			<table id="tableResponsables" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Id</th>
					<th>Sector</th>
					<th># Empleado</th>
                    <th>Grado</th>
                    <th>Nombre</th>
                    <th>Observaciones</th>
					<th></th>
				</thead>
				<tbody>
				<?php
					foreach($responsable as $detresponsable):
				?>
					<tr>
						<td><?php echo $detresponsable["idcatrespongrupo"]; ?></td>
						<td><?php echo $detresponsable["sector"]; ?></td>
						<td><?php echo $detresponsable["noempleado"]; ?></td>
                        <td><?php echo $detresponsable["grado"]; ?></td>
                        <td><?php echo $detresponsable["nombre"]; ?></td>
                        <td><?php echo $detresponsable["observaciones"]; ?></td>
						<td>
							<div class="text-center">
								<div class="form-group">
									<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" 
										title="Eliminar" onclick="eliminarResponsable(<?php echo $detresponsable['noempleado']; ?>)">
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
	<div class="modal fade" id="modalNuevoResponsable" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;B&uacute;squeda de elemento.</h2>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								<label for="numeroempleado" class="control-label"><strong>N&uacute;mero de Empleado:</strong></label>
									<input type="text" class="form-control text-center" id="respnumempleado" name="respnumempleado">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group text-center">
									<button type="button" class="btn btn-info"
										data-toggle="tooltip" data-placement="bottom" title="Buscar elemento" onclick="buscaElemento()">
										<i class="fas fa-search" style="width: 17px; height:17px;"></i> Buscar Elemento.
									</button>
								</div>
							</div>
						</div>
						<div class="row">

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

	<div class="modal fade" id="modal-elemento-encontrado" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content insertar-row-crud">
            	<div class="modal-header">
            		<h3 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;Asignaci&oacute;n de nuevo responsable.</h3>
                	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true">
							<i class="far fa-times-circle"></i>
						</button>
            	</div>
            	<div class="modal-body">
					<div id="contenido-datos">

					</div>
				</div>
				<div class="modal-footer">
					   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" onclick="regBusResponsable()">
							<i class="fas fa-times"></i>
							Regresar a b&uacute;squeda.
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
			$('#tableResponsables').dataTable({
				"destroy":true,
            	"language": {
                	"url": "json/spanish.json"
            	}
			});
		});
	</script>
  </body>
</html>