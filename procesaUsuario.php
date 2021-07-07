<?php
    include ("sqlmetodos.php");
    session_start();
    $usuario = $_POST["username"];
    $password = $_POST["password"];
    $arregloUsuario = array();
    $fechaActual = Date('Y-m-d');
    $user = new Consultainfo();
    $result = $user->get_informacion("select * from usuarios where username = '$usuario'");

    foreach($result as $detresult);
    //Verificación del password de usuario
    $passVerif = password_verify($password,$detresult["password"]);

    //Asignación de los datos a las variables de sesion
    $_SESSION["username"] = $detresult["username"];
    $_SESSION["idcatrol"] = $detresult["idcatrol"];
    $_SESSION["useractivado"] = $detresult["useractivado"];
    $_SESSION["sesionactiva"] = $detresult["sesionactiva"];
    

    //Formación del arreglo para pasarlo por JSON
    $arregloUsuario["username"] = $detresult["username"];
    $arregloUsuario["password"] = $passVerif;
    $arregloUsuario["useractivado"] = $detresult["useractivado"];
    $arregloUsuario["sesionactiva"] = $detresult["sesionactiva"];
    if($fechaActual <= $detresult["dfechavencimiento"]){
        $arregloUsuario["dfechavencimiento"] = "no vencido";
    }else{
        $arregloUsuario["dfechavencimiento"] = "vencido";
    }
    
    echo json_encode($arregloUsuario);

?>