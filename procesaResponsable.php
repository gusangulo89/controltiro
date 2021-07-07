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
    $noempresponsable = $_POST["numempleado"];
    $observaciones = $_POST["observaciones"];
    $operacion = $_POST["operacion"];
    //$noempresponsable = 759990;
    $resultado = array();
    $responsable = new Consultainfo();
    switch($operacion){
        case 1: //Para buscar responsable
            $get_responsable = $responsable->get_informacion("SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, 
                elemento.nombre, sector.sectornombre as sector,
                arma.tipoarma as arma, situacion.situacion, elemento.observaciones
                FROM personal as elemento
                left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados
                left join catsector as sector on sector.idcatsector = elemento.idcatsector
                left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas
                left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion
                where elemento.noempleado = '$noempresponsable'");

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
                where elemento.noempleado = $noempresponsable";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SELECT Buscar Responsable','$sql')");
            
            
                //JSON
            foreach($get_responsable as $detresponsable);

            echo json_encode($detresponsable);
        break;

        case 2: //Para insertar nuevo responsable
            $add_responsable = $responsable->set_informacion("insert into catrespongrupo values(DEFAULT,$noempresponsable,'$observaciones',1)");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "insert into catrespongrupo values(DEFAULT,$noempresponsable,$observaciones,1)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS Responsable','$sql')");

            //JSON
            $resultado["msj"] = "Registro agregado correctamente";
            echo json_encode($resultado);
        break;

        case 3: //Para eliminar responsable de grupo
            $del_responsable = $responsable->set_informacion("delete from catrespongrupo where noempleado = '$noempresponsable'");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "delete from catrespongrupo where noempleado = $noempresponsable";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'DEL Responsable','$sql')");

            //JSON
            $resultado["msj"] = "Responsable de grupo eliminado correctamente";
            echo json_encode($resultado);
        break;

    }
        
    
?>