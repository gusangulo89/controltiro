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
        $idarma = $_POST["id"];
        $tipoarma = $_POST["tipoarma"];
        $calibre = $_POST["calibre"];
        $observaciones = $_POST["observaciones"];
        //Arreglo de datos de respuesta del arma
        $datosarma = array();
    
        //Objeto PDO de Datos para la BBDD
        $arma = new Consultainfo();
    
        //Multiples operaciones de CRUD
        switch ($operacion){
            case 1: //Para insertar nueva arma
    
                $new_arma = $arma->set_informacion("insert into catarmas values(DEFAULT,'$tipoarma','$calibre','$observaciones')");
                //$datosarma["nombre"] = $nombre;
                $datosarma["msj"] = "Registro guardado satisfactoriamente.";
                echo json_encode($datosarma);
            break;
    
            case 2: //Para actualizar armamento
                $udp_arma = $arma->set_informacion("update catarmas set tipoarma='$tipoarma',calibre='$calibre',
                                                        observaciones='$observaciones' where idcatarmas='$idarma'");
                //$datossector["nombre"] = $nombre;
                $datosarma["msj"] = "Proceso de actualización satisfactorio.";
                echo json_encode($datosarma);
            break;
    
            case 3: //Para eliminar arma
                $del_arma = $arma->set_informacion("delete from catarmas where idcatarmas='$idarma'");
                $datosarma["msj"] = "Datos del armamento eliminados correctamente";
                echo json_encode($datosarma);
            break;
    
            case 4://Consulto datos del armamento
                $row_arma = $arma->get_informacion("select * from catarmas where idcatarmas = '$idarma'");
                foreach($row_arma as $detarma);
                echo json_encode($detarma);
            break;
    
    
    
        }
?>