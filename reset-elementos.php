<?php
    include ("sqlmetodos.php");
    session_start();
    $txt_msj = $_POST["mensaje"];
    $det_msj = array();

    try{
        $actualizar = new Consultainfo();
        $row_udp = $actualizar->set_informacion("update personal set idcatarmas = 4 where idcatarmas <> 4");
        //Bitacora de Acceso
        $accion = new Consultainfo();
        $sql = "update personal set idcatarmas = 4 where idcatarmas <> 4";
        $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'RESET personal','$sql')");

        $det_msj["msj_resp"] = "Correcto";

        echo json_encode($det_msj);

    }catch(Exception $e){
        echo "No se puede resetear el cat&aacute;logo de personal.";
    }
?>