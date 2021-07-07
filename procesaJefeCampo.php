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
    $idJefeCampo = $_POST["idJefeCampo"];
    $noempleado = $_POST["numempleado"];
    $observaciones = $_POST["observaciones"];
    $operacion = $_POST["operacion"];
    //$noempresponsable = 759990;
    $resultado = array();
    $jefe = new Consultainfo();
    switch($operacion){
        case 1: //Para buscar jefes de campo dentro del catalogo de personal
            $get_jefe = $jefe->get_informacion("SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, 
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
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SEL Jefe de Campo','$sql')");

            //JSON
            foreach($get_jefe as $detjefe);
            echo json_encode($detjefe);
        break;

        case 2: //Para insertar nuevo jefe de campo
            $add_jefe = $jefe->set_informacion("insert into catrevisores values(DEFAULT,'$noempleado','$observaciones',1)");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "insert into catrevisores values(DEFAULT,$noempleado,$observaciones,1)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS Jefe de Campo','$sql')");

            //JSON
            $resultado["msj"] = "Datos del Jefe de Campo nuevo, agregados correctamente.";
            echo json_encode($resultado);
        break;

        case 3: //Para eliminar jefe de campo
            $del_jefe = $jefe->set_informacion("delete from catrevisores where idcatrevisores = '$idJefeCampo'");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "delete from catrevisores where idcatrevisores = $idJefeCampo";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL Jefe de Campo','$sql')");

            //JSON
            $resultado["msj"] = "Jefe de Campo eliminado correctamente";
            echo json_encode($resultado);
        break;

    }
        
    
?>