/*****************************************PARA PANTALLA DE CAPTURA ***************************************/
/*************************************************INICIO**************************************************/
/*********************************************************************************************************/

/*Con esta función habilito todos los Tool Tip de cada pantalla*/
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
        //$('[data-toggle="tooltip"]').html("<div style='background-color: red;'></div>");
});

$(document).ready(function() {
    $("#bus-noempleado").focus();
    $("#bus-nofolio").focus();
    $("#claverespongrupo").focus();

    /*eventos de la pantalla captura.php*/
    $("#modal-consulta-elemento").on('hidden.bs.modal', function() {
        location.reload();
        $("#bus-noempleado").focus();
    });
    $("#modal-elemento-existe").on('hidden.bs.modal', function() {
        $("#bus-noempleado").focus();
    });
    $("#modal-guardado-exitoso").on('hidden.bs.modal', function() {
        window.location = "captura";
        $("#bus-noempleado").focus();
    });
    $("#modal-error-foto").on('hidden.bs.modal', function() {
        $("#bus-noempleado").focus();
    });
    $("#modal-folio-pdf").on('hidden.bs.modal', function() {
        $("#modal-folio-pdf").modal("hide");
        $("#modal-folio").modal("hide");
        $("#bus-nofolio").val("");
        $("#bus-nofolio").focus();
    });

});
/*Detectar teclas escuchadores de eventos de teclado*/
$("#bus-noempleado").keypress(function(e) {
    if (e.which == 13) {
        consultaPersonal();
    }
});

$("#noempleado2").keypress(function(e) {
    if (e.which == 13) {
        existeelemento();
    }
});

$("#bus-nofolio").on('keypress', function(e) {
    if (e.which == 13) {
        consultaFolio();
        $("#bus-nofolio").val("")
    }
});

$("#claverespongrupo").on('keypress', function(e) {
    if (e.which == 13) {
        busca_responsable();
        $("#claverespongrupo").val("")
    }
});

$("#modal-error-foto").keypress(function(e) {
        if (e.which == 13) {
            $("#modal-error-foto").modal("hide");
        }
    })
    /*$("#bus-nofolio").keypress(function(e) {
        if (e.which == 13) {
            consultaFolio();
        }
    });*/


/*Escuchadores de teclado para modales*/
/* OBJETO captura.php */

$("#modal-guardado-exitoso").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-guardado-exitoso").modal("hide");
    }
});

$("#modal-consulta-elemento").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-consulta-elemento").modal("hide");
    }
});

$("#modal-elemento-existe").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-elemento-existe").modal("hide");
    }
});

$("#modal-folio-actualizado").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-folio-actualizado").modal("hide");
        window.location = "listadofolios.php";
    }
});

$("#modal-folio-pdf").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-folio-pdf").modal("hide");
        $("#modal-folio").modal("hide");
        $("#bus-nofolio").val("");
        $("#bus-nofolio").focus();
    }
});

$("#modal-folio").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-folio").modal("hide");
        $("#bus-nofolio").val("");
        $("#bus-nofolio").focus();
    }
});

$("#modal-resonsable").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-resonsable").modal("hide");
        $("#claverespongrupo").focus();
    }
});

$("#modal-folio-exitoso").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-folio-exitoso").modal("hide");
        location.reload();
        $("#claverespongrupo").focus();
    }
});

$("#modal-reponsable-error").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-reponsable-error").modal("hide");
        $("#claverespongrupo").focus();
    }
});

$("#modal-folio-error").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-folio-error").modal("hide");
        $("#claverespongrupo").focus();
    }
});

function cancelarPantallaPrincipal() {
    window.location = "principal.php";
}

