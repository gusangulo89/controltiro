<?php
//librerias necesarias de php
	include ("menu.php");
	include ("heather-and-footer.php");
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

	<div class="container pt-3">
		<div class="row justify-content-center">
			<div class="col-md-12">
					<div class="form-group text-center">
						<h2 class="display-5">CAPTURA Y B&Uacute;SQUEDA DE </h2>
						<h2 class="display-5">ELEMENTOS DE LA SSC CDMX </h2>
					</div>
			</div>
		</div>
		<div class="row pt-3">
		
			<div class="col-md-2">

				<form action="" name="buscar">
					<div class="form-group">
						<label for="grado" class="control-label"><strong>Nivel:</strong></label>
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
						<label for="arma" class="control-label"><strong>Tipo Arma:</strong></label>
					</div>
					<div class="form-group">
						<label for="situacion" class="control-label pt-1"><strong>Situaci&oacute;n:</strong></label>
					</div>
					<div class="form-group">
						<label for="observaciones" class="control-label pt-2"><strong>Observaciones:</strong></label>
					</div>
					<div class="form-group">
						<label for="foto" class="control-label"><strong>Comprobante de Consumo de Cartuchos:</strong></label>
					</div>
				
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<select id="grado" name="grado" class="form-control">
						<option value="0">SELECCIONE</option>
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
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Elemento...">
				</div>
				<div class="form-group col-xs-3">
					<input type="text" class="form-control" id="noempleado2" name="noempleado2" placeholder="N&uacute;mero de Placa" onblur="existeelemento()">
				</div>
				<div class="form-group">
					<select id="sector" name="sector" class="form-control">
						<option value="0">SELECCIONE</option>
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
					<select id="arma" name="arma" class="form-control">
						<option value="0">SELECCIONE</option>
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
					<select id="situacion" name="situacion" class="form-control">
						<option value="0">SELECCIONE</option>
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
					<input type="text" class="form-control" id="observaciones" name="observacioness" placeholder="Capture las observaciones...">
				</div>
				<div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<span class="input-group-text">Cargar: </span>
  					</div>
  					<div class="custom-file">
    					<input type="file" class="custom-file-input" id="foto" name="foto" onchange="subirFoto()" lang="es">
    				<label class="custom-file-label" for="foto">Adjuntar recibo...</label>
  					</div>
				</div>			
				<!--
				<div class="form-group">
					<input type="file" class="custom-file-input" id="foto" name="foto">
				</div>
				-->
				<div class="form-group">
					<div class="formulario" id="vistaprevia">
						<div id="descripcionvistaprevia">
						<h4> <strong> VISTA PREVIA (digital). </strong></h4>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="form-group">
						<button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="guardaelemento()">	
							<i class="fas fa-save"></i>
						  		Guardar
					   	</button>
					   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" onclick="cancelarPantallaPrincipal()">
							<i class="fas fa-times"></i>
								Cancelar
					   	</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
					<div class="form-group formulario">
						<div class="row justify-content-center">
							<label class="control-label text-dark"><strong>ESTAD&Iacute;STICO</strong></label>
						</div>
						<div class="row justify-content-center">
							<label class="control-label text-dark"><strong>ASISTENTES CAMPO DE TIRO</strong></label>
						</div>
						<div class="row justify-content-center">
							<div class="col-md-5">
								<label class="control-label text-dark">FECHA:</label>
							</div>
							<div class="col-md-7">
								<label class="control-label text-dark">
									<?php
					                       $arrayMeses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio',
						                                             'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
					                       $arrayDias = array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
					                       $fecha = $arrayDias[date('w')]." ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
					                           echo $fecha;
					                        //Armo la cadena de la fecha para realizar el Query
					                       $fechaActual = date('d')." ".$arrayMeses[date('m')-1]." ".date('Y');
					                       $fecha2 = date('Y')."-".date('m')."-".date('d');
				                    ?>
				                </label>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-md-6">
								<label class="control-label text-dark">TOTAL DE ASISTENTES:</label>
							</div>
							<div class="col-md-6">
								<label class="control-label text-dark">
									<!-- Aqui va la cantidad de elementos -->
									<?php
									try{ 
										$fecha = Date("Y-m-d");
										$row = new Consultainfo();
										$rows = $row->duplicados_registros("select * from polasistencia where dfecha = '$fecha'");
										if ($rows == 0){
											echo "0";
										}else{
											$rows = $row->get_informacion("select * from polasistencia where dfecha = '$fecha'");
											foreach($rows as $detrows);
											echo $detrows["icantasistentes"];
										}
										
									}catch (Exception $e){
										echo "No se puede ejecutar la operación";
									}
									?>
				                </label>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-md-6">
								<label class="control-label text-dark">TOTAL DE CARTUCHOS CONSUMIDOS:</label>
							</div>
							<div class="col-md-6">
								<label class="control-label text-dark">
									<!-- Aqui va la cantidad de elementos -->
									
									<?php
									try{ 
										$fecha = Date("Y-m-d");
										$row = new Consultainfo();
										$rows = $row->duplicados_registros("select * from polasistencia where dfecha = '$fecha'");
										if ($rows == 0){
											echo "0";
										}else{
											$rows = $row->get_informacion("select * from polasistencia where dfecha = '$fecha'");
											foreach($rows as $detrows);
											echo $detrows["icantcartuchos"];
										}
										
									}catch (Exception $e){
										echo "No se puede ejecutar la operación";
									}
									?>
				                </label>
							</div>
						</div>
					</div>
					<!-- BUsqueda de Elemento -->
					<div class="form-group formulario">
						<div class="row justify-content-center">
							<label class="control-label text-dark"><strong>B&Uacute;SQUEDA DE ELEMENTO</strong></label>
						</div>
						<div class="row justify-content-center">
							<div class="form-group mx-sm-4">
								<input type="text" class="form-control"	placeholder="N&uacute;mero de Placa" id="bus-noempleado">
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="form-group mx-sm-4">
								<button type="button" class="btn btn-primary" id="btn-noempleado" name="btn-noempleado" onclick="consultaPersonal()">
									<i class="fas fa-search"></i>
						  			Buscar Elemento.
								</button>
							</div>
						</div>
					</div>
					<!-- BUsqueda de Elemento -->
					<div class="form-group formulario">
						<div class="row justify-content-center">
							<label class="control-label text-dark"><strong>GENERAR REINICIO</strong></label>
						</div>
						<div class="row justify-content-center">
							<div class="form-group mx-sm-4">
								<button type="button" class="btn btn-warning" id="resetear" name="resetear" onclick="reiniciarElementos()">
									<i class="fas fa-cloud-showers-heavy"></i>
						  			&nbsp;Reiniciar
								</button>
							</div>
						</div>
					</div>
				
			</div>
		</div>
	</div>
		
	<br>
