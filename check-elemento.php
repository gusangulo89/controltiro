<?php
    include ("sqlmetodos.php");
    session_start();
    $fecha = Date("Y-m-d");
    $noempleado = $_GET["noempleado2"];

    $estadistica = new Consultainfo();

    $total = $estadistica->duplicados_registros("select * from polasistencia where dfecha = '$fecha'");
    if($total == 0){
        $estadistica->set_informacion("insert into polasistencia values (DEFAULT,'$fecha',1,0,18)");
    }else{
        $registros = $estadistica->get_informacion("select * from polasistencia where dfecha = '$fecha'");
        foreach($registros as $detregistros);
        $asistentes = $detregistros['icantasistentes'] + 1;
        $cartuchos = $detregistros['icantcartuchos'] + 18;

        $estadistica->set_informacion("UPDATE polasistencia set icantasistentes = $asistentes, icantcartuchos = $cartuchos where dfecha = '$fecha'");

    }
      
        $persona = new Consultainfo();
        $elemento = $persona->get_informacion("SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, 
            elemento.nombre, sector.sectornombre as sector,
            arma.tipoarma as arma, situacion.situacion, elemento.observaciones
            FROM personal as elemento
            left join catniveles as grado on grado.idcatgrados = elemento.idcatgrados
            left join catsector as sector on sector.idcatsector = elemento.idcatsector
            left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas
            left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion
            where elemento.noempleado = '$noempleado'");

        //Bitacora de Acceso
        $accion = new Consultainfo();
        $sql = "SELECT elemento.idpersonal, grado.nombre as grado,elemento.recibo as recibo, elemento.noempleado, 
        elemento.nombre, sector.sectornombre as sector,
        arma.tipoarma as arma, situacion.situacion, elemento.observaciones
        FROM personal as elemento
        left join catgrados as grado on grado.idcatgrados = elemento.idcatgrados
        left join catsector as sector on sector.idcatsector = elemento.idcatsector
        left join catarmas as arma on arma.idcatarmas = elemento.idcatarmas
        left join catsituacion as situacion on situacion.idcatsituacion = elemento.idcatsituacion
        where elemento.noempleado = $noempleado";
        $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'SELECT elemento','$sql')");

        foreach($elemento as $detelemento);

        echo json_encode($detelemento);
  
    
?>