function guardaelemento() {
    //asignación de los valores de la pantalla captura
    var grado = $("#grado").val();
    var nombre = $("#nombre").val();
    var placaelemento = $("#noempleado2").val();
    var sector = $("#sector").val();
    var arma = $("#arma").val();
    var situacion = $("#situacion").val();
    var observaciones = $("#observaciones").val();
    var fotoNombre = $("#foto").val().replace(/C:\\fakepath\\/, '');
    var datos = {
        "grado": grado,
        "nombre": nombre,
        "placa": placaelemento,
        "sector": sector,
        "arma": arma,
        "situacion": situacion,
        "observaciones": observaciones,
        "foto": fotoNombre,
        "operacion": 1
    };
    var elementoJSON = JSON.stringify(datos);
    $.ajax({
            type: "POST",
            url: "saveNewElement.php",
            dataType: "json",
            data: datos
        })
        .done(function(elementoSave, txtStatus, jqXHR) {
            $("#datoselementoexitoso").html("<strong>GRADO: </strong>" + elementoSave.grado + "<br>" +
                "<strong>NOMBRE: </strong>" + elementoSave.nombre + "<br>" +
                "<strong>NO. EMPLEADO: </strong>" + elementoSave.noempleado + "<br>" +
                "<strong>SECTOR: </strong>" + elementoSave.sector + "<br>" +
                "<strong>TIPO ARMA: </strong>" + elementoSave.arma + "<br>" +
                "<strong>SITUACIóN: </strong>" + elementoSave.situacion + "<br>" +
                "<strong>OBSERVACIONES: </strong>" + elementoSave.observaciones + "<br>" +
                "<strong>FOTO: </strong>" + elementoSave.foto);
            $("#modal-guardado-exitoso").modal("show");
            $("#grado").val("");
            $("#nombre").val("");
            $("#noempleado2").val("");
            $("#noempleado2").css({ "border-color": "" });
            $("#sector").val("");
            $("#arma").val("");
            $("#situacion").val("");
            $("#observaciones").val("");
            $("#foto").val("");
            $("#descripcionvistaprevia").html("<h4> <strong> VISTA PREVIA (digital). </strong></h4>");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#error-modal").html("<i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp;ERROR AL GUARDAR&nbsp;&nbsp;&nbsp;<i class='fas fa-exclamation-triangle'></i>");
            $("#txtErrorFoto").html("<h4> Ha ocurrido un problema en el servidor. No se puede guardar el registro.</h4>");
            $("#modal-error-foto").modal("show");
        });

}

function consultaPersonal() {
    var placaelemento = $("#bus-noempleado").val();
    if (placaelemento == "") {
        $("#alerta-elemento-existe").html("<i class='fas fa-exclamation-triangle'>" +
            "</i>&nbsp;&nbsp;&nbsp;<strong>AVISO.</strong>");
        $("#datoselemento").html("<h4> Favor de capturar un n&uacute;mero de empleado, este campo para consulta de personal, no puede estar vac&iacute;o.</h4>");
        $("#modal-elemento-existe").modal("show");
    } else {
        $.ajax({
                type: "GET",
                url: "check-elemento.php",
                dataType: "json",
                data: { noempleado2: placaelemento }
            })
            .done(function(elemento, txtStatus, jqXHR) {
                $("#udp-noempleado").hide();
                $("#udp-noempleado").val(elemento.noempleado);
                $("#bus-noempleado").val("");
                if (elemento.situacion == "DIRECTOR" || elemento.situacion == "director" || elemento.situacion == "Director") {
                    $("#img-jefe").html("<img src='img/director.png' width='180px' height='70px'>");
                }
                if (elemento.situacion == "SUBDIRECTOR" || elemento.situacion == "subdirector" || elemento.situacion == "SubDirector") {
                    $("#img-jefe").html("<img src='img/subdirector.png' width='180px' height='70px'>");
                }
                if (elemento.situacion == "RECLUSORIO" || elemento.situacion == "reclusorio" || elemento.situacion == "Reclusorio") {
                    $("#img-jefe").html("<img src='img/reclusorio.png' width='180px' height='70px'>");
                }
                if (elemento.situacion == "DEFUNCIÓN" || elemento.situacion == "defunción" || elemento.situacion == "Defunción") {
                    $("#img-jefe").html("<img src='img/defuncion.png' width='180px' height='70px'>");
                }
                $("#cabecero-consulta").html("<i class='fas fa-user-tie'></i>&nbsp;&nbsp;&nbsp;<strong>CONSULTA DATOS ELEMENTO.</strong>");
                $("#datos-consulta-elemento").html("<div class='row'><div class='col-md-6'>" +
                    "<strong>GRADO: </strong>" + elemento.grado + "<br>" +
                    "<strong>NOMBRE: </strong>" + elemento.nombre + "<br>" +
                    "<strong>NO. EMPLEADO: </strong>" + elemento.noempleado + "<br>" +
                    "</div>" +
                    "<div class='col-md-6'>" +
                    "<strong>SECTOR: </strong>" + elemento.sector + "<br>" +
                    "<strong>ARMA: </strong>" + elemento.arma + "<br>" +
                    "<strong>SITUACI&Oacute;N: </strong>" + elemento.situacion + "<br>" +
                    "</div></div>" +
                    "<div class='row justify-content-center'><div class='col-md-12'>" +
                    "<strong>OBSERVACIONES: </strong>" + elemento.observaciones + "<br>" +
                    "<a href='#' id='open' onclick='verFotoGrande()'><img class='justify-content-center' id='imgfoto' src='" + elemento.recibo + "' width='720px' height='450px'></a>" +
                    "</div></div>");
                $("#txtFoto").html("<div class='text-center'><img src='" + elemento.recibo + "' width='1100' height='820'></div>");
                $("#modal-consulta-elemento").modal("show");
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                $("#bus-noempleado").val("");
                $("#alerta-elemento-existe").html("<i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp;<strong>ERROR.</strong>");
                $("#datoselemento").html("<h4> No existe el numero de empleado: <strong>" + placaelemento + "</strong>");
                $("#modal-elemento-existe").modal("show");
            });
    }
}
/*Modificar elementos datos*/
function modificaElemento() {
    var noPlaca = $("#udp-noempleado").val();
    window.location = "modifica-elemento?placa=" + noPlaca;
}

