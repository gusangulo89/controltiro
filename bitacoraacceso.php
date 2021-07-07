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
	$list_bitacceso = new Consultainfo();
	$bitacceso = $list_bitacceso->get_informacion("select * from bitacceso");
?>
<div class="container p-4">
	<div class="row p-1">
		<div class="col-md-12">
			<h2 class="text-center">BIT&Aacute;CORA DE ACCESOS DE USUARIOS</h2>	
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-12">
			<table id="tableBitacora" class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<th>Consecutivo</th>
					<th>Usuario</th>
					<th>Fecha.</th>
					<th>Hora</th>
                    <th>Operaci&oacute;n</th>
                    <th>Instrucci&oacute;n</th>
				</thead>
				<tbody>
				<?php
					foreach($bitacceso as $detbitacceso):
				?>
					<tr>
						<td><?php echo $detbitacceso["idacceso"]; ?></td>
						<td><?php echo $detbitacceso["username"]; ?></td>
						<td><?php echo $detbitacceso["fechahora"]; ?></td>
                        <td><?php echo $detbitacceso["hora"]; ?></td>
                        <td><?php echo $detbitacceso["bitoperacion"]; ?></td>
                        <td><?php echo $detbitacceso["bitinstruccion"]; ?></td>
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
			$('#tableBitacora').dataTable({
				"destroy":true,
            	"language": {
                	"url": "json/spanish.json"
            	}
			});
		});
	</script>
  </body>
</html>