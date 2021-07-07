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
    $idgrado = $_POST["id"];
    $descripcionGrado = $_POST["desgrado"];
    $observaciones = $_POST["observaciones"];
    //Arreglo de datos de respuesta del grado
    $resultado = array();

    //Objeto PDO de Datos para la BBDD
    $grado = new Consultainfo();

    //Multiples operaciones de CRUD
    switch ($operacion){
        case 1: //Para insertar un nuevo registro en el catálogo de grados.
            $new_grado = $grado->set_informacion("insert into catgrados values(DEFAULT,'$descripcionGrado','$observaciones')");
            
            //Bitacora
            $accion = new Consultainfo();
            $sql = "insert into catgrados values(DEFAULT,$descripcionGrado,$observaciones)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS grado nuevo','$sql')");

            //JSON
            $resultado["nombre"] = $descripcionGrado;
            $resultado["msj"] = "Inserción correcta de los datos del grado.";
            echo json_encode($resultado);
        break;

        case 2: //Para actualizar grado
            $udp_grado = $grado->set_informacion("update catgrados set nombre='$descripcionGrado',observaciones='$observaciones' where idcatgrados='$idgrado'");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "insert into catgrados values(DEFAULT,$descripcionGrado,$observaciones)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UDP Grado','$sql')");
            
            //JSON
            $resultado["nombre"] = $descripcionGrado;
            $resultado["msj"] = "Datos del registro actualizados correctamente.";
            echo json_encode($resultado);
        break;

        case 3: //Para eliminar registro del catálogo de grados
            $del_grado = $grado->set_informacion("delete from catgrados where idcatgrados='$idgrado'");
            
            //Bitacora
            $accion = new Consultainfo();
            $sql = "delete from catgrados where idcatgrados=$idgrado";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL Grado','$sql')");

            //JSON
            $resultado["msj"] = "Registro eliminado correctamente.";
            echo json_encode($resultado);
        break;

        case 4://Consultar datos del registro del grado
            $row_grado = $grado->get_informacion("select * from catgrados where idcatgrados = '$idgrado'");
            
            //Bitacora
            $accion = new Consultainfo();
            $sql = "select * from catgrados where idcatgrados = $idgrado";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SEL Grado','$sql')");

            //JSON
            foreach($row_grado as $detgrado);
            echo json_encode($detgrado);
        break;



    }
?>