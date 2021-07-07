<?php
    include ("sqlmetodos.php");
    include ('fpdf/fpdf.php');
    session_start();
    if (empty($_SESSION["username"]) || $_SESSION["useractivado"]>1){
        echo "<script> alert('Debe de iniciar sesi\u00F3n, verifique con el administrador del sistema.');</script>";
        header("location:index?nologin=false");
      }

    //Recuperación del folio
    $no_folio = $_GET["folio"];
    
    /*SQL querys de consulta de información*/
        $get_folio = new Consultainfo();
        $folio = $get_folio->get_informacion("select folios.idcatfolios, folios.folio, folios.campotiro, folios.fecha ,sector.sectornombre, armas.tipoarma, armas.calibre as calibre,
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
        if(! empty($detfolio["folio"])){
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
            $get_folio->set_informacion("insert into bitacceso values (DEFAULT,'$_SESSION[username]',NOW(),NOW(),'IMPRESIÓN DEL FOLIO No. $no_folio','$sql')");
        }

        //construccion del responsable
        $get_responsable = new Consultainfo();
        $responsable = $get_responsable->get_informacion("select responsable.idcatrespongrupo, 
            sector.sectornombre,responsable.noempleado, grados.nombre as grado, elemento.nombre 
            from catrespongrupo as responsable
            inner join personal as elemento on responsable.noempleado = elemento.noempleado
            inner join catgrados as grados on elemento.idcatgrados = grados.idcatgrados
            inner join catsector as sector on elemento.idcatsector = sector.idcatsector
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
    


        //Extracción de la fecha ya que viene concatenada
		$fecha = $detfolio['fecha'];
		$fechadia = substr($fecha,0,2);
		$fechames = substr($fecha,3,-5);
		$fechaano = substr($fecha,-4,4);
        /*Inicio de reporte*/
        $pdf=new FPDF('P','mm','Letter');
        $pdf->Open();
        $pdf->AddPage();
        $pdf->SetMargins(20,20,20);
        //Logo Ciudad de México
        //$pdf->Image('img/logcdmx.jpg',17,16,57,18,'JPG');
        $pdf->Image('img/logcdmx.jpg',17,13,57,25,'JPG');
        //Cuadro clasificador
        $pdf->SetFont('Times','B',8);
        $pdf->Text(77,21,utf8_decode('Secretaría de Seguridad Pública'));
        $pdf->Text(77,25,utf8_decode('Subsecretaría de Operación Policial'));
        $pdf->Text(77,29,utf8_decode('Dir. Ejec. de Logística y Seguimiento Operativo'));
        $pdf->Text(77,33,utf8_decode('Dirección de Armamento'));
        //Cuadro de Fecha
        $pdf->SetFont('Arial','B',11);
        $pdf->Text(140,29,utf8_decode('FECHA'));
        $pdf->SetLineWidth(0.4);
        $pdf->Line(156,19,206,19);
        $pdf->Line(156,24,206,24);
        $pdf->Line(156,29,206,29);
        $pdf->Line(156,19,156,29);
        $pdf->Line(167,19,167,29);
        $pdf->Line(190,19,190,29);
        $pdf->Line(206,19,206,29);
        $pdf->SetFont('Arial','',11);
        $pdf->Text(158,23,utf8_decode('DÍA'));
        $pdf->SetXY(156,24);
        $pdf->Cell(11,5,utf8_decode($fechadia),1,1,'C');
        $pdf->Text(174,23,utf8_decode('MES'));
        $pdf->SetXY(167,24);
        $pdf->Cell(23,5,utf8_decode($fechames),1,1,'C');
        $pdf->Text(193,23,utf8_decode('AÑO'));
        $pdf->SetXY(190,24);
        $pdf->Cell(16,5,utf8_decode($fechaano),1,1,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Text(193,18,utf8_decode('DAR-04'));
    //Numero de Folio del Reporte
        $pdf->SetFont('Arial','B',11);
        $pdf->Text(139,34,utf8_decode('FOLIO No. FT20 - '. $detfolio['folio']));
    //Encabezado Negro
        $pdf->SetLineWidth(0.7);
        $pdf->Line(15,36,210,36);
        $pdf->SetFont('Arial','B',16);
        $pdf->Text(60,41,utf8_decode('RECIBO DE CONSUMO DE CARTUCHOS'));
        $pdf->SetLineWidth(0.7);
        $pdf->Line(15,42,210,42);
        $pdf->SetFont('Arial','',7);
        $pdf->Text(15,46,utf8_decode('ESTE RECIBO JUSTIFICA EL CONSUMO DE CARTUCHOS POR ÁREA, CUALQUIER ALTERACIÓN SERÁ SANCIONADA CONFORME A LAS LEYES CORRESPONDIENTES'));
        $pdf->SetLineWidth(0.2);
        $pdf->Line(15,48,210,48);
        $pdf->SetLineWidth(0.2);
        $pdf->Line(15,53,210,53);
        $pdf->SetFont('Arial','B',8.5);
        $pdf->Text(29,51.5,utf8_decode('TIPO DE PRÁCTICA'));
        $pdf->Text(127,51.5,utf8_decode('CAMPO DE TIRO'));
        $pdf->SetFont('Arial','B',8);
        //$pdf->Text(16,57,utf8_decode('PROGRAMA ANUAL'));
        //$pdf->Text(46,57,utf8_decode('EXTRAORDINARIA'));
       
        if($detfolio['itipopractica'] == 1){
                $pdf->SetFillColor(156,156,156);
                $pdf->SetXY(15,53);
                $pdf->Cell(30,6,utf8_decode('PROGRAMA ANUAL'),0,0,'C',True);
                $pdf->SetXY(44,53);
                $pdf->Cell(30,6,utf8_decode('EXTRAORDINARIA'),0,0,'C');
            }
            else
            {
                $pdf->SetFillColor(156,156,156);
                $pdf->SetXY(15,53);
                $pdf->Cell(30,6,utf8_decode('PROGRAMA ANUAL'),0,0,'C');
                $pdf->SetXY(45,53);
                $pdf->Cell(28,6,utf8_decode('EXTRAORDINARIA'),0,0,'C',True);
            }
        $pdf->Line(15,59,210,59);
        $pdf->Line(45,53,45,59);
        $pdf->Line(73,48,73,59);
        //Campo de Tiro
        $pdf->SetFont('Arial','B',16);
        $pdf->Text(116,58,utf8_decode('FUERZA DE TAREA'));
        $pdf->SetFont('Arial','B',8);
        $pdf->Text(16,62.5,utf8_decode('ÁREA'));
        $pdf->Text(178,62.5,utf8_decode('No. DE ASISTENTES'));
        $pdf->Line(15,70,210,70);
        $pdf->Line(176,59,176,70);
        $pdf->Line(15,81,210,81);
        $pdf->Line(55,70,55,92);
        $pdf->SetFont('Arial','B',8);
        $pdf->Text(21,73,utf8_decode('No DE EMPLEADO'));
        $pdf->Text(107,73,utf8_decode('RESPONSABLE DEL GRUPO'));
        $pdf->Line(15,92,210,92);
        $pdf->Line(81,81,81,92);
        $pdf->Line(125,81,125,92);
        $pdf->Line(169,81,169,92);
        $pdf->Text(21,84,utf8_decode('TIPO DE ARMA'));
        $pdf->Text(56,84,utf8_decode('CALIBRE'));
        $pdf->Text(83,84,utf8_decode('CARTUCHOS CONSUMIDOS'));
        $pdf->Text(126,84,utf8_decode('CASQUILLOS ENTREGADOS'));
        $pdf->Text(170,84,utf8_decode('CASQUILLOS EXTRAVIADOS'));
        $pdf->Line(15,103,210,103);
        $pdf->Text(21,95,utf8_decode('No DE SILUETAS'));
        $pdf->Text(83,95,utf8_decode('OBSERVACIONES:'));
        $pdf->Line(15,131,210,131);
        $pdf->Line(80,103,80,131);
        $pdf->Line(150,103,150,131);
        $pdf->Text(39,106,utf8_decode('REVISO'));
        $pdf->Text(34,130,utf8_decode('JEFE DE CAMPO'));
        $pdf->Text(108,106,utf8_decode('CONFORME'));
        $pdf->Text(98,130,utf8_decode('RESPONSABLE DEL GRUPO'));
        $pdf->Text(173,106,utf8_decode('CAPACITO'));
        $pdf->Text(167,130,utf8_decode('INSTRUCTOR DE TIRO'));
        //Espacio del Firmante del Jefe de Campo
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(15,107);
        $pdf->Cell(65,5,utf8_decode($detrevisor['grado']." ".$detrevisor['noempleado']),0,1,'C');
        $pdf->SetXY(15,123);
        $pdf->Cell(65,5,utf8_decode($detrevisor['nombre']),0,1,'C');
        //Espacio del Firmante del Responsable de Grupo
        $pdf->SetXY(80,107);
        $pdf->Cell(70,5,utf8_decode($detresponsable['grado']." ".$detresponsable['noempleado']),0,1,'C');
        $pdf->SetXY(80,123);
        $pdf->Cell(70,5,utf8_decode($detresponsable['nombre']),0,1,'C');
        //Espacio del Firmante del Instructor
        $pdf->SetXY(150,107);
        $pdf->Cell(60,5,utf8_decode($detinstructor['grado']." ".$detinstructor['noempleado']),0,1,'C');
        $pdf->SetXY(150,123);
        $pdf->Cell(60,5,utf8_decode($detinstructor['nombre']),0,1,'C');
        //Número de Asistentes
        $pdf->SetFont('Arial','',11);
        $pdf->SetXY(176,63);
        $pdf->Cell(34,7,utf8_decode( $detfolio['asistentes']),0,1,'C');
        //Muestra tipo de arma
        $pdf->SetFont('Arial','',9);
        $pdf->SetXY(15,85);
        $pdf->Cell(40,7,utf8_decode( $detfolio['tipoarma']),0,1,'C');
        $pdf->SetXY(55,85);
        $pdf->Cell(26,7,utf8_decode($detfolio['calibre']),0,1,'C');
        //Cartuchos Consumidos
        $pdf->SetFont('Arial','',11);
        $pdf->SetXY(81,86);
        $pdf->Cell(44,5,utf8_decode($detfolio['carconsumidos']),0,1,'C');
        //Casquillos entregados
        $pdf->SetXY(125,86);
        $pdf->Cell(44,5,utf8_decode($detfolio['casentregados']),0,1,'C');
        //Casquillos extraviados
        $pdf->SetXY(169,86);
        $pdf->Cell(41,5,utf8_decode($detfolio['casextraviados']),0,1,'C');
        //Numero de Siluetas
        $pdf->SetXY(15,97);
        $pdf->Cell(41,5,utf8_decode( $detfolio['siluetas']),0,1,'C');
        //Casquillos observaciones
        $pdf->SetFont('Arial','',7.4);
        $pdf->SetXY(55,97);
        if($detfolio['observaciones'] == ""){
            $pdf->Cell(155,5,utf8_decode("SIN NOVEDAD"),0,1,'C');
        }else{
            $pdf->Cell(155,5,utf8_decode( $detfolio['observaciones']),0,1,'C');
        }    
        //Area
        $pdf->SetFont('Arial','',11);
        $pdf->Text(75,66,utf8_decode($detresponsable['sectornombre']));
        //No Empleado del Folio
        $pdf->SetFont('Arial','',11);
        $pdf->Text(23,78,utf8_decode($detresponsable['noempleado']));
        //Nombre del Responsable para el Folio
        $pdf->SetFont('Arial','',11);
        $pdf->SetXY(55,74);
        $pdf->Cell(155,7,utf8_decode($detresponsable['nombre']),0,1,'C');
        $pdf->Output('reporte','I');
    
?>