<!-- Mensajes modales-->
	<div class="modal fade" id="modal-elemento-existe" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content existe-elemento">
          		<div class="modal-header">
            		  <h3 class="modal-title" id="alerta-elemento-existe"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;<strong>AVISO ELEMENTO YA EXISTE EN BASE DE DATOS</strong></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
           	   	<div class="modal-body">
					<div id="datoselemento">
						
					</div>
           	    </div>
				<div class="modal-footer">
			   		<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" data-dismiss="modal">
						<i class="fas fa-times"></i>
						Aceptar
				   	</button>                    
           	    </div>
       	   </div>
	    </div>
	</div>


	<div class="modal fade" id="modal-consulta-elemento" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content consulta-personal">
          		<div class="modal-header">
					  <h3 class="modal-title" id="cabecero-consulta"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;&nbsp;<strong>CONSULTA DATOS ELEMENTO.</strong></h3>
					  &nbsp;&nbsp;&nbsp;&nbsp;<div class="text-center" id="img-jefe"></div>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
				<div class="modal-body">
					<input class="form-control" type="text" id="udp-noempleado">
           	    </div>
           	   	<div class="modal-body scroll-modal-body">
					<div id="datos-consulta-elemento">
						
					</div>
           	    </div>
				<div class="modal-footer">
			   		<button type="button" class="btn btn-primary" name="cancelar" id="cancelar" onclick="modificaElemento()">
					   <i class="fas fa-pencil-alt"></i>
						Modificar
					</button>
					<button type="button" class="btn btn-success" name="cancelar" id="cancelar" data-dismiss="modal">
						<i class="fas fa-check"></i>
						Aceptar
				   	</button>
					                       
           	    </div>
       	   </div>
	    </div>
	</div>
	
	
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

	<div class="modal fade" id="modal-foto-grande" tabindex="-1" role="dialog">
    	<div id="tamagnoModal" class="modal-dialog modal-dialog-centered modal-xl">
            <div id="contenidoModal" class="modal-content">
           		<div class="modal-header">
           		  		<h3 class="modal-title" id="error-modal"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;RECIBO&nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i></h3>
               	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
           	   	<div class="modal-body">
				   <div id="txtFoto"> </div>
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