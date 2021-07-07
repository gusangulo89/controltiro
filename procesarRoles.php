<?php
    include ("sqlmetodos.php");

    session_start();
    if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
	    echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
	    header("location:index?nologin=false");
    }else if($_SESSION["idcatrol"] != 1){
	        echo "<script> alert('No tiene los permisos necesarios para operar este cat\u00E1logo. Consulte al administrador del sistema.')";
	        header("location:principal");
        }
        $operacion = $_POST["operacion"];
        $idrol = $_POST["id"];
        $nombrerol = $_POST["nombrerol"];
        $observaciones = $_POST["observacionesrol"];
        //Arreglo de datos de respuesta del arma
        $datosrol = array();
    
        //Objeto PDO de Datos para la BBDD
        $rol = new Consultainfo();
    
        //Multiples operaciones de CRUD
        switch ($operacion){
            case 1: //Para insertar nuevo rol
                $new_rol = $rol->set_informacion("insert into catroles values(DEFAULT,'$nombrerol','$observaciones')");

                //Bitacora de Acceso
                $accion = new Consultainfo();
                $sql = "insert into catroles values(DEFAULT,$nombrerol,$observaciones)";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS rol de acceso','$sql')");

                //JSON
                $datosrol["msj"] = "Datos del rol, guardados sartisfactoriamente.";
                echo json_encode($datosrol);
            break;
    
            case 2: //Para actualizar roles
                $udp_rol = $rol->set_informacion("update catroles set rolnombre='$nombrerol', observaciones='$observaciones' where idcatrol='$idrol'");
                //$datossector["nombre"] = $nombre;

                //Bitacora de Acceso
                $accion = new Consultainfo();
                $sql = "update catroles set rolnombre=$nombrerol, observaciones=$observaciones where idcatrol=$idrol";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UDP rol de acceso','$sql')");

                //JSON
                $datosrol["msj"] = "Proceso de actualización satisfactorio.";
                echo json_encode($datosrol);
            break;
    
            case 3: //Para eliminar rol
                $del_rol = $rol->set_informacion("delete from catroles where idcatrol='$idrol'");

                //Bitacora de Acceso
                $accion = new Consultainfo();
                $sql = "delete from catroles where idcatrol=$idrol";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL rol de acceso','$sql')");

                //JSON
                $datosrol["msj"] = "Datos del perfil de acceso eliminados correctamente";
                echo json_encode($datosrol);
            break;
    
            case 4://Consulto datos del rol de acceso
                $row_rol = $rol->get_informacion("select * from catroles where idcatrol = '$idrol'");

                //Bitacora de Acceso
                $accion = new Consultainfo();
                $sql = "select * from catroles where idcatrol = $idrol";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SEL rol de acceso','$sql')");

                //JSON
                foreach($row_rol as $detrol);
                echo json_encode($detrol);
            break;
        }
?>