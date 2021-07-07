<?php
    include ("sqlmetodos.php");
    $fecha = Date('Y-m-d');
    echo "La fecha es: ".$fecha."<br>";

    $obj = new Consultainfo();

    $total = $obj->duplicados_registros("select * from polasistencia where dfecha = '2020-03-28'");

    echo "La cantidad de registros es: ". $total;


?>