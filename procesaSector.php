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
    $idsector = $_POST["id"];
    $nombre = $_POST["nombre"];
    //$tipo = $_POST["tipo"];
    $observaciones = $_POST["observaciones"];
    //Arreglo de datos de respuesta del sector
    $datossector = array();

    //Objeto PDO de Datos para la BBDD
    $sector = new Consultainfo();

    //Multiples operaciones de CRUD
    switch ($operacion){
        case 1: //Para insertar nuevo sector

            $new_sector = $sector->set_informacion("insert into catsector values(DEFAULT,'$nombre','SECTOR','$observaciones')");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "insert into catsector values(DEFAULT,$nombre,SECTOR,$observaciones)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS sector','$sql')");

            //JSON
            $datossector["nombre"] = $nombre;
            $datossector["msj"] = "correcta";

            echo json_encode($datossector);
        break;

        case 2: //Para actualizar sector
            $udp_sector = $sector->set_informacion("update catsector set sectornombre='$nombre',sectortipo='SECTOR',
                                                    sectorobservaciones='$observaciones' where idcatsector='$idsector'");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "update catsector set sectornombre=$nombre,sectortipo=SECTOR,
            sectorobservaciones=$observaciones where idcatsector=$idsector";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UDP sector','$sql')");

            //JSON
            $datossector["nombre"] = $nombre;
            $datossector["msj"] = "actualizado.";
            echo json_encode($datossector);
        break;

        case 3: //Para eliminar sector
            $del_sector = $sector->set_informacion("delete from catsector where idcatsector='$idsector'");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "delete from catsector where idcatsector=$idsector";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL sector','$sql')");

            //JSON
            $datossector["msj"] = "eliminado correcto";
            echo json_encode($datossector);
        break;

        case 4://Consulto datos del sector
            $row_sector = $sector->get_informacion("select * from catsector where idcatsector = '$idsector'");

            //Bitacora de acceso
            $accion = new Consultainfo();
            $sql = "select * from catsector where idcatsector = $idsector";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SEL sector','$sql')");

            foreach($row_sector as $detsector);
            echo json_encode($detsector);
        break;



    }
?>