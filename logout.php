<?php
    include ("sqlmetodos.php");
    session_start();
    $resultado = array();
    $username = $_SESSION["username"];
    //Destrucción de las variables de sesion
    try{
    unset($_SESSION["username"]);
    unset($_SESSION["idcatrol"]);
    unset($_SESSION["useractivado"]);
    unset($_SESSION["sesionactiva"]);
    unset($_SESSION["dfechavencimiento"]);

    $accion = new Consultainfo();
    $sesionActiva = new Consultainfo();
    $sql = "insert into bitacceso values (DEFAULT,$username,NOW(),NOW(),CIERRE DE SESIÓN,SQL)";
    $accion->set_informacion("insert into bitacceso values (DEFAULT,'$username',NOW(),NOW(),'CIERRE DE SESIÓN','$sql')");
    $sesionActiva->set_informacion("update usuarios set sesionactiva = 0 where username = '$username'");
    $resultado["resp"] = true;

    echo json_encode($resultado);

}catch(Exception $e){
    $resultado["resp"] = false;

    echo json_encode($resultado);
}
?>