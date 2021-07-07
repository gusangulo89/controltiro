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
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $username = $_POST["username"];
        $rol = $_POST["rol"];
        $activado = $_POST["activado"];
        $password = $_POST["password"];
        $sesionactiva = $_POST["sesionactiva"];
        $fechaalta = $_POST["fechaalta"];
        $fechaultimamod = $_POST["fechaultimamod"];
        $fechavencimiento = $_POST["fechavencimiento"];

        $pass_cifrado = password_hash($password, PASSWORD_DEFAULT);
        $resultado = array();
        
        //Objeto PDO de Coenxión a la base de datos
        $usuario = new Consultainfo();

        switch($operacion){
            case 1: //Insertar nuevo usuario
                $new_usuario = $usuario->set_informacion("insert into usuarios values(DEFAULT,'$nombre','$apellido','$username','$rol','$activado',
                                                        '$pass_cifrado','$sesionactiva','$fechaalta','$fechaultimamod','$fechavencimiento')");
                $resultado["msj"] = "Inserción de datos del usuario correctamente.";
                //Bitacora de Acceso
                $accion = new Consultainfo();
                $sql = "insert into usuarios values(DEFAULT,$nombre,$apellido,$username,$rol,$activado,
                $pass_cifrado,$sesionactiva,$fechaalta,$fechaultimamod,$fechavencimiento)";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'INS new usuario','$sql')");
                echo json_encode($resultado);
            break;

            case 2: //Modificar y edición de los datos del usuario
                $udp_usuario = $usuario->set_informacion("update usuarios set username = '$username', idcatrol = '$rol' where id = '$id'");
                $resultado["msj"] = "Actualización de datos del usuario correctos.";

                //Bitacora de acceso
                $accion = new Consultainfo();
                $sql = "update usuarios set username = $username, idcatrol = $rol where id = $id";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UDP usuario','$sql')");

                //Respuesta JSON
                echo json_encode($resultado);

            break;

            case 3://Reestablecer contraseña
                $udp_usuario = $usuario->set_informacion("update usuarios set password = '$pass_cifrado' where id = '$id'");
                $resultado["msj"] = "Reestablecimiento de contraseña correcto.";

                //Bitacora de acceso
                $accion = new Consultainfo();
                $sql = "update usuarios set password = $pass_cifrado where id = $id";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'RESET password','$sql')");

                //Respuesta del JSON
                echo json_encode($resultado);

            break;

            case 4:
                $row_usuario = $usuario->get_informacion("SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, 
                                                            roles.idcatrol, roles.rolnombre FROM usuarios as usuario
                                                            inner join catroles as roles on roles.idcatrol = usuario.idcatrol
                                                            where usuario.id = '$id'");
                
                //Bitacora de acceso
                $accion = new Consultainfo();
                $sql = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.username, usuario.fechaalta, 
                roles.idcatrol, roles.rolnombre FROM usuarios as usuario inner join catroles as roles on roles.idcatrol = usuario.idcatrol where usuario.id = $id";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'RESET password','$sql')");

                //Respuesta JSON
                foreach($row_usuario as $detusuario);
                echo json_encode($detusuario);
            break;

            case 5: //Desbloqueo de usuario
                $udp_usuario = $usuario->set_informacion("update usuarios set useractivado = 1, sesionactiva = 0  where id = '$id'");
                $resultado["msj"] = "El desbloqueo del usuario es satisfactorio.";

                //Bitacora de acceso
                $accion = new Consultainfo();
                $sql = "update usuarios set useractivado = 1, sesionactiva = 0  where id = $id";
                $resultado["msj"] = "El desbloqueo del usuario es satisfactorio.";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'UNLOCK user','$sql')");
                
                
                
                echo json_encode($resultado);
            break;

            case 6: //Bloquear usuario
                $udp_usuario = $usuario->set_informacion("update usuarios set useractivado = 2, sesionactiva = 1  where id = '$id'");
                $resultado["msj"] = "El bloqueo del usuario es satisfactorio.";

                //Bitacora e acceso
                $accion = new Consultainfo();
                $sql = "update usuarios set useractivado = 2, sesionactiva = 1  where id = $id";
                $resultado["msj"] = "El desbloqueo del usuario es satisfactorio.";
                $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'LOCK user','$sql')");
                
                echo json_encode($resultado);
            break;

        }
?>