/*Mostrar recibo en grande*/
$("#modal-foto-grande").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-foto-grande").modal("hide");
        $("#modal-consulta-elemento").focus();
    }
});

function verFotoGrande() {
    $("#modal-foto-grande").modal("show");

}
/* Funcion para reiniciar elementos*/

function reiniciarElementos() {
    $.ajax({
            type: "POST",
            url: "reset-elementos.php",
            dataType: "json",
            data: { mensaje: "reset" }

        })
        .done(function(msjReset, textStatus, jqXHR) {
            $("#cabecero-modal-exitoso").html("<i class='fas fa-clipboard-check'></i>&nbsp;&nbsp;&nbsp;<strong>RESETEO EXITOSO</strong>");
            $("#datoselementoexitoso").html("<h4>Se ha restaurado el cat&aacute;logo de personal, para una nueva etapa de tiro.");
            $("#modal-guardado-exitoso").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#error-modal").html("<i class='fas fa-exclamation-triangle'></i>&nbsp;&nbsp;&nbsp;ERROR AL RESETEAR&nbsp;&nbsp;&nbsp;<i class='fas fa-exclamation-triangle'></i>");
            $("#txtErrorFoto").html("<h4> Ha ocurrido un problema en el servidor. No se puede restaurar el cat&aacute;logo de personal.</h4>");
            $("#modal-error-foto").modal("show");
        });

}

function subirFoto() {
    var fotoNombre = document.getElementById("foto");
    var file = fotoNombre.files[0];
    var dataFoto = new FormData();
    dataFoto.append('archivoFoto', file);
    //console.log(dataFoto);


    $.ajax({
            type: "POST",
            url: "upload-file.php",
            dataType: "json",
            contentType: false,
            data: dataFoto,
            processData: false,
            cache: false

        })
        .done(function(foto, txtStatus, jqXHR) {
            $("#descripcionvistaprevia").html("<img src='" + foto.ruta + "' class='rounded' height='200' width='335'><br>" +
                "<strong> NOMBRE: </strong>" + foto.nombre + "<br>" +
                "<strong> RUTA: </strong>" + foto.ruta + "<br>");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#txtErrorFoto").html("<h4> Ha ocurrido un problema en el servidor. Comunicarse con el administrador del sistema</h4>");
            $("#modal-error-foto").modal("show");
        });
}
/*funcion para borrar la foto en captura de elemento*/
function borraFoto() {

}

