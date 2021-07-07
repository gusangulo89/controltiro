<?php


        
    
        
    //Function de la etiqueta head
    function cabeceroPrincipal(){
        echo " 
    <head>
        <title>SCT v. 1.0</title>
            <!-- Required meta tags -->
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <!-- Bootstrap CSS -->
            <link rel='shortcut icon' href='img/principal/logoSSPCDMX.png'>
            
            

            <link rel='stylesheet' href='css/bootstrap.min.css'>
            <link rel='stylesheet' href='css/datatables.min.css'>
            <link rel='stylesheet' href='css/toastr.min.css'>
            <link rel='stylesheet' href='css/gus-css.css'>
            <link rel='stylesheet' href='css/jsDatePick_ltr.min.css'>
            <link rel='stylesheet' href='css/jquery-ui.css'>
        <!-- Fontawesome icons -->
            <link rel='stylesheet' href='fontawesome/css/all.css'>
    </head>
       "; 
    }
    
    //Cabecera de cada pagina
    function cabecera(){
        echo"
            <div class='container cabecera-fija'>
                <div class='row'>
                    <div class='col-sm-2'>
                        <img src='img/logossp.jpg' class='img-fluid img-rounded'>
                    </div>
                    <div class='col-sm-8'>
                        <h1 align='center' class='pt-5 elemento-responsive'>
                            Sitema de Control de Tiro
                        </h1>
                    </div>
        
                    <div class='col-sm-2'>
                        <img src='img/logossp.jpg' class='img-fluid img-rounded'>
                    </div>
                </div>
            </div>";
    }
    
    //Muesta usuario y cierre de sesion
    function barra_cierre_sesion(){
        //Datos del usuario
        $usuario = $_SESSION["username"];
        //Armado de mi fecha
        $arrayMeses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio',
            'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
        $arrayDias = array('Domingo','Lunes','Martes',utf8_decode('Miércoles'),'Jueves','Viernes',utf8_decode('Sábado'));
        $fecha = $arrayDias[date('w')]." ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
        echo utf8_encode("                  <div class='container pt-1'>
                                    <div class='row pt-2'>
                                        <div class='col'>
                                            <form action='logout.php'>
                                                <span class='float-right'>
                                                    <div class='form-group'>
                                                        <button type='button' class='btn btn-danger' name='logout' id='logout' onclick='cerrarSesion()'>
                                                            <i class='fas fa-sign-out-alt'></i>
                                                            Apagar
                                                        </button>
                                                    </div>
        
                                                </span>
                                                <span class='float-left'>
                                                    <div class='form-group'>
                                                        <h5 class='display-5'>
                                                            Bienvenido: <strong>".$usuario."</strong>
                                                        </h5>
                                                    </div>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='mx-auto'>
                                            <h4><strong>
                                            Ciudad de M&eacute;xico a, ".$fecha."
                                            </strong></h4>
                                        </div>
                                    </div>
                                </div>");
    }
    
    //Pie e p�gina
    function pie(){
        echo "
   <div class='footer container-fluid'>
	<div class='footer-content'>
		<div class='footer-section about'>
			<h1 class='logo-text'><span>SCT</span> v. 1.0</h1>
			<p>
				Sistema de Control de Pr&aacute;cticas de Tiro.
			</p>
			<div class='contact'>
				<span><i class='fas fa-phone'></i> 55-87386942</span>
				<span><i class='fas fa-envelope'></i> gusangulomele89@gmail.com</span>
			</div>
			<div class='socials'>
				<a href='#' ><i class='fab fa-facebook'></i></a>
				<a href='#' ><i class='fab fa-instagram'></i></a>
				<a href='#' ><i class='fab fa-twitter'></i></a>
				<a href='#' ><i class='fab fa-youtube'></i></a>
			</div>
			
		</div>
		
		<div class='footer-section contact-form'>
			<h2>Contacto:</h2>
			<br>
				<form id='myform' action='correo-contacto.php' method='post' class='needs-validation' novalidate onsubmit='limpiaCampos'>
                    <div class='form-row'>
                    <div class='col-sm-12 mb-3'>
                        <input id='nombre' type='text' name='nombre' class='form-control' placeholder='Su nombre ...' required>
                            
                            <div class='invalid-feedback'><i class='fa fa-exclamation-triangle'></i> Introduzca su nombre, por favor!</div>
                        <br>
					    <input id='email' type='email' name='email' class='form-control' placeholder='Su direcci&oacute;n de e-mail' data-error='Bruh, that email address is invalid' required>
                            
                            <div class='invalid-feedback'><i class='fa fa-exclamation-triangle'></i> Introduzca su e-mail, por favor!</div>
                        <br>
					    <textarea name='message' class='form-control' placeholder='Su mensaje ...' required></textarea>
					       
                           <div class='invalid-feedback'><i class='fa fa-exclamation-triangle'></i> Introduzca el asunto, por favor!</div>
                        <br>
					    <button type='button' class='btn btn-success' data-toggle='modal' data-target='#graciasContacto' name='enviarContacto' id='enviarContacto'>
						  <i class='fas fa-envelope'></i>
						  Enviar
                        </button>
                        <button type='reset' class='btn btn-info' name='limpiar' id='limpiar'>
                        <i class='fas fa-backspace'></i>
						  Limpiar Campos
					    </button>
                    </div>
                    </div>
				</form> 		
		</div>
	</div>
	<div class='footer-bottom'>
		&copy; 2021 | Dise&ntilde;ado por Gustavo Angulo
	</div>


</div>";
    }
    
    //Librerias Java Script
    function libreriasJS(){
        echo "
        <script src='jquery/jquery-3.4.1.min.js' ></script>
        <script src='js/tether.min.js'></script>
        <script src='jquery/popper.js' ></script>
        <script src='js/bootstrap.js'></script>
        <script src='js/datatables.js'></script>
        <script src='js/datatables.min.js'></script>
        <script src='js/toastr.min.js'></script>
        <script src='fontawesome/js/all.js' ></script>
        <script src='js/validation.js' ></script>
        <script src='js/funcionesGUS.js' ></script>
        <script src='js/functionGUScrud.js' ></script>
        <script src='js/funcionesGUSusr.js' ></script>
        <script src='js/jsDatePick.jquery.min.1.3.js' ></script>
        <script src='js/gusJSlogsr.js'></script>";
    }