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
    $accion = new Consultainfo();
    $sesionActiva = new Consultainfo();
    $sql = "insert into bitacceso values (DEFAULT,$_SESSION[username],NOW(),NOW(),INICIO DE SESIÓN,SQL)";
    $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INICIO DE SESIÓN','$sql')");
    $sesionActiva->set_informacion("update usuarios set sesionactiva = 1 where username = '$_SESSION[username]'");
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
    switch ($_SESSION["idcatrol"]){
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
      echo "No existe el menu verifique por favor, consulte con el administrador del sistema.";
    } 
  ?>

<div class="container-fluid">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carrusel/img_001.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel/img_002.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/carrusel/img_003.jpeg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/carrusel/img_004.jpeg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/carrusel/img_005.jpeg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/carrusel/img_006.jpeg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/carrusel/img_007.jpeg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/carrusel/img_008.jpeg" class="d-block w-100" alt="...">
	</div>
	<div class="carousel-item">
      <img src="img/carrusel/img_009.jpeg" class="d-block w-100" alt="...">
	</div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
</div>


<!-- Pie de P�gina -->
<?php 
    pie();
?>
	
<!-- Librerias JS -->
	<?php 
	   libreriasJS();
	?>
  </body>
</html>