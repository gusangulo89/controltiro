<?php
    //Libreria de metodos SQL
    include ("sqlmetodos.php");
    session_start();
    //Recuperación de las variables de captura
    $grado  = trim($_POST["grado"]);
    $nombre = $_POST["nombre"];
    $noempleado = trim($_POST["placa"]);
    $sector = trim($_POST["sector"]);
    $arma = trim($_POST["arma"]);
    $situacion = trim($_POST["situacion"]);
    $observaciones = $_POST["observaciones"];
    $foto = $_POST["foto"];
    $recibo = "foto/".$foto;
    $operacion = $_POST["operacion"];

    if($operacion == 1){
    //Inserción de los datos en nuestra base de datos
        try{
            $setPersonalNuevo = new Consultainfo();
            $personalNuevo = $setPersonalNuevo->set_informacion("insert into personal 
            (idpersonal,idcatgrados,recibo,noempleado,nombre,idcatsector,
            idcatarmas,idcatsituacion,observaciones) 
            values(DEFAULT,'$grado','$recibo',$noempleado,'$nombre','$sector','$arma','$situacion','$observaciones')");

            //Bitacora
            $accion = new Consultainfo();
            $sql = "insert into personal (idpersonal,idcatgrados,recibo,noempleado,nombre,idcatsector,
            idcatarmas,idcatsituacion,observaciones) values(DEFAULT,$grado,$recibo,$noempleado,$nombre,$sector,$arma,$situacion,$observaciones)";
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INSERT elemento nuevo','$sql')");

            //declaracion del arreglo para la estructura de respuesta
                
                $datosElemento = array();
                $datosElemento["grado"] = $grado;
                $datosElemento["nombre"] = $nombre;
                $datosElemento["noempleado"] = $noempleado;

                $detallesector = new Consultainfo();
                $infoSector = $detallesector->get_informacion("select * from catsector where idcatsector = '$sector'");
                foreach($infoSector as $detInfoSector);
                if(!$infoSector){
                    $datosElemento["sector"] = "Sector no asignado";
                }else{
                    $datosElemento["sector"] = $detInfoSector["sectornombre"];
                }
                

                $detalleArma = new Consultainfo();
                $infoArma = $detalleArma->get_informacion("select * from catarmas where idcatarmas = '$arma'");
                foreach($infoArma as $detInfoArma);
                if(!$infoArma){
                    $datosElemento["arma"] = "Armamento no asignado";
                }else{
                    $datosElemento["arma"] = $detInfoArma["tipoarma"];
                }
                

                $detalleSituacion = new Consultainfo();
                $infoSituacion = $detalleSituacion->get_informacion("select * from catsituacion where idcatsituacion = '$situacion'");
                foreach($infoSituacion as $detInfoSituacion);
                if(!$infoSituacion){
                    $datosElemento["situacion"] = "Situación no asiganda";
                }else{
                    $datosElemento["situacion"] = $detInfoSituacion["situacion"];
                }
                
                
                $datosElemento["observaciones"] = $observaciones;
                $datosElemento["foto"] = $recibo;
                $datosElemento["mensaje"] = "Se insertaron correctamente los datos";
                echo json_encode($datosElemento);      
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }else{
        //Actualización de datos en la tabla personal
        try{
            $setPersonalNuevo = new Consultainfo();
            if($recibo == "foto/"){
                $personalNuevo = $setPersonalNuevo->set_informacion("update personal 
                set idcatgrados = '$grado', noempleado = '$noempleado',nombre = '$nombre',
                idcatsector = '$sector',idcatarmas = '$arma', idcatsituacion = '$situacion', observaciones = '$observaciones' 
                where noempleado = '$noempleado'");

                //Bitacora de Acceso
                $accion = new Consultainfo();
                $sql = "update personal set idcatgrados = $grado, noempleado = $noempleado,nombre = $nombre, idcatsector = $sector,
                idcatarmas = $arma, idcatsituacion = $situacion, observaciones = $observaciones where noempleado = $noempleado";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UDP elemento','$sql')");
                //declaracion del arreglo para la estructura de respuesta
                    $datosElemento = array();
                    $datosElemento["grado"] = $grado;
                    $datosElemento["nombre"] = $nombre;
                    $datosElemento["noempleado"] = $noempleado;
                    $datosElemento["sector"] = $sector;
                    $datosElemento["arma"] = $arma;
                    $datosElemento["situacion"] = $situacion;
                    $datosElemento["observaciones"] = $observaciones;
                    $datosElemento["mensaje"] = "Se actualizaron correctamente los datos.";
                    echo json_encode($datosElemento);
            }else{
                $personalNuevo = $setPersonalNuevo->set_informacion("update personal 
                set idcatgrados = $grado, recibo = '$recibo', noempleado = $noempleado,nombre = '$nombre',
                idcatsector = $sector,idcatarmas = $arma, idcatsituacion = $situacion, observaciones = '$observaciones' 
                where noempleado = $noempleado");
                //declaracion del arreglo para la estructura de respuesta
                    $datosElemento = array();
                    $datosElemento["grado"] = $grado;
                    $datosElemento["nombre"] = $nombre;
                    $datosElemento["noempleado"] = $noempleado;
                    $datosElemento["sector"] = $sector;
                    $datosElemento["arma"] = $arma;
                    $datosElemento["situacion"] = $situacion;
                    $datosElemento["observaciones"] = $observaciones;
                    $datosElemento["foto"] = $recibo;
                    $datosElemento["mensaje"] = "Se actualizaron correctamente los datos.";
                    echo json_encode($datosElemento);
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
?>