function existeelemento() {
    var placaelemento = $("#noempleado2").val();
    $.ajax({
            type: "GET",
            url: "check-elemento.php",
            dataType: "json",
            data: { noempleado2: placaelemento }
        })
        .done(function(elemento, txtStatus, jqXHR) {
            $("#noempleado2").css({ "border-color": "red" });
            $("#datoselemento").html("<strong>GRADO: </strong>" + elemento.grado + "<br>" +
                "<strong>NOMBRE: </strong>" + elemento.nombre + "<br>" +
                "<strong>NO. EMPLEADO: </strong>" + elemento.noempleado + "<br>" +
                "<strong>SECTOR: </strong>" + elemento.sector);

            $("#modal-elemento-existe").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#noempleado2").css({ "border-color": "green" });
        });

}

/*****************************************PARA PANTALLA DE CAPTURA ***************************************/
/**************************************************FIN****************************************************/
/*********************************************************************************************************/

/***************************************FUNCIONES MODIFICA ELEMENTO **************************************/
/*************************************************INICIO**************************************************/
/*********************************************************************************************************/

function actualizarelemento() {
    var grado = $("#grado").val();
    var nombre = $("#nombre").val();
    var placaelemento = $("#noempleado2").val();
    var sector = $("#sector").val();
    var arma = $("#arma").val();
    var situacion = $("#situacion").val();
    var observaciones = $("#observaciones").val();
    var fotoNombre = $("#foto").val().replace(/C:\\fakepath\\/, '');
    var datos = {
        "grado": grado,
        "nombre": nombre,
        "placa": placaelemento,
        "sector": sector,
        "arma": arma,
        "situacion": situacion,
        "observaciones": observaciones,
        "foto": fotoNombre,
        "operacion": 2
    };
    $.ajax({
            type: "POST",
            url: "saveNewElement.php",
            dataType: "json",
            data: datos
        })
        .done(function(elementoUdp, txtStatus, jqXHR) {
            $("#datoselementoexitoso").html("<h4>" + elementoUdp.mensaje + "</h4>");
            $("#modal-guardado-exitoso").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#txtErrorFoto").html("<h4>No se pudo actualizar de informaci&oacute;n.</h4>");
            $("#modal-error-foto").modal("show");
        });
}

function cancelarRegCaptura() {
    window.location = "captura.php";
}

/***************************************FUNCIONES MODIFICA ELEMENTO **************************************/
/**************************************************FIN****************************************************/
/*********************************************************************************************************/

/*****************************************PARA GENERACION DE FOLIOS***************************************/
/*************************************************INICIO**************************************************/
/*********************************************************************************************************/
function busca_responsable() {
    var placaresponsable = $("#claverespongrupo").val();
    if (placaresponsable == "") {
        $("#noempleado2").css({ "border-color": "red" });
        $("#modal-title-txt").html("¡Error!");
        $("#textoerror").html("<h4> Para seleccionar un responsable de grupo, debe capturar un n&uacutemero de empleado.</h4>");
        $("#modal-reponsable-error").modal("show");
    } else {
        $.ajax({
                type: "POST",
                url: "getresponsable.php",
                dataType: "json",
                data: { claverespongrupo: placaresponsable }

            })
            .done(function(responsable, textStatus, jqXHR) {
                $("#claverespongrupo").val("");
                $("#idrespongrupo").val(responsable.idcatrespongrupo);
                $("#gradorespongrupo").val(responsable.grado);
                $("#nombrerespongrupo").val(responsable.nombre);
                $("#placarespongrupo").val(responsable.noempleado);
                $("#sectorrespongrupo").val(responsable.sector);
                $("#muestraResponsable").html("<div class='container'>" +
                    "<div class='row'><div class='col-md-5'><strong> GRADO: </strong></div><div class='col-md-7'>" + responsable.grado + "</div></div>" +
                    "<div class='row'><div class='col-md-5'><strong> NOMBRE: </strong></div><div class='col-md-7'>" + responsable.nombre + "</div></div>" +
                    "<div class='row'><div class='col-md-5'><strong> NO EMPLEADO: </strong></div><div class='col-md-7'>" + responsable.noempleado + "</div></div>" +
                    "<div class='row'><div class='col-md-5'><strong> SECTOR: </strong></div><div class='col-md-7'>" + responsable.sector + "</div></div></div>");
                $("#modal-resonsable").modal("show");


            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                $("#claverespongrupo").val("");
                $("#textoerror").html("<h4> Este elemento no se encuentra registrado como responsable de grupo, verifique por favor.</h4>");
                $("#modal-reponsable-error").modal("show");
            });
    }

}

