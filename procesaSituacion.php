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
        
    $operacion = $_POST["operacion"];
    $idsituacion = $_POST["id"];
    $descripcionSituacion = $_POST["dessituacion"];
    $observaciones = $_POST["observaciones"];
    //Arreglo de datos de respuesta del sector
    $resultado = array();

    //Objeto PDO de Datos para la BBDD
    $situacion = new Consultainfo();

    //Multiples operaciones de CRUD
    switch ($operacion){
        case 1: //Para insertar un nuevo registro en el catálogo de situaciones.
            $new_situacion = $situacion->set_informacion("insert into catsituacion values(DEFAULT,'$descripcionSituacion','$observaciones')");
            
            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "insert into catsituacion values(DEFAULT,$descripcionSituacion,$observaciones)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS situacion','$sql')");

            //JSON
            $resultado["nombre"] = $descripcionSituacion;
            $resultado["msj"] = "Inserción correcta de los datos de la situación.";
            echo json_encode($resultado);
        break;

        case 2: //Para actualizar sector
            $udp_situacion = $situacion->set_informacion("update catsituacion set situacion='$descripcionSituacion',observaciones='$observaciones' 
                                                            where idcatsituacion='$idsituacion'");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "update catsituacion set situacion=$descripcionSituacion,observaciones=$observaciones 
            where idcatsituacion=$idsituacion";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UDP situacion','$sql')");

            //JSON
            $resultado["nombre"] = $descripcionSituacion;
            $resultado["msj"] = "Datos de la situación actualizados correctamente.";
            echo json_encode($resultado);
        break;

        case 3: //Para eliminar registro del catálogo de situación
            $del_situacion = $situacion->set_informacion("delete from catsituacion where idcatsituacion='$idsituacion'");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "delete from catsituacion where idcatsituacion=$idsituacion";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL situacion','$sql')");

            //JSON
            $resultado["msj"] = "Registro eliminado correctamente.";
            echo json_encode($resultado);
        break;

        case 4://Consultar datos de la situación
            $row_situacion = $situacion->get_informacion("select * from catsituacion where idcatsituacion = '$idsituacion'");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "select * from catsituacion where idcatsituacion = $idsituacion";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SEL situacion','$sql')");

            foreach($row_situacion as $detsituacion);
            echo json_encode($detsituacion);
        break;



    }
?>