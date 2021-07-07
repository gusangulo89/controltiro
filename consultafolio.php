<?php
    include ("sqlmetodos.php");
    session_start();
    $username = $_SESSION["username"];
    //Recupero el id del folio
    $id_folio = $_POST["nofolio"];
    //$id_folio = 78;

    //permite definer el correcto folio para su busqueda

    function generaCeros($numero){
        //obtengop el largo del numero
        $largo_numero = strlen($numero);
        //especifico el largo maximo de la cadena
        $largo_maximo = 6;
        //tomo la cantidad de ceros a agregar
        $agregar = $largo_maximo - $largo_numero;
        //agrego los ceros
            for($i =0; $i<$agregar; $i++){
                $numero = "0".$numero;
                }
        //retorno el valor con ceros
        return $numero;
    }

    $no_folio = generaCeros($id_folio);

    //Declaracion del arreglo para los datos
    $datos = array();

    
        //arreglo de la tabla catfolios
        $get_folio = new Consultainfo();
        $folio = $get_folio->get_informacion("select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, 
		        responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,
                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,
                folios.observaciones, folios.itipopractica
                from catfolios as folios
                left join catsector as sector on folios.idcatsector = sector.idcatsector
                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas
                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo
                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores
                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores
                where folios.folio ='$no_folio'");
      
        foreach($folio as $detfolio);
       

        //construccion del responsable
        $get_responsable = new Consultainfo();
        $responsable = $get_responsable->get_informacion("select responsable.idcatrespongrupo, responsable.noempleado, grados.nombre as grado, elemento.nombre 
            from catrespongrupo as responsable
            inner join personal as elemento on responsable.noempleado = elemento.noempleado
            inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
            where responsable.noempleado = '$detfolio[responsable]'");
        foreach($responsable as $detresponsable);

        //construccion del instructor
        $get_instructor = new Consultainfo();
        $instructor = $get_instructor->get_informacion("select instructor.idcatinstructores, instructor.noempleado, grados.nombre as grado, elemento.nombre 
            from catinstructores as instructor
            inner join personal as elemento on instructor.noempleado = elemento.noempleado
            inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
            where instructor.noempleado = '$detfolio[instructor]'");
        foreach($instructor as $detinstructor);

        //construccion el Jefe de Campo
        $get_revisor = new Consultainfo();
        $revisor = $get_revisor->get_informacion("select revisor.idcatrevisores, revisor.noempleado, grados.nombre as grado, elemento.nombre 
            from catrevisores as revisor
            left join personal as elemento on revisor.noempleado = elemento.noempleado
            left join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
            where revisor.noempleado = '$detfolio[revisor]'");
        foreach($revisor as $detrevisor);

        //construccion del arreglo con todos los datos
            $data["idcatfolios"]    = $detfolio["idcatfolios"];
            $data["folio"]          = $detfolio["folio"];
            $data["campotiro"]      = $detfolio["campotiro"];
            $data["fecha"]          = $detfolio["fecha"];
            $data["sectornombre"]   = $detfolio["sectornombre"];
            $data["tipoarma"]       = $detfolio["tipoarma"];
            $data["responsable"]    = $detresponsable;
            $data["revisor"]        = $detrevisor;
            $data["instructor"]     = $detinstructor;
            $data["carconsumidos"]  = $detfolio["carconsumidos"];
            $data["casentregados"]  = $detfolio["casentregados"];
            $data["casextraviados"] = $detfolio["casextraviados"];
            $data["siluetas"]       = $detfolio["siluetas"];
            $data["asistentes"]     = $detfolio["asistentes"];
            $data["observaciones"]  = $detfolio["observaciones"];
            $data["itipopractica"]  = $detfolio["itipopractica"];
            if(! empty($data["folio"])){
                $sql = "select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma,  
                responsable.noempleado as responsable, revisor.noempleado as revisor, instructor.noempleado as instructor,
                folios.carconsumidos, folios.casentregados, folios.casextraviados, folios.siluetas, folios.asistentes,
                folios.observaciones, folios.itipopractica
                from catfolios as folios
                left join catsector as sector on folios.idcatsector = sector.idcatsector
                left join catarmas as armas on folios.idcatarmas = armas.idcatarmas
                left join catrespongrupo as responsable on folios.idcatrespongrupo = responsable.idcatrespongrupo
                left join catrevisores as revisor on folios.idcatrevisores = revisor.idcatrevisores
                left join catinstructores as instructor on folios.idcatinstructores = instructor.idcatinstructores
                where folios.folio =$no_folio";
                $get_folio->set_informacion("insert into bitacceso values (DEFAULT,'$username',NOW(),NOW(),'CONSULTA FOLIO $no_folio','$sql')");
            }
            
        
        //decodificacion del JSON
        echo json_encode($data);
       
?>