function generarfolio() {
    //location.reload(true);
    var responsable = $("#placarespongrupo").val();
    var asistentes = $("#asistentes").val();
    var consumido = $("#consumido").val();
    var casextraviados = $("#casextraviados").val();
    var casentregados = $("#casentregados").val();
    var siluetas = $("#siluetas").val();
    var tpractica = $("#tpractica").val();
    var arma = $("#arma").val();
    var revisor = $("#revisor").val();
    var instructor = $("#instructor").val();
    var observaciones = $("#observaciones").val();

    var datosFolio = {
        "responsable": responsable,
        "asistentes": asistentes,
        "consumido": consumido,
        "casextraviados": casextraviados,
        "casentregados": casentregados,
        "siluetas": siluetas,
        "tpractica": tpractica,
        "arma": arma,
        "revisor": revisor,
        "instructor": instructor,
        "observaciones": observaciones
    };

    var folioJSON = JSON.stringify(datosFolio);

    $("#txt-success-folio").html("<object data='newFolioPDF.php?folio=" + folioJSON + "#zoom=110' type='application/pdf' width='100%' height='600px'></object>");
    $("#modal-folio-exitoso").modal("show");
    //Campos reseteados
    $("#placarespongrupo").val("");
    $("#asistentes").val("");
    $("#consumido").val("");
    $("#casextraviados").val("");
    $("#casentregados").val("");
    $("#siluetas").val("");
    $("#tpractica").val("");
    $("#arma").val("");
    $("#revisor").val("");
    $("#instructor").val("");
    $("#observaciones").val("");
}
/*****************************************PARA GENERACION DE FOLIOS***************************************/
/**************************************************FIN****************************************************/
/*********************************************************************************************************/


/********************************PARA CONSULTA Y MODIFICACIÓN DE FOLIOS***********************************/
/*************************************************INICIO**************************************************/
/*********************************************************************************************************/
function consultaFolio() {
    var txtfolio = $("#bus-nofolio").val();
    $.ajax({
            type: "POST",
            url: "consultafolio.php",
            dataType: "json",
            data: { nofolio: txtfolio }

        })
        .done(function(folio, textStatus, jqXHR) {
            //console.log("La solicitud ha sido exitosa" + data +" " + textStatus + " " + jqXHR);
            //var folio = JSON.parse(data);
            //console.log(data.campotiro);
            $("#udp-folio").hide();
            $("#udp-folio").val(folio.folio);
            if (folio.observaciones == "") {
                var observaciones = "SIN NOVEDAD";
            } else {
                var observaciones = folio.observaciones;
            }

            if (folio.itipopractica == "1") {
                var practica = "PROGRAMA ANUAL";
            }
            if (folio.itipopractica == "2") {
                var practica = "EXTRAORDINARIA";
            }
            $("#myModalLabel").html("<i class='fas fa-paste'></i>&nbsp;&nbsp;&nbsp;FOLIO No. FT-" + folio.folio);
            $("#muestraFolio").html("<div class='container'>" +
                "<div class='row'><div class='col-md-5'><strong> TIPO DE PR&Aacute;CTICA: </strong></div><div class='col-md-7'>" + practica + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> CAMPO DE TIRO: </strong></div><div class='col-md-7'>" + folio.campotiro + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> FECHA: </strong></div><div class='col-md-7'>" + folio.fecha + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> SECTOR: </strong></div><div class='col-md-7'>" + folio.sectornombre + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> TIPO ARMAMENTO: </strong></div><div class='col-md-7'>" + folio.tipoarma + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> RESPONSABLE DE GRUPO: </strong></div><div class='col-md-7'>" + folio.responsable.noempleado + " " + folio.responsable.grado + " " + folio.responsable.nombre + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> JEFE DE CAMPO: </strong></div><div class='col-md-7'>" + folio.revisor.noempleado + " " + folio.revisor.grado + " " + folio.revisor.nombre + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> INSTRUCTOR: </strong></div><div class='col-md-7'>" + folio.instructor.noempleado + " " + folio.instructor.grado + " " + folio.instructor.nombre + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> CARTUCHOS CONSUMIDOS: </strong></div><div class='col-md-7'>" + folio.carconsumidos + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> CASQUILLOS ENTREGADOS: </strong></div><div class='col-md-7'>" + folio.casentregados + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> CASQUILLOS EXTRAVIADOS: </strong></div><div class='col-md-7'>" + folio.casextraviados + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> SILUETAS: </strong></div><div class='col-md-7'>" + folio.siluetas + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> ASISTENTES: </strong></div><div class='col-md-7'>" + folio.asistentes + "</div></div>" +
                "<div class='row'><div class='col-md-5'><strong> OBSERVACIONES: </strong></div><div class='col-md-7'>" + observaciones + "</div></div></div>");
            $("#modal-folio").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#textoerror").html("<h4> El n&uacutemero de folio " + txtfolio + " no existe, verifique por favor</h4>");
            $("#modal-folio-error").modal("show");
        });

}

