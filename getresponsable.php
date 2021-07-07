<?php
    include ("sqlmetodos.php");
    $noempleado_resp = $_POST['claverespongrupo'];

    $get_responsable = new Consultainfo();
        $responsable = $get_responsable->get_informacion("select responsable.idcatrespongrupo,sector.sectornombre as sector, responsable.noempleado, grados.nombre as grado, 
            elemento.nombre
            from catrespongrupo as responsable
            inner join personal as elemento on responsable.noempleado = elemento.noempleado
            inner join catniveles as grados on elemento.idcatgrados = grados.idcatgrados
            inner join catsector as sector on elemento.idcatsector = sector.idcatsector
            where responsable.noempleado = '$noempleado_resp'");
        foreach($responsable as $detresponsable);

        echo json_encode($detresponsable);
?>