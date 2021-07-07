<?php
    //Libreria de metodos SQL
    include ("sqlmetodos.php");

    //Recuperación de valores del folio.
    $folio = $_POST["folio"];
    $asistentes = $_POST["asistentes"];
    $carconsumido = $_POST["carconsumido"];
    $casextraviados = $_POST["casextraviados"];
    $casentregados = $_POST["casentregados"];
    $siluetas = $_POST["siluetas"];
    $tpractica = $_POST["tpractica"];
    $arma = $_POST["arma"];
    $respongrupo = $_POST["respongrupo"];
    $revisor = $_POST["revisor"];
    $instructor = $_POST["instructor"];
    $observaciones = $_POST["observaciones"];
    $resp = array();
    try{
        $folioObj = new Consultainfo();
        $datNewFolio = $folioObj->set_informacion("update catfolios set asistentes = '$asistentes',carconsumidos = '$carconsumido',
                                casextraviados = '$casextraviados', casentregados = '$casentregados', siluetas = '$siluetas',
                                itipopractica = '$tpractica', idcatarmas = '$arma', idcatrespongrupo = '$respongrupo', idcatrevisores = '$revisor',
                                idcatinstructores = '$instructor', observaciones = '$observaciones' where folio = '$folio'");
        /*Elementos del JSON de Respuesta*/
        $resp["mensaje"] = "Se efectuaron las actualizaciones solicitadas correctamente.";
        $resp["folio"] = $folio;

        echo json_encode($resp);

    }catch(Exception $e){
        /*Para cuando ocurre un fallo*/
        $resp["mensaje"] = "No puede actualizar la información".$e->getMessage();
        $resp["folio"] = $folio;
        echo json_encode($resp);
    
    }
    

?>