//Botón imprimir
function muestraReporte() {
    //$("#modal-folio-error").modal("hide");
    var folio = $("#udp-folio").val();
    $("#objetopdf").html("<object data='folioPDF?folio=" + folio + "#zoom=110' type='application/pdf' width='100%' height='600px'></object>");
    $("#modal-folio-pdf").modal("show");
}

//Botón modificar
function modificafolio() {
    var numFolio = $("#udp-folio").val();
    window.location = "modificafolio.php?folio=" + numFolio;
    //alert("El valor del folio es: " + numFolio);
}

function backConsultaFolio() {
    window.location = "listadofolios";
}

function actualizaFolio() {
    var folio = $("#txtfolio").val();
    var asistentes = $("#asistentes").val();
    var carconsumido = $("#consumido").val();
    var casextraviados = $("#casextraviados").val();
    var casentregados = $("#casentregados").val();
    var siluetas = $("#siluetas").val();
    var tpractica = $("#tpractica").val();
    var arma = $("#arma").val();
    var respongrupo = $("#respongrupo").val();
    var revisor = $("#revisor").val();
    var instructor = $("#instructor").val();
    var observaciones = $("#observaciones").val();
    var datFolio = {
        "folio": folio,
        "asistentes": asistentes,
        "carconsumido": carconsumido,
        "casextraviados": casextraviados,
        "casentregados": casentregados,
        "siluetas": siluetas,
        "tpractica": tpractica,
        "arma": arma,
        "respongrupo": respongrupo,
        "revisor": revisor,
        "instructor": instructor,
        "observaciones": observaciones
    };
    $.ajax({
            type: "POST",
            url: "udpfolio.php",
            dataType: "json",
            data: datFolio
        })
        .done(function(folioUdp, txtStatus, jqXHR) {
            $("#datosfolio-UDP-exitoso").html("<h4>" + folioUdp.mensaje + " Folio: " + folioUdp.folio + "</h4>");
            $("#modal-folio-actualizado").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            $("#txtErrorFolioUDP").html("<h4>No se puede actualizar la información del Folio: " + folio + ".</h4>");
            $("#modal-error-folioUDP").modal("show");
        });

}

/********************************PARA CONSULTA Y MODIFICIÓN DE FOLIOS*************************************/
/*************************************************FIN*****************************************************/
/*********************************************************************************************************/

$("#liga-directa").click(function() {
    window.location = "captura";
});

/********** CORREO DE CONTACTO *****************/
function enviaMail() {

}

/******************BORRAR CONSOLA ***********/

/*window.addEventListener("load", function() {
    console.clear();
});*/

/***************** DETECTA EL CIERRE DE MI NAVEGADOR ***********/

/*window.addEventListener("beforeunload", function(e) {
    var confirmationMessage = "\o/";

    (e || window.event).returnValue = confirmationMessage; //Gecko + IE
    return confirmationMessage; //Webkit, Safari, Chrome
});*/