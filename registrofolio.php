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
    <div class="row justify-content-center pt-3">
		<div class="col-md-12">
			<div class="form-group text-center">
				<h2 class="display-5">CAPTURE LOS DATOS SOLICITADOS.</h2>
            </div>
		</div>
    </div>
	<div class="row justify-content-center pt-2">
		<div class="col-md-3">
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label"><strong>No. de Empleado del Responsable de Grupo:</strong></label>
				<input type="text" class="form-control" id="claverespongrupo" name="claverespongrupo" value=""  data-placement="bottom" title="Capture el n&uacute;mero de empleado del Responsable de Grupo, en caso de no encontrarse, debe registrarlo en el Cat&aacute;logo de Respoonsables de Grupo.">
			</div>
        </div>
		<div class="col-md-3">
			<div class="form-group pt-4">
			   	<button type="button" class="btn btn-primary" name="guardar" id="guardar" onclick="busca_responsable()">	
				   <i class="fas fa-binoculars"></i>
				  		Buscar Responsable.
			   	</button>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="text" class="form-control" id="idrespongrupo" name="idrespongrupo" hidden= "true">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="text" class="form-control" id="gradorespongrupo" name="gradorespongrupo" hidden= "true">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="text" class="form-control" id="nombrerespongrupo" name="nombrerespongrupo" hidden= "true">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<input type="text" class="form-control" id="placarespongrupo" name="placarespongrupo" hidden= "true">
			</div>
		</div>
		<div class="col-md-2">
		<div class="form-group">
				<input type="text" class="form-control" id="sectorrespongrupo" name="sectorrespongrupo" hidden= "true">
			</div>
		</div>
		<div class="col-md-1">
		</div>
	</div>
    <div class="row pt-3">
		<div class="col-md-2">
			<div class="form-check"  data-placement="bottom" title="Al seleccionar el n&uacute;mero de asistentes se actualiza autom&aacute;ticamente el campo 'Cartuchos Consumidos'.">
                 <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="director">
                        <label class="custom-control-label" for="director"><strong>Director</strong></label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="subdirector">
                    <label class="custom-control-label" for="subdirector"><strong>Subdirector</strong></label>
                </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="asistentes" class="control-label"><strong>Asistentes:</strong></label>
					<select class="form-control" name="asistentes" id="asistentes" onChange="operacion(), extraviados()"  data-placement="bottom" title="Al seleccionar el n&uacute;mero de asistentes se actualiza autom&aacute;ticamente el campo 'Cartuchos Consumidos'.">
						<option value="0">SELECCIONE</option>
						<option value=1>1</option>
						<option value=2>2</option>
						<option value=3>3</option>
						<option value=4>4</option>
						<option value=5>5</option>
						<option value=6>6</option>
						<option value=7>7</option>
						<option value=8>8</option>
						<option value=9>9</option>
						<option value=10>10</option>
						<option value=11>11</option>
						<option value=12>12</option>
						<option value=13>13</option>
						<option value=14>14</option>
						<option value=15>15</option>
						<option value=16>16</option>
						<option value=17>17</option>
						<option value=18>18</option>
						<option value=19>19</option>
						<option value=20>20</option>
						<option value=21>21</option>
						<option value=22>22</option>
						<option value=23>23</option>
						<option value=24>24</option>
						<option value=25>25</option>
						<option value=26>26</option>
						<option value=27>27</option>
						<option value=28>28</option>
						<option value=29>29</option>
						<option value=30>30</option>
        			</select>
        				
        		</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label"><strong>Cartuchos Consumidos:</strong></label>
						<input type="text" class="form-control" id="consumido" name="consumido" value=""  data-placement="bottom" title="Este campo no es editable." disabled>
				</div>
            </div>
            <div class="col-md-3">
				<div class="form-group">
					<label class="control-label"><strong>Casquillos Extraviados:</strong></label>
						<input type="text" class="form-control" id="casextraviados" name="casextraviados" onblur="extraviados()" value=""  data-placement="bottom" title="Capture en este campo la cantidad de casquillos extraviados.">
				</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
				    <label class="control-label"><strong>Casquillos Entregados:</strong></label>
					    <input type="text" class="form-control" id="casentregados" name="casentregados" value=""  data-placement="bottom" title="¡Este campo no es editable!. Se actualiza al terminar de capturar el dato del campo 'Casquillos Extraviados'." disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"><strong>N&uacute;mero de Siluetas:</strong></label>
						<select class="form-control" name="siluetas" id="siluetas"  data-placement="bottom" title="Podr&aacute; seleccionar el n&uacute;mero de siluetas ocupadas en la pr&aacute;ctica, cuando el n&uacute;mero de asistentes sea mayor a 20." disabled>
                        <option value=0>SELECCIONE</option>
							<option value=1>1</option>
							<option value=2>2</option>
							<option value=3>3</option>
							<option value=4>4</option>
							<option value=5>5</option>
							<option value=6>6</option>
							<option value=7>7</option>
							<option value=8>8</option>
							<option value=9>9</option>
							<option value=10>10</option>
							<option value=11>11</option>
							<option value=12>12</option>
							<option value=13>13</option>
							<option value=14>14</option>
							<option value=15>15</option>
							<option value=16>16</option>
							<option value=17>17</option>
							<option value=18>18</option>
							<option value=19>19</option>
							<option value=20>20</option>
        			</select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tpractica" class="control-label"><strong>Tipo de Pr&aacute;ctica:</strong></label>
						<select name="tpractica" id="tpractica" class="form-control"  data-placement="bottom" title="Seleccione el tipo de pr&aacute;tica efectuada. La pr&aacute;ctica por default es PROGRAMA ANUAL">
                        	<option value=1>PROGRAMA ANUAL</option>
							<option value=2>EXTRAORDINARIA</option>
						</select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="arma" class="control-label"><strong>Tipo de Armamento:</strong></label>
                    <select id="arma" name="arma" class="form-control"  data-placement="bottom" title="Seleccione el tipo de armamento utilizado para la pr&aacute;ctica de tiro.">
						<option value=0>SELECCIONE</option>
						<?php
						$get_arma = new Consultainfo();
						$arma  = $get_arma->get_informacion("select * from catarmas");
							foreach($arma as $detarma){ ?>
						<option value="<?php echo $detarma['idcatarmas']?>">
								<?php echo $detarma['tipoarma']." --- ".$detarma['calibre']; ?></option>
								<?php }?>
									
					</select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="revisor" class="control-label"><strong>Jefe de Campo:</strong></label>
                        <select id="revisor" name="revisor" class="form-control"  data-placement="bottom" title="Seleccione el encargado de campo.">
                            <option value=0>SELECCIONE</option>
						    <?php
						    $get_revisor = new Consultainfo();
						    $revisor  = $get_revisor->get_informacion("select revisores.idcatrevisores,revisores.noempleado, grados.nombre as grado, elemento.nombre 
                            from catrevisores as revisores
                            inner join personal as elemento on revisores.noempleado = elemento.noempleado
                            inner join catniveles as grados on elemento.idcatgrados = grados.idcatgrados");
							    foreach($revisor as $detrevisor){ ?>
						    <option value="<?php echo $detrevisor['idcatrevisores']?>">
								<?php echo $detrevisor['noempleado']."--".$detrevisor['grado']."--".$detrevisor['nombre']; ?></option>
								<?php }?>					
			    	    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="instructor" class="control-label"><strong>Instructor de Tiro:</strong></label>
                        <select id="instructor" name="instructor" class="form-control"  data-placement="bottom" title="Seleccione el instructor, que imparti&oacute; la pr&aacute;ctica de tiro.">
                            <option value=0>SELECCIONE</option>
						    <?php
						    $get_instructor = new Consultainfo();
						    $instructor  = $get_instructor->get_informacion("select instructor.idcatinstructores, instructor.noempleado, grados.nombre as grado, elemento.nombre 
                            from catinstructores as instructor
                            inner join personal as elemento on instructor.noempleado = elemento.noempleado
                            inner join catniveles as grados on elemento.idcatgrados = grados.idcatgrados
                            order by elemento.nombre asc");
							    foreach($instructor as $detinstructor){ ?>
						    <option value="<?php echo $detinstructor['idcatinstructores']?>">
								<?php echo $detinstructor['noempleado']."--".$detinstructor['grado']."--".$detinstructor['nombre']; ?></option>
								<?php }?>					
			    	    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
				<div class="form-group">
					<label class="control-label"><strong>Observaciones:</strong></label>
							<input type="text" class="form-control" id="observaciones" name="observaciones" value=""  data-placement="bottom" title="Capture en este campo las observaciones generadas en la pr&aacute;ctica, como la cantidad de cartuchos suministrados al director o subdirector.">
				</div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="row content-center">
			<div class="col-md-12">
				<div class="form-group">
			    	<button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="generarfolio()">	
						<i class="fas fa-file-pdf"></i>
							&nbsp;Generar Folio.
				   	</button>
				   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" onclick="backConsultaFolio()">
						<i class="fas fa-times"></i>
							Regresar a Consulta de Folios.
				   	</button>
				</div>
			</div>
		</div>
    </div>
    
	<script type="text/javascript">
	var director = document.querySelector("#director");
	director.addEventListener("change",function ( ){
		if(this.checked){
			var consumoActual = $("#consumido").val();
			var consumoFinal = parseInt(consumoActual) + 32;
			$("#consumido").val(consumoFinal);
		}else{
			var consumoActual = $("#consumido").val();
			var consumoFinal = parseInt(consumoActual) - 32;
			$("#consumido").val(consumoFinal);
		}
	});

	var subdirector = document.querySelector("#subdirector");
	subdirector.addEventListener("change", function (){
		if(this.checked){
			var consumoActual = $("#consumido").val();
			var consumoFinal = parseInt(consumoActual) + 7;
			$("#consumido").val(consumoFinal);
		}else{
			var consumoActual = $("#consumido").val();
			var consumoFinal = parseInt(consumoActual) - 7;
			$("#consumido").val(consumoFinal);
		}
	});
		function operacion(){
            var lista = document.getElementById('asistentes');
			var indiceSeleccionado = lista.selectedIndex;
			var opcionSeleccionada = lista.options[indiceSeleccionado];
			var texto = opcionSeleccionada.text;
            var numasistentes = opcionSeleccionada.value;
            document.getElementById("siluetas").value = numasistentes;
			var valordirector = document.getElementById('director').checked;
			var valorsubdirector = document.getElementById('subdirector').checked;
				if(valordirector == true && valorsubdirector == false){
					var a = numasistentes - 1;
					var c = a * 18;
					var cartuchos = c + 50;
					document.getElementById('consumido').value = cartuchos;
					}
					else
					{
						if(valordirector == false && valorsubdirector == true){
						var a = numasistentes - 1;
						var c = a * 18;
						var cartuchos = c + 25;
						document.getElementById('consumido').value = cartuchos;
						}
						else
						{
							if(valordirector == true && valorsubdirector == true){
							var a = numasistentes - 2;
							var c = a * 18;
							var cartuchos = c + 75;
							document.getElementById('consumido').value = cartuchos;
							}
							else
							{
								if(valordirector == false && valorsubdirector == false){
								var cartuchos = numasistentes * 18;
								document.getElementById('consumido').value = cartuchos;
								}
							}
						}
					}
					
			}
			
			function extraviados(){
				var consumido = document.getElementById('consumido').value;
				var extraviado   = document.getElementById('casextraviados').value;
				var real = consumido - extraviado;
				document.getElementById('casentregados').value = real;
			}
					
	</script>
    
	
	<br>
<!-- Mensajes modales-->
	<div class="modal fade" id="modal-folio-exitoso" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-xl">
            <div class="modal-content contacto-gracias">
            	<div class="modal-header">
            		<h2 class="modal-title" id="myModalLabel"><i class="fas fa-check"></i>&nbsp;&nbsp;&nbsp;REGISTRO DE FOLIO EXITOSO.</h2>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
            	</div>
            	<div class="modal-body">
					<div id="txt-success-folio"> </div>
            	</div>
        	</div>
		</div>
	</div>
	<div class="modal fade" id="modal-folio-error" tabindex="-1" role="dialog">
    	<div class="modal-dialog">
            <div class="modal-content folio-no-existe">
            	<div class="modal-header">
            		<h3 class="modal-title-txt" id="myModalLabel"><i class="fas fa-user-slash"></i>&nbsp;&nbsp;&nbsp;ERROR EN LA GENERACIÓN DEL FOLIO&nbsp;&nbsp;&nbsp;<i class="fas fa-user-slash"></i></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
            	</div>
            	<div class="modal-body">
					<div id="textoerror-folio"> </div>
            	</div>
        	</div>
		</div>
	</div>
	<div class="modal fade" id="modal-resonsable" tabindex="-1" role="dialog">
    	    <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content consulta-responsable">
            		<div class="modal-header">
            		  <h3 class="modal-title" id="myModalLabel">Datos Generales del Responsable de Grupo</h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
					</div> 
            	   	<div class="modal-body-responsable">
                		<div class="row">
							<div id="muestraResponsable">

							</div>
						</div>                   
            	    </div>
				    <div class="modal-footer">
					   	<button type="button" class="btn btn-success" name="aceptar" id="aceptar" data-dismiss="modal">
						   <i class="fas fa-check-square"></i>
							Aceptar
					   	</button>                    
            	    </div>
        	   </div>
		    </div>
	   	</div>
	<div class="modal fade" id="modal-reponsable-error" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content folio-no-existe">
            	<div class="modal-header">
            		<h3 class="modal-title-txt" id="myModalLabel"><i class="fas fa-user-slash"></i>&nbsp;&nbsp;&nbsp;ERROR EL RESPONSABLE INGRESADO NO EXISTE&nbsp;&nbsp;&nbsp;<i class="fas fa-user-slash"></i></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
            	</div>
            	<div class="modal-body">
					<div id="textoerror"> </div>
            	</div>
        	</div>
		</div>
	</div>
<?php 
    mensajesmodales();
?>
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