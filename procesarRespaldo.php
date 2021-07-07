<?php
    include ("sqlmetodos.php");
    session_start();
    $respuesta = array();
    $tabla = new Consultainfo();

    $fecha = date("d-m-Y");
    //$fecha = "26-06-2020";
    $server = "respaldos/";
    $ruta = $server.$fecha;
    mkdir($ruta,777,true);
    try{
        //Tabla catalogo de folios
            $csv_end  = "\r\n";  
	        $csv_sep  = ",";  
	        $csv_file = $ruta."/folios-".$fecha.".csv";  
            $csv="";  
	        $tablaFolios = $tabla->get_informacion("select * from catfolios");  
	        foreach($tablaFolios as $detalleTablaFolios)  
	        {  
    	        $csv.=$detalleTablaFolios['idcatfolios'].$csv_sep.$detalleTablaFolios['folio'].$csv_sep.$detalleTablaFolios['campotiro'].$csv_sep.
		        $detalleTablaFolios['fecha'].$csv_sep.$detalleTablaFolios['idcatsector'].$csv_sep.$detalleTablaFolios['idcatarmas'].$csv_sep.
		        $detalleTablaFolios['idcatrespongrupo'].$csv_sep.$detalleTablaFolios['idcatrevisores'].$csv_sep.$detalleTablaFolios['idcatinstructores'].
		        $csv_sep.$detalleTablaFolios['carconsumidos'].$csv_sep.$detalleTablaFolios['casentregados'].$csv_sep.
		        $detalleTablaFolios['casextraviados'].$csv_sep.$detalleTablaFolios['siluetas'].$csv_sep.$detalleTablaFolios['asistentes'].$csv_sep.
		        $detalleTablaFolios['observaciones'].$csv_end;  
	        }  
	        //Generamos el csv de todos los datos  
	        if (!$handle = fopen($csv_file, "w")) {  
                    $respuesta[1] = "No se Puede Abrir el Archivo.";  
    	            exit;  
	        }  
	        if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                    $respuesta[1] = "No se puede Escribir en el archivo.";  
    	            exit; 
	        }else{
                    $respuesta[1] = "Se generó satisfactoriamente el respaldo de la tabla del catálogo de folios.";
	        }
            fclose($handle);
    
        //Tabla de usuarios
            $csv_end  = "\r\n";  
	        $csv_sep  = ",";  
	        $csv_file = $ruta."/usuarios-".$fecha.".csv";  
	        $csv="";  
	        $tablaUsuarios = $tabla->get_informacion("select * from usuarios");  
	        foreach($tablaUsuarios as $detalleTablaUsuarios)  
	        {  
    	        $csv.=$detalleTablaUsuarios['id'].$csv_sep.$detalleTablaUsuarios['nombre'].$csv_sep.$detalleTablaUsuarios['apellido'].$csv_sep.
		        $detalleTablaUsuarios['username'].$csv_sep.$detalleTablaUsuarios['idcatrol'].$csv_sep.$detalleTablaUsuarios['useractivado'].$csv_sep.
                $detalleTablaUsuarios['password'].$csv_sep.$detalleTablaUsuarios['sesionactiva'].$csv_sep.$detalleTablaUsuarios['fechaalta'].
                $csv_sep.$detalleTablaUsuarios['fechaultimamod'].$csv_sep.$detalleTablaUsuarios['dfechavencimiento'].$csv_end;  
		    }  
		    //Generamos el csv de todos los datos  
		        if (!$handle = fopen($csv_file, "w")) {  
    		        $respuesta[2] = "No se puede generar el respaldo de la tabla 'usuarios'."; 
                    exit;  
		        }  
		    if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
    		        $respuesta[2] = "No se puede generar el respaldo de la tabla 'usuarios'.";   
    		        exit; 
		    }else{
			        $respuesta[2] = "Se generó satisfactoriamente el respaldo de la tabla usuarios.";
		    }
            fclose($handle);

        //Tabla de catalogo de sectores
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catsectores-".$fecha.".csv";  
            $csv="";  
            $tablaSectores = $tabla->get_informacion("select * from catsector");
            foreach($tablaSectores as $detalleTablaSectores)  
                {  
                    $csv.=$detalleTablaSectores['idcatsector'].$csv_sep.$detalleTablaSectores['sectornombre'].$csv_sep.$detalleTablaSectores['sectortipo'].$csv_sep.
                    $detalleTablaSectores['sectorobservaciones'].$csv_end;  
                }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[3] = "No se puede generar el respaldo de la tabla del catálogo de sectores.";  
                exit;  
                }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[3] = "No se puede generar el respaldo de la tabla del catálogo de sectores.";
                exit; 
                }else{
                    $respuesta[3] = "Se generó satisfactoriamente el respaldo de la tabla catálogo de sectores.";
                }
                fclose($handle);
        
        //Tabla de catálogo de armas
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catarmas-".$fecha.".csv";  
            $csv="";  
            $tablaArmas = $tabla->get_informacion("select * from catarmas");
            foreach($tablaArmas as $detalleTablaArmas)  
            {  
                $csv.=$detalleTablaArmas['idcatarmas'].$csv_sep.$detalleTablaArmas['tipoarma'].$csv_sep.$detalleTablaArmas['calibre'].$csv_sep.
                $detalleTablaArmas['observaciones'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[4] = "No se puede generar el respaldo de la tabla del catálogo de aramas.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[4] = "No se puede generar el respaldo de la tabla del catálogo de armas.";
                exit; 
                }else{
                    $respuesta[4] = "Se generó satisfactoriamente el respaldo de la tabla catálogo de armas.";
                }
            fclose($handle);
        
        //Tabla de catálogo de Responsables de Grupo
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catrespongrupo-".$fecha.".csv";  
            $csv="";  
            $tablaResponsables = $tabla->get_informacion("select * from catrespongrupo");
            foreach($tablaResponsables as $detalleTablaResponsables)  
            {  
                $csv.=$detalleTablaResponsables['idcatrespongrupo'].$csv_sep.$detalleTablaResponsables['noempleado'].$csv_sep.$detalleTablaResponsables['observaciones'].$csv_sep.
                $detalleTablaResponsables['activo'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[5] = "No se puede generar el respaldo de la tabla del catálogo de Responsables de Grupo.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[5] = "No se puede generar el respaldo de la tabla del catálogo de Responsables de Grupo.";
                exit; 
                }else{
                    $respuesta[5] = "Se generó satisfactoriamente el respaldo de la tabla catálogo de Responsables de Grupo.";
                }
            fclose($handle);

        //Tabla de catálogo de Instructores de Tiro
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catinstructores-".$fecha.".csv";  
            $csv="";  
            $tablaInstructores = $tabla->get_informacion("select * from catinstructores");
            foreach($tablaInstructores as $detalleTablaInstructores)  
            {  
                $csv.=$detalleTablaInstructores['idcatinstructores'].$csv_sep.$detalleTablaInstructores['noempleado'].$csv_sep.$detalleTablaInstructores['observaciones'].$csv_end; 
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[6] = "No se puede generar el respaldo de la tabla del catálogo de Instructores de Tiro.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[6] = "No se puede generar el respaldo de la tabla del catálogo de Instructores de Tiro.";
                exit; 
                }else{
                    $respuesta[6] = "Se generó satisfactoriamente el respaldo de la tabla catálogo de Instructores de Tiro.";
                }
            fclose($handle);

        //Tabla de catálogo de Jefes de Campo
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catrevisores-".$fecha.".csv";  
            $csv="";  
            $tablaRevisores = $tabla->get_informacion("select * from catrevisores");
            foreach($tablaRevisores as $detalleTablaRevisores)  
            {  
                $csv.=$detalleTablaRevisores['idcatrevisores'].$csv_sep.$detalleTablaRevisores['noempleado'].$csv_sep.$detalleTablaRevisores['observaciones'].$csv_sep.
                $detalleTablaRevisores['activo'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[7] = "No se puede generar el respaldo de la tabla del catálogo de Jefes de Campo.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[7] = "No se puede generar el respaldo de la tabla del catálogo de Jefes de Campo.";
                exit; 
                }else{
                    $respuesta[7] = "Se generó satisfactoriamente el respaldo de la tabla catálogo de Jefes de Campo.";
                }
            fclose($handle);

        //Tabla de Bitacora de Acceso
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/bitacceso-".$fecha.".csv";  
            $csv="";  
            $tablaBitAcceso = $tabla->get_informacion("select * from bitacceso");
            foreach($tablaBitAcceso as $detalleTablaBitAcceso)  
            {  
                $instruccion = str_replace(",","-",$detalleTablaBitAcceso['bitinstruccion']);
                $csv.=$detalleTablaBitAcceso['idacceso'].$csv_sep.$detalleTablaBitAcceso['username'].$csv_sep.$detalleTablaBitAcceso['fechahora'].$csv_sep.
                $detalleTablaBitAcceso['hora'].$csv_sep.$detalleTablaBitAcceso['bitoperacion'].$csv_sep.$instruccion.$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[8] = "No se puede generar el respaldo de la tabla de Bitácora de Acceso.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[8] = "No se puede generar el respaldo de la tabla Bitácora de Acceso.";
                exit; 
                }else{
                    $respuesta[8] = "Se generó satisfactoriamente el respaldo de la tabla Bitácora de Acceso.";
                }
            fclose($handle);

        //Tabla del catálogo de grados
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catgrados-".$fecha.".csv";  
            $csv="";  
            $tablaGrados = $tabla->get_informacion("select * from catniveles");
            foreach($tablaGrados as $detalleTablaGrados)  
            {  
                $csv.=$detalleTablaGrados['idcatgrados'].$csv_sep.$detalleTablaGrados['nombre'].$csv_sep.$detalleTablaGrados['observaciones'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[9] = "No se puede generar el respaldo de la tabla de Catálogo de Grados.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[9] = "No se puede generar el respaldo de la tabla Catálogo de Grados.";
                exit; 
                }else{
                    $respuesta[9] = "Se generó satisfactoriamente el respaldo de la tabla Catálogo de Grados.";
                }
            fclose($handle);

        //Tabla del catálogo de situaciones
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catsituacion-".$fecha.".csv";  
            $csv="";  
            $tablaSituaciones = $tabla->get_informacion("select * from catsituacion");
            foreach($tablaSituaciones as $detalleTablaSituaciones)  
            {  
                $csv.=$detalleTablaSituaciones['idcatsituacion'].$csv_sep.$detalleTablaSituaciones['situacion'].$csv_sep.$detalleTablaSituaciones['observaciones'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[10] = "No se puede generar el respaldo de la tabla de Catálogo de Situaciones.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[10] = "No se puede generar el respaldo de la tabla Catálogo de Situaciones.";
                exit; 
                }else{
                    $respuesta[10] = "Se generó satisfactoriamente el respaldo de la tabla Catálogo de Situacioes.";
                }
            fclose($handle);

        //Tabla del catálogo de roles de acceso
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/catroles-".$fecha.".csv";  
            $csv="";  
            $tablaRoles = $tabla->get_informacion("select * from catroles");
            foreach($tablaRoles as $detalleTablaRoles)  
            {  
                $csv.=$detalleTablaRoles['idcatrol'].$csv_sep.$detalleTablaRoles['rolnombre'].$csv_sep.$detalleTablaRoles['observaciones'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[11] = "No se puede generar el respaldo de la tabla de Catálogo de Roles.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[11] = "No se puede generar el respaldo de la tabla Catálogo de Roles.";
                exit; 
                }else{
                    $respuesta[11] = "Se generó satisfactoriamente el respaldo de la tabla Catálogo de Roles.";
                }
            fclose($handle);

        //Tabla de lista
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/lista-".$fecha.".csv";  
            $csv="";  
            $tablaLista = $tabla->get_informacion("select * from lista");
            foreach($tablaLista as $detalleTablaLista)  
            {  
                $csv.=$detalleTablaLista['id'].$csv_sep.$detalleTablaLista['noempleado'].$csv_sep.$detalleTablaLista['observaciones'].
                $csv_sep.$detalleTablaLista['fecha'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[12] = "No se puede generar el respaldo de la tabla lista.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[12] = "No se puede generar el respaldo de la tabla Lista.";
                exit; 
                }else{
                    $respuesta[12] = "Se generó satisfactoriamente el respaldo de la tabla Lista.";
                }
            fclose($handle);

        //Tabla de personal
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/personal-".$fecha.".csv";  
            $csv="";  
            $tablaPersonal = $tabla->get_informacion("select * from personal");
            foreach($tablaPersonal as $detalleTablaPersonal)  
            {  
                $csv.=$detalleTablaPersonal['idpersonal'].$csv_sep.$detalleTablaPersonal['idcatgrados'].$csv_sep.$detalleTablaPersonal['recibo'].
                $csv_sep.$detalleTablaPersonal['noempleado'].$csv_sep.$detalleTablaPersonal['nombre'].$csv_sep.$detalleTablaPersonal['idcatsector'].
                $csv_sep.$detalleTablaPersonal['idcatarmas'].$csv_sep.$detalleTablaPersonal['idcatsituacion'].$csv_sep.$detalleTablaPersonal['observaciones'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[13] = "No se puede generar el respaldo de la tabla Personal.";  
                exit;  
            }  
            if (fwrite($handle, $csv) === FALSE) {  
                $respuesta[13] = "No se puede generar el respaldo de la tabla Personal.";
                exit; 
                }else{
                    $respuesta[13] = "Se generó satisfactoriamente el respaldo de la tabla Personal.";
                }
            fclose($handle);

        //Tabla de polasistencia
            $csv_end  = "\r\n";  
            $csv_sep  = ",";  
            $csv_file = $ruta."/polasistencia-".$fecha.".csv";  
            $csv="";  
            $tablaPolasistencia = $tabla->get_informacion("select * from polasistencia");
            foreach($tablaPolasistencia as $detalleTablaPolasistencia)  
            {  
                $csv.=$detalleTablaPolasistencia['icveasistencia'].$csv_sep.$detalleTablaPolasistencia['dfecha'].$csv_sep.$detalleTablaPolasistencia['icantasistentes'].
                $csv_sep.$detalleTablaPolasistencia['icantfaltistas'].$csv_sep.$detalleTablaPolasistencia['icantcartuchos'].$csv_end;  
            }  
            //Generamos el csv de todos los datos  
            if (!$handle = fopen($csv_file, "w")) {  
                $respuesta[14] = "No se puede generar el respaldo de la tabla Asistencia.";  
                exit;  
            }  
            if (fwrite($handle, utf8_decode($csv)) === FALSE) {  
                $respuesta[14] = "No se puede generar el respaldo de la tabla Asistencia.";
                exit; 
                }else{
                    $respuesta[14] = "Se generó satisfactoriamente el respaldo de la tabla Asistencia.";
                }
            fclose($handle);
            
            //Bitacora
            $accion = new Consultainfo();
            $accion->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'RESPALDO GENERAL DE BASE DE DATOS','RESPALDO')");

            //JSON
        echo json_encode($respuesta);
    }catch(Exception $e){
                $respuesta["msjerror"] = "Existe un problema con la base de datos, no se puede generar el respaldo completo,
                                          consulte con el administrador del sistema.";
    }
?>