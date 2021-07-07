<?php
    $datosFotos = array();

    $repositorio ="foto/";
    $nombreFoto      = $_FILES["archivoFoto"]["name"];
    $nombreFotoTmp   = $_FILES["archivoFoto"]["tmp_name"];

    $rutaFoto=$repositorio.$nombreFoto;
    
    $datosFotos["nombre"]   = $nombreFoto;
    $datosFotos["ruta"]     = $rutaFoto;
    $datosFotos["temporal"] = $nombreFotoTmp;

    move_uploaded_file( $datosFotos["temporal"],$datosFotos["ruta"]);

    echo json_encode($datosFotos);

?>
