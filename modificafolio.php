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
        menuAdministrador();
    ?>  		
<!-- Cuerpo de la p�gina -->

    <?php
        //$id                 = $_POST["id"];
        $folio              = $_GET["folio"];
        //$campotiro          = $_POST["campotiro"];
        //$fecha              = $_POST["fecha"];
        //$sector             = $_POST["sector"];
        //$arma               = $_POST["arma"];
        //$respongrupo        = $_POST["respongrupo"];
        //$jefecampo          = $_POST["jefecampo"];
        //$instructor         = $_POST["instructor"];
        //$cconsumidos        = $_POST["cconsumidos"];
        //$casentregados      = $_POST["casentregados"];
        //$casextraviados     = $_POST["casextraviados"];
        //$siluetas           = $_POST["siluetas"];
        //$asistentes         = $_POST["asistentes"];
        //$observaciones      = $_POST["observaciones"];

        $get_folio = new Consultainfo();
        $folio = $get_folio->get_informacion("select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.idcatarmas, armas.tipoarma, 
        responsable.idcatrespongrupo, responsable.noempleado as responsable, revisor.idcatrevisores, revisor.noempleado as revisor, 
        instructor.idcatinstructores, instructor.noempleado as instructor, folios.carconsumidos, folios.casentregados, folios.casextraviados, 
        folios.siluetas, folios.asistentes, folios.observaciones, folios.itipopractica
        from catfolios as folios
        left join catsector as sector on folios.idcatsector = sector.idcatsector
        left join catarmas as armas on folios.idcatarmas = armas.idcatarmas
        left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo
        left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores
        left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores
        where folios.folio ='$folio'");
      
        foreach($folio as $detfolio);

        //echo json_encode($detfolio);

    ?>
    <div class="container">
        <div class="row justify-content-center pt-3">
			<div class="col-md-12">
					<div class="form-group text-center">
						<h2 class="display-5">ACTUALIZACI&Oacute;N DE FOLIOS </h2>
                    </div>
                    <div class="form-group text-center">
                        <h2 class="display-5">FOLIO: FT-<?php echo $detfolio["folio"]; ?>
                        <input type="text" class="form-control" id="txtfolio" name="txtfolio" value="<?php echo $detfolio["folio"]; ?>" hidden= "true" disabled> </h2>
                        
					</div>
			</div>
        </div>
        <div class="row pt-3">
			<div class="col-md-2">
				<div class="form-check">
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
						<select class="form-control fondo-campos-actualizar" name="asistentes" id="asistentes" onChange="operacion()" data-toggle="tooltip" data-placement="bottom" title="Al seleccionar el n&uacute;mero de asistentes se actualiza autom&aacute;ticamente el campo 'Cartuchos Consumidos'.">
							<option class="fondo-campos-actualizar" value="<?php echo $detfolio["asistentes"]; ?>"><?php echo $detfolio["asistentes"]; ?></option>
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
							<input type="text" class="form-control" id="consumido" name="consumido" value="<?php echo $detfolio["carconsumidos"]; ?>" data-toggle="tooltip" data-placement="bottom" title="Este campo no es editable." disabled>
				</div>
            </div>
            <div class="col-md-3">
				<div class="form-group">
					<label class="control-label"><strong>Casquillos Extraviados:</strong></label>
							<input type="text" class="form-control fondo-campos-actualizar" id="casextraviados" name="casextraviados" onblur="extraviados()" value="<?php echo $detfolio["casextraviados"]; ?>" data-toggle="tooltip" data-placement="bottom" title="Capture en este campo la cantidad de casquillos extraviados.">
				</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
				    <label class="control-label"><strong>Casquillos Entregados:</strong></label>
					    <input type="text" class="form-control" id="casentregados" name="casentregados" value="<?php echo $detfolio["casentregados"];?>" data-toggle="tooltip" data-placement="bottom" title="¡Este campo no es editable!. Se actualiza al terminar de capturar el dato del campo 'Casquillos Extraviados'." disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label"><strong>N&uacute;mero de Siluetas:</strong></label>
						<select class="form-control" name="siluetas" id="siluetas" data-toggle="tooltip" data-placement="bottom" title="Podr&aacute; seleccionar el n&uacute;mero de siluetas ocupadas en la pr&aacute;ctica, cuando el n&uacute;mero de asistentes sea mayor a 20." disabled>
                        <option class="fondo-campos-actualizar" value="<?php echo $detfolio["siluetas"];?>"><?php echo $detfolio["siluetas"]; ?></option>
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
						<select name="tpractica" id="tpractica" class="form-control fondo-campos-actualizar" data-toggle="tooltip" data-placement="bottom" title="Seleccione el tipo de pr&aacute;tica efectuada. La pr&aacute;ctica por default es PROGRAMA ANUAL">
                        <option class="fondo-campos-actualizar" value="<?php echo $detfolio["itipopractica"]; ?>"><?php 
                        if($detfolio["itipopractica"] == 1){
                            echo "PROGRAMA ANUAL";
                        }else{
                            echo "EXTRAORDINARIA"; 
                        }
                        ?></option>
                            <option value=1>PROGRAMA ANUAL</option>
							<option value=2>EXTRAORDINARIA</option>
						</select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tpractica" class="control-label"><strong>Tipo de Armamento:</strong></label>
                    <select id="arma" name="arma" class="form-control fondo-campos-actualizar" data-toggle="tooltip" data-placement="bottom" title="Seleccione el tipo de armamento utilizado para la pr&aacute;ctica de tiro.">
						<option class="fondo-campos-actualizar" value="<?php echo $detfolio['idcatarmas']; ?>"><?php echo $detfolio['tipoarma']; ?></option>
						<?php
						$get_arma = new Consultainfo();
						$arma  = $get_arma->get_informacion("select * from catarmas");
							foreach($arma as $detarma){ ?>
						<option value="<?php echo $detarma['idcatarmas']?>">
								<?php echo $detarma['tipoarma']; ?></option>
								<?php }?>
									
					</select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="respongrupo" class="control-label"><strong>Responsable de Grupo:</strong></label>
                        <select id="respongrupo" name="respongrupo" class="form-control fondo-campos-actualizar" data-toggle="tooltip" data-placement="bottom" title="El responsable de grupo, es la pesona o elemento que viene al mando.">
                            <option class="fondo-campos-actualizar" value="<?php echo $detfolio["idcatrespongrupo"];?>"><?php 
                                                    $get_responsable = new Consultainfo();
                                                    $responsable  = $get_responsable->get_informacion("select responsable.idcatrespongrupo,sector.sectornombre as sector, responsable.noempleado, grados.nombre as grado, elemento.nombre 
                                                    from catrespongrupo as responsable
                                                    inner join personal as elemento on responsable.noempleado = elemento.noempleado
                                                    inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
                                                    inner join catsector as sector on elemento.idcatsector = sector.idcatsector
                                                    where responsable.idcatrespongrupo = '$detfolio[idcatrespongrupo]'");
                                                        foreach($responsable as $detresponsable); 
                                                    echo $detresponsable['noempleado']."--".$detresponsable['grado']."--".$detresponsable['nombre'];?></option>
						    <?php
						    $get_responsable = new Consultainfo();
						    $responsable  = $get_responsable->get_informacion("select responsable.idcatrespongrupo,sector.sectornombre as sector, responsable.noempleado, grados.nombre as grado, elemento.nombre 
                            from catrespongrupo as responsable
                            inner join personal as elemento on responsable.noempleado = elemento.noempleado
                            inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
                            inner join catsector as sector on elemento.idcatsector = sector.idcatsector order by elemento.nombre asc");
							    foreach($responsable as $detresponsable){ ?>
						    <option value="<?php echo $detresponsable['idcatrespongrupo']?>">
								<?php echo $detresponsable['noempleado']."--".$detresponsable['grado']."--".$detresponsable['nombre']; ?></option>
								<?php }?>					
			    	    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="revisor" class="control-label"><strong>Jefe de Campo:</strong></label>
                        <select id="revisor" name="revisor" class="form-control fondo-campos-actualizar" data-toggle="tooltip" data-placement="bottom" title="Seleccione el encargado de campo.">
                            <option class="fondo-campos-actualizar" value="<?php echo $detfolio["idcatrevisores"];?>">
                                <?php
						            $get_revisor = new Consultainfo();
						            $revisor  = $get_revisor->get_informacion("select revisores.idcatrevisores,revisores.noempleado, grados.nombre as grado, elemento.nombre 
                                        from catrevisores as revisores
                                        inner join personal as elemento on revisores.noempleado = elemento.noempleado
                                        inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
                                        where revisores.idcatrevisores = '$detfolio[idcatrevisores]'");
                                    foreach($revisor as $detrevisor); 
                                    echo $detrevisor['noempleado']."--".$detrevisor['grado']."--".$detrevisor['nombre'];?></option>
						    <?php
						    $get_revisor = new Consultainfo();
						    $revisor  = $get_revisor->get_informacion("select revisores.idcatrevisores,revisores.noempleado, grados.nombre as grado, elemento.nombre 
                            from catrevisores as revisores
                            inner join personal as elemento on revisores.noempleado = elemento.noempleado
                            inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados");
							    foreach($revisor as $detrevisor){ ?>
						    <option value="<?php echo $detrevisor['idcatrevisores']?>">
								<?php echo $detrevisor['noempleado']."--".$detrevisor['grado']."--".$detrevisor['nombre']; ?></option>
								<?php }?>					
			    	    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="instructor" class="control-label"><strong>Instructor de Tiro:</strong></label>
                        <select id="instructor" name="instructor" class="form-control fondo-campos-actualizar" data-toggle="tooltip" data-placement="bottom" title="Seleccione el instructor, que imparti&oacute; la pr&aacute;ctica de tiro.">
                            <option class="fondo-campos-actualizar" value="<?php echo $detfolio["idcatinstructores"];?>">
                            <?php
						        $get_instructor = new Consultainfo();
						        $instructor  = $get_instructor->get_informacion("select instructor.idcatinstructores, instructor.noempleado, grados.nombre as grado, elemento.nombre 
                                    from catinstructores as instructor
                                    inner join personal as elemento on instructor.noempleado = elemento.noempleado
                                    inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
                                    where instructor.idcatinstructores = '$detfolio[idcatinstructores]'");
                                    foreach($instructor as $detinstructor);
                                    echo $detinstructor['noempleado']."--".$detinstructor['grado']."--".$detinstructor['nombre']; 
                                    ?>
                            </option>
						    <?php
						    $get_instructor = new Consultainfo();
						    $instructor  = $get_instructor->get_informacion("select instructor.idcatinstructores, instructor.noempleado, grados.nombre as grado, elemento.nombre 
                            from catinstructores as instructor
                            inner join personal as elemento on instructor.noempleado = elemento.noempleado
                            inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
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
							<input type="text" class="form-control fondo-campos-actualizar" id="observaciones" name="observaciones" value="<?php echo $detfolio["observaciones"]; ?>" data-toggle="tooltip" data-placement="bottom" title="Capture en este campo las observaciones generadas en la pr&aacute;ctica, como la cantidad de cartuchos suministrados al director o subdirector.">
				</div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <div class="row content-center">
			<div class="col-md-12">
				<div class="form-group">
			    	<button type="button" class="btn btn-success" name="guardar" id="guardar" onclick="actualizaFolio()">	
						<i class="fas fa-save"></i>
					  		Actualizar Folio
				   	</button>
				   	<button type="button" class="btn btn-danger" name="cancelar" id="cancelar" onclick="backConsultaFolio()">
						<i class="fas fa-times"></i>
							Regresar a Consulta de Folio
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
<!-- Mensajes y alertas modales -->
    <div class="modal fade" id="modal-folio-actualizado" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content guardado-exitoso">
          		<div class="modal-header">
            		  <h3 class="modal-title" id="cabecero-modalFolio-exitoso"><i class="fas fa-clipboard-check"></i>&nbsp;&nbsp;&nbsp;<strong>SE GUARD&Oacute; CORRETAMENTE EL REGISTRO</strong></h3>
                	   <button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
           	   	<div class="modal-body">
					<div id="datosfolio-UDP-exitoso">
						
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
    
    <div class="modal fade" id="modal-error-folioUDP" tabindex="-1" role="dialog">
    	<div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content folio-no-existe">
           		<div class="modal-header">
           		  		<h3 class="modal-title" id="error-modal-folioUDP"><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;&nbsp;ERROR EN SERVIDOR&nbsp;&nbsp;&nbsp;<i class="fas fa-exclamation-triangle"></i></h3>
               	   	<button type="button" class="close btn-modal-cerrar" data-dismiss="modal" aria-hidden="true"><i class="far fa-times-circle"></i></button>
           	   	</div>
           	   	<div class="modal-body-folioUDP">
				   <div id="txtErrorFolioUDP"> </div>
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