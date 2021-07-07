<?php
//librerias necesarias de php
	include ("menu.php");
	include ("heather-and-footer.php");
	include ("sqlmetodos.php");
	session_start();

	if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
		echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
		header("location:index?nologin=false");
	  }
//Recupero valores

	$noempleado = $_GET["placa"];
	
	//OBTENGO TODOS LOS VALORES DE ESTE ELEMENTO
	$persona = new Consultainfo();
        $elemento = $persona->get_informacion("SELECT * FROM personal where noempleado = '$noempleado'");
			foreach($elemento as $detelemento);
?>

<!DOCTYPE html>
<html lang="es">
    <!-- Etiqueta head -->
  	<?php 
        cabeceroPrincipal();
  	?>
  	<!-- Hace foco en especifico en el campo de b�squeda de elemento -->
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

	<div class="container pt-3">
		<div class="row justify-content-center">
			<div class="col-md-12">
					<div class="form-group text-center">
						<h2 class="display-5">ACTUALIZACI&Oacute;N DE DATOS</h2>
						<h2 class="display-5">PERSONALES DE LA SSC CDMX </h2>
					</div>
			</div>
        </div>
    
        <div class="row pt-3">
            <div class="col-md-2">
                <div class="form-group">
					<label for="grado" class="control-label"><strong>Grado:</strong></label>
			    </div>	
				<div class="form-group">
					<label for="nombre" class="control-label"><strong>Nombre:</strong></label>
				</div>
				<div class="form-group">
					<label for="noempleado2" class="control-label"><strong>N&uacute;mero de Empleado:</strong></label>
				</div>
				<div class="form-group">
					<label for="sector" class="control-label"><strong>Sector:</strong></label>
				</div>
				<div class="form-group">
					<label for="arma" class="control-label"><strong>Armamento:</strong></label>
				</div>
				<div class="form-group">
					<label for="situacion" class="control-label pt-1"><strong>Situaci&oacute;n:</strong></label>
				</div>
				<div class="form-group">
					<label for="observaciones" class="control-label pt-2"><strong>Observaciones:</strong></label>
				</div>
            </div>
			<div class="col-md-5">
				<div class="form-group">
					<select id="grado" name="grado" class="form-control fondo-campos-actualizar">
						<?php
							 
							$get_gradoAct = new Consultainfo();
							$gradoAct = $get_gradoAct->get_informacion("select * from catniveles where idcatgrados = '$detelemento[idcatgrados]'");
							foreach($gradoAct as $detGradoAct);
						?>
						<option class="fondo-campos-actualizar" value="
					<?php 
						if(!$gradoAct){
							echo 0;
						}else{
							echo $detGradoAct['idcatgrados'];
						}
					?>
						"><?php 
						if(!$gradoAct){
							echo "GRADO NO ASIGNADO";	
						}else{
							echo $detGradoAct['nombre'];
						}
							?></option>
						<?php
						$grados = new Consultainfo();
						$sqlgrado = "select * from catniveles";
						$grado  = $grados->get_informacion($sqlgrado);
							foreach($grado as $detgrado){ ?>
						<option value="<?php echo $detgrado['idcatgrados']?>">
								<?php echo $detgrado['nombre']; ?></option>
								<?php }?>
									
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control fondo-campos-actualizar" id="nombre" name="nombre" placeholder="Nombre del Elemento..." value="<?php echo $detelemento['nombre'];?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control fondo-campos-actualizar" id="noempleado2" name="noempleado2" placeholder="N&uacute;mero de Placa" value="<?php echo $noempleado; ?>">
				</div>
				<div class="form-group">
					<select id="sector" name="sector" class="form-control fondo-campos-actualizar">
						<?php 
							$get_sectorAct = new Consultainfo();
							$sectorAct = $get_sectorAct->get_informacion("select * from catsector where idcatsector = '$detelemento[idcatsector]'");
							foreach($sectorAct as $detSectorAct);
						?>
						<option class="fondo-campos-actualizar" value="
						<?php
							if(!$sectorAct){
								echo 0;
							} else{
								echo $detSectorAct['idcatsector'];
							}
							
						?>
						
						"> 
						<?php 
							if(!$sectorAct){
								echo "SECTOR NO ASIGNADO";
							}else{
								echo $detSectorAct['sectornombre'];
							} 
						?> </option>
						
						<?php
						$get_sector = new Consultainfo();
						//$sqlgrado = "select * from catgrados";
						$sector  = $get_sector->get_informacion("select * from catsector");
							foreach($sector as $detsector){ ?>
						<option value="<?php echo $detsector['idcatsector']?>">
								<?php echo $detsector['sectornombre']; ?></option>
								<?php }?>
									
					</select>
				</div>
				<div class="form-group">
					<select id="arma" name="arma" class="form-control fondo-campos-actualizar">
						<?php 
							$get_armaAct = new Consultainfo();
							$armaAct = $get_armaAct->get_informacion("select * from catarmas where idcatarmas = '$detelemento[idcatarmas]'");
							foreach($armaAct as $detArmaAct);
						?>
						<option class="fondo-campos-actualizar" value="
						<?php
							if(!$armaAct){
								echo 0;
							} else{
								echo $detArmaAct['idcatarmas'];
							}
							
						?>">
						<?php 
						if(!$armaAct){
							echo "NO ASIGNADO";
						}else{
							echo $detArmaAct['tipoarma'];
						}
							?>
						</option>
						<?php
						$get_arma = new Consultainfo();
						$arma  = $get_arma->get_informacion("select * from catarmas");
							foreach($arma as $detarma){ ?>
						<option value="<?php echo $detarma['idcatarmas']?>">
								<?php echo $detarma['tipoarma']; ?></option>
								<?php }?>
									
					</select>
				</div>
				<div class="form-group">
					<select id="situacion" name="situacion" class="form-control fondo-campos-actualizar">
						<?php 
							$get_situacionAct = new Consultainfo();
							$situacionAct = $get_situacionAct->get_informacion("select * from catsituacion where idcatsituacion = '$detelemento[idcatsituacion]'");
							foreach($situacionAct as $detSituacionAct);
						?>
						<option class="fondo-campos-actualizar" value="
						<?php 
						if(!$situacionAct){
							echo 0;
						}else{
							echo $detSituacionAct['idcatsituacion']; 
						}

							
						?>">
						<?php
						if(!$situacionAct){
							echo "NO ASIGNADO";
						} else{
							echo $detSituacionAct['situacion'];
						}
							
						?>
						</option>
						<?php
						$get_situacion = new Consultainfo();
						//$sqlgrado = "select * from catgrados";
						$situacion  = $get_situacion->get_informacion("select * from catsituacion");
							foreach($situacion as $detsituacion){ ?>
						<option value="<?php echo $detsituacion['idcatsituacion']?>">
								<?php echo $detsituacion['situacion']; ?></option>
								<?php }?>
									
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control fondo-campos-actualizar" id="observaciones" name="observacioness" placeholder="Capture las observaciones..." value="<?php echo $detelemento["observaciones"]?>">
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<label for="foto" class="control-label"><strong>Recibo de Cartuchos (Digitalizado):</strong></label>
				</div>
				<div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<span class="input-group-text">Subir</span>
  					</div>
  					<div class="custom-file">
    					<input type="file" class="custom-file-input" id="foto" name="foto" onchange="subirFoto()">
    				<label class="custom-file-label" for="foto">Seleccionar recibo</label>
  					</div>
				</div>
				<div class="form-group">
					<div class="formulario" id="vistaprevia">
						<div id="descripcionvistaprevia">
								<img src="<?php echo $detelemento['recibo'];?>" height="200" width="335">
						</div>
					</div>
				</div>
			</div>
			
        </div>
		<div class="row pt-3">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 justify-content-center">
				<div class="form-group">
					<button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="actualizarelemento()">	
						<i class="fas fa-save"></i>
					  		Actualizar
				   	</button>
				   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" onclick="cancelarRegCaptura()">
						<i class="fas fa-times"></i>
							Cancelar
				   	</button>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
	<!-- modales -->
	<!-- Modal para mensaje de exito -->
	<div class="modal fade" id="modal-guardado-exitoso" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content guardado-exitoso">
          		<div class="modal-header">
            		  <h3 class="modal-title" id="cabecero-modal-exitoso"><i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;&nbsp;<strong>SE GUARD&Oacute; CORRETAMENTE EL REGISTRO</strong></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
           	   	<div class="modal-body">
					<div id="datoselementoexitoso">
						
					</div>
           	    </div>
				<div class="modal-footer">
			   		<button type="button" class="btn btn-primary" name="cancelar" id="cancelar" data-dismiss="modal">
					   <i class="fas fa-calendar-check"></i>
						Aceptar
				   	</button>                    
           	    </div>
       	   </div>
	    </div>
	</div>
	<!-- Modal para mensaje de error -->
	<div class="modal fade" id="modal-error-foto" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content folio-no-existe">
           		<div class="modal-header">
           		  		<h3 class="modal-title" id="error-modal"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;ERROR EN SERVIDOR&nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i></h3>
               	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
           	   	<div class="modal-body">
				   <div id="txtErrorFoto"> </div>
           	    </div>
       	   </div>
	    </div>
	</div>
<!-- Pie de P�gina -->
<?php
    
    pie();
    
?>

<!-- Validaci�n de contacto -->
	
<!-- Librerias JS -->
	<?php 
	   libreriasJS();
	?>
  </body>
</html>