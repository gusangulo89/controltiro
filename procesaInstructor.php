<?php
    include ("sqlmetodos.php");

    session_start();
    if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
	    echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
	    header("location:index?nologin=false");
    }else if($_SESSION["idcatrol"] == 3){
	        echo "<script> alert('No tiene los permisos necesarios para operar este cat\u00E1logo. Consulte al administrador del sistema.')";
	        header("location:principal");
        }
    $idInstructor = $_POST["idInstructor"];
    $noempleado = $_POST["numempleado"];
    $observaciones = $_POST["observaciones"];
    $operacion = $_POST["operacion"];
    //$noempresponsable = 759990;
    $resultado = array();
    $instructor = new Consultainfo();
    switch($operacion){
        case 1: //Para buscar instructor dentro del catalogo de personal
            $get_instructor = $instructor->get_informacion("SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, 
                elemento.nombre, sector.sectornombre as sector,
                arma.tipoarma as arma, situacion.situacion, elemento.observaciones
                FROM personal as elemento
                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados
                left join catsector as sector on sector.idcatsector = elemento.idcatsector
                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas
                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion
                where elemento.noempleado = '$noempleado'");
            //Bitacora
            $accion = new Consultainfo();
            $sql = "SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, 
                elemento.nombre, sector.sectornombre as sector,
                arma.tipoarma as arma, situacion.situacion, elemento.observaciones
                FROM personal as elemento
                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados
                left join catsector as sector on sector.idcatsector = elemento.idcatsector
                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas
                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion
                where elemento.noempleado = $noempleado";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SEL Instructor de Tiro','$sql')");

            //JSON
            foreach($get_instructor as $detinstructor);
            echo json_encode($detinstructor);
        break;

        case 2: //Para insertar nuevo responsable
            $add_instructor = $instructor->set_informacion("insert into catinstructores values(DEFAULT,'$noempleado','$observaciones')");
            
            //Bitacora
            $accion = new Consultainfo();
            $sql = "insert into catinstructores values(DEFAULT,$noempleado,$observaciones)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS Instructor de Tiro','$sql')");
            
            //JSON
            $resultado["msj"] = "Datos de intructor nuevo agregados correctamente";
            echo json_encode($resultado);
        break;

        case 3: //Para eliminar responsable de grupo
            $del_instructor = $instructor->set_informacion("delete from catinstructores where idcatinstructores = '$idInstructor'");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "delete from catinstructores where idcatinstructores = $idInstructor";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL Instructor de Tiro','$sql')");

            //JSON
            $resultado["msj"] = "Instructor de tiro eliminado correctamente";
            echo json_encode($resultado);
        break;

    }
        
    
?>