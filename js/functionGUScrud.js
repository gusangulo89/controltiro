/********** CONSTRUCCION DEL DATA TABLE ***************/
/******************************************************/
$(document).ready(function() {
    $("#tableInstructores").DataTable({ "destroy": true });
});



/******* FUNCIONES DE CATALAGO DE SECTORES ************/
/******************************************************/
$("#modal-add-sector").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-add-sector").modal("hide");
        location.reload();
    }
});

$("#modal-del-sector").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-del-sector").modal("hide");
        //location.reload();
    }
});

/* Funcion que muestra el formulario de agregar */
function agregaSector() {
    $("#sectornombre").val("");
    $("#sectortipo").val("");
    $("#sectorobservaciones").val("");
    $("#modalNuevoSector").modal("show");
}

function guardaSector() {
    var sectornombre = $("#sectornombre").val();
    var sectortipo = $("#sectortipo").val();
    var sectorobservaciones = $("#sectorobservaciones").val();

    var sector = {
        "operacion": 1,
        "id": "",
        "nombre": sectornombre,
        "tipo": sectortipo,
        "observaciones": sectorobservaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaSector.php",
            dataType: "json",
            data: sector
        })
        .done(function(sectorSave, txtStatus, jqXHR) {
            $("#modalNuevoSector").modal("hide");
            $("#txt-add-sector").html("<p>El sector de nombre: " + sectorSave.nombre + ", se guardó satisfatoriamente.</p>");
            $("#modal-add-sector").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede guardar el sector.", "Error");
        });
}

function udpSector() {
    var sectorid = $("#udpsectorid").val();
    var sectornombre = $("#udpsectornombre").val();
    var sectorobservaciones = $("#udpsectorobservaciones").val();

    var sector = {
        "operacion": 2,
        "id": sectorid,
        "nombre": sectornombre,
        "observaciones": sectorobservaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaSector.php",
            dataType: "json",
            data: sector
        })
        .done(function(sectorSave, txtStatus, jqXHR) {
            $("#modal-udp-sector").modal("hide");
            $("#txt-add-sector").html("<p>El proceso es " + sectorSave.msj);
            $("#modal-add-sector").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede borrar el sector.", "Error");
        });
}

function eliminarSector(idsector) {
    var sectornombre = $("#sectornombre").val();
    var sectortipo = $("#sectortipo").val();
    var sectorobservaciones = $("#sectorobservaciones").val();

    var sector = {
        "operacion": 3,
        "id": idsector,
        "nombre": sectornombre,
        "tipo": sectortipo,
        "observaciones": sectorobservaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaSector.php",
            dataType: "json",
            data: sector
        })
        .done(function(sectorSave, txtStatus, jqXHR) {
            $("#txt-del-sector").html("<p>El proceso es " + sectorSave.msj);
            //$("#modal-del-sector").modal("show");
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede borrar el sector.", "Error");
        });
}

function consultaSector(idsector) {

    var sector = {
        "operacion": 4,
        "id": idsector,
        "nombre": "",
        "tipo": "",
        "observaciones": ""
    }

    $.ajax({
            type: "POST",
            url: "procesaSector.php",
            dataType: "json",
            data: sector
        })
        .done(function(sectorSave, txtStatus, jqXHR) {
            $("#udpsectorid").val(sectorSave.idcatsector);
            $("#udpsectornombre").val(sectorSave.sectornombre);
            $("#udpsectortipo").val(sectorSave.sectortipo);
            $("#udpsectorobservaciones").val(sectorSave.sectorobservaciones);
            $("#modal-udp-sector").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede actualizar el sector.", "Error");
        });
}

/***** FUNCIONES DE CATALAGO DE RESPONSABLES **********/
/******************************************************/

$("#respnumempleado").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoResponsable").modal("hide");
        buscaElemento();
    }
});

$("#modal-elemento-encontrado").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-elemento-encontrado").modal("hide");
        guardarResponsable();
    }
});

/*$("#modalNuevoResponsable").on("show.bs.modal", function() {
    $("#respnumempleado").focus();
});*/

function agregaResponsable() {
    $("#respnumempleado").val("");
    $("#respnumempleado").focus();
    $("#modalNuevoResponsable").modal("show");
}

function buscaElemento() {
    var noempleadoelemento = $("#respnumempleado").val();
    var observaciones = "";
    var operacion = 1;
    $.ajax({
            type: "POST",
            url: "procesaResponsable.php",
            dataType: "json",
            data: { numempleado: noempleadoelemento, observaciones: observaciones, operacion: operacion }
        })
        .done(function(elementoSave, txtStatus, jqXHR) {
            $("#modalNuevoResponsable").modal("hide");
            $("#contenido-datos").html("<div class='container'>" +
                "<div class='row'><div class='col-md-4'><strong> GRADO: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='element-grado' value='" + elementoSave.grado + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> NOMBRE: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='element-nombre' value='" + elementoSave.nombre + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> NO EMPLEADO: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='element-noempleado' value='" + elementoSave.noempleado + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> SECTOR: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='element-sector' value='" + elementoSave.sector + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> OBSERVACIONES: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='element-observaciones' ></div></div></div></div>");
            $("#modal-elemento-encontrado").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("Este elemento no se encuentra como responsable de grupo.", "Error");
            $("#noempleadoresponsable").val("");
        });
}

function regBusResponsable() {
    $("#respnumempleado").val("");
    $("#modal-elemento-encontrado").modal("hide");
    $("#modalNuevoResponsable").modal("show");
    $("#respnumempleado").focus();
}

function guardarResponsable() {
    var noempleado = $("#element-noempleado").val();
    var observaciones = $("#element-observaciones").val();
    var operacion = 2;

    $.ajax({
            type: "POST",
            url: "procesaResponsable.php",
            dataType: "json",
            data: { numempleado: noempleado, observaciones: observaciones, operacion: operacion }
        })
        .done(function(elementoSave, txtStatus, jqXHR) {
            $("#modalNuevoResponsable").modal("hide");
            toastr["success"](elementoSave.msj, "Correcto");
            //setTimeout(irFolio(), 3000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("Error no se puede guardar los datos del responsable de grupo, consulte con el administrador del sistema.", "Error");
        });

}

function irFolio() {
    window.location = "registrofolio.php";
}

function recargar() {
    location.reload();
}

function eliminarResponsable(noempleadoresponsable) {
    var responsable = {
        "operacion": 3,
        "numempleado": noempleadoresponsable,
        "observaciones": ""
    };

    $.ajax({
        type: "POST",
        url: "procesaResponsable.php",
        dataType: "json",
        data: responsable
    }).done(function(elementoSave, txtStatus, jqXHR) {
        toastr["success"](elementoSave.msj, "Eliminación correcta");
        setTimeout(recargar(), 5000);

    }).fail(function(jqXHR, textStatus, errorThrown) {
        toastr["error"]("No se puede eliminar el responsable de grupo, consulte con el administrador del sistema.", "Error");
    });
}

/***** FUNCIONES DE CATALAGO DE ARMAS **********/
/******************************************************/
$("#modalNuevaArma").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevaArma").modal("hide");
        guardarArma();
    }
});

$("#modal-udp-arma").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-udp-arma").modal("hide");
        udpArma();
    }
});

function registrarNuevaArma() {
    $("#modalNuevaArma").modal("show");
}

function guardarArma() {
    var tipoarma = $("#tipoarma").val();
    var calibre = $("#calibre").val();
    var observaciones = $("#observaciones").val();
    var operacion = 1;

    $.ajax({
            type: "POST",
            url: "procesaArma.php",
            dataType: "json",
            data: { tipoarma: tipoarma, calibre: calibre, observaciones: observaciones, operacion: operacion, id: "" }
        })
        .done(function(armaSave, txtStatus, jqXHR) {
            $("#modalNuevaArma").modal("hide");
            toastr["success"](armaSave.msj, "Proceso correcto.");
            setTimeout(recargar(), 3000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se pudo guardar el registro, contacte al administrador.", "Error");
        });
}

function consultaArma(idarma) {
    var arma = {
        "operacion": 4,
        "id": idarma,
        "tipoarma": "",
        "calibre": "",
        "observaciones": ""
    }

    $.ajax({
            type: "POST",
            url: "procesaArma.php",
            dataType: "json",
            data: arma
        })
        .done(function(armaSave, txtStatus, jqXHR) {
            $("#udparmaid").val(armaSave.idcatarmas);
            $("#udptipoarma").val(armaSave.tipoarma);
            $("#udpcalibre").val(armaSave.calibre);
            $("#udpobservaciones").val(armaSave.observaciones);
            $("#modal-udp-arma").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede actualizar el sector.", "Error");
        });

}

function udpArma() {
    var armaid = $("#udparmaid").val()
    var tipoarma = $("#udptipoarma").val();
    var calibre = $("#udpcalibre").val();
    var observaciones = $("#udpobservaciones").val();

    var arma = {
        "operacion": 2,
        "id": armaid,
        "tipoarma": tipoarma,
        "calibre": calibre,
        "observaciones": observaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaArma.php",
            dataType: "json",
            data: arma
        })
        .done(function(armaSave, txtStatus, jqXHR) {
            $("#modal-udp-sector").modal("hide");
            toastr["success"](armaSave.msj, "Proceso correcto.");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede actualizar los datos del arma, consulte al administrador.", "Error");
        });
}

function eliminarArma(idarma) {
    var tipoarma = $("#udptipoarma").val();
    var calibre = $("#udpcalibre").val();
    var observaciones = $("#udpobservaciones").val();

    var arma = {
        "operacion": 3,
        "id": idarma,
        "tipoarma": tipoarma,
        "calibre": calibre,
        "observaciones": observaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaArma.php",
            dataType: "json",
            data: arma
        })
        .done(function(armaSave, txtStatus, jqXHR) {
            $("#modal-udp-sector").modal("hide");
            toastr["success"](armaSave.msj, "Registro eliminado.");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede eliminar los datos del arma, consulte al administrador.", "Error");
        });
}

/***** FUNCIONES DE CATALAGO DE INSTRUCTORES **********/
/******************************************************/
$("#modalNuevoInstructor").on('shown.bs.modal', function() {
    $("#numeroempleado-instructor").focus();
});

$("#modal-instructor-encontrado").on('shown.bs.modal', function() {
    $("#instructor-observaciones").focus();
});

function agregaInstructor() {
    $("#numeroempleado-instructor").val("");
    $("#modalNuevoInstructor").modal("show");
}

function buscaInstructor() {
    $("#modalNuevoInstructor").modal("hide");
    var idInstructor = 0;
    var noempleado = $("#numeroempleado-instructor").val();
    var observaciones = "";
    var operacion = 1;
    $.ajax({
            type: "POST",
            url: "procesaInstructor.php",
            dataType: "json",
            data: { idInstructor: idInstructor, numempleado: noempleado, observaciones: observaciones, operacion: operacion }
        })
        .done(function(instructorDatos, txtStatus, jqXHR) {
            $("#modalNuevoResponsable").modal("hide");
            $("#contenido-datos").html("<div class='container'>" +
                "<div class='row'><div class='col-md-4'><strong> GRADO: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='instructor-grado' value='" + instructorDatos.grado + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> NOMBRE: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='instructor-nombre' value='" + instructorDatos.nombre + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> NO EMPLEADO: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='instructor-noempleado' value='" + instructorDatos.noempleado + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> SECTOR: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='instructor-sector' value='" + instructorDatos.sector + "' readonly></div></div></div>" +
                "<div class='row'><div class='col-md-4'><strong> OBSERVACIONES: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='instructor-observaciones' ></div></div></div></div>");
            $("#modal-instructor-encontrado").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("Este elemento no se encuentra como instructor de tiro.", "Error");
            $("#noempleadoresponsable").val("");
        });
}

function regBusInstructor() {
    $("#numeroempleado-instructor").val("");
    $("#modal-instructor-encontrado").modal("hide");
    $("#modalNuevoInstructor").modal("show");
    $("#numeroempleado").focus();
}

function guardarInstructor() {
    var idInstructor = 0;
    var noempleado = $("#instructor-noempleado").val();
    var observaciones = $("#instructor-observaciones").val();
    var operacion = 2;

    $.ajax({
            type: "POST",
            url: "procesaInstructor.php",
            dataType: "json",
            data: { idInstructor: idInstructor, numempleado: noempleado, observaciones: observaciones, operacion: operacion }
        })
        .done(function(registroSave, txtStatus, jqXHR) {
            $("#modalNuevoInstructor").modal("hide");
            toastr["success"](registroSave.msj, "Correcto");
            setTimeout(recargar(), 5000);
            //abla.DataTable();
            //var tablaIns = $("#tableInstructores").DataTable();
            //tablaIns.ajax.reload(null, false);
            //$("#tableInstructores").DataTable({ destroy: true });
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("Este elemento no se encuentra dado de alta en el cat\u00E1logo de personal.", "Error");
        });

}

function eliminarInstructor(idInstructor) {
    var instructor = {
        "idInstructor": idInstructor,
        "numempleado": "",
        "observaciones": "",
        "operacion": 3
    }

    $.ajax({
            type: "POST",
            url: "procesaInstructor.php",
            dataType: "json",
            data: instructor
        })
        .done(function(instructorSave, txtStatus, jqXHR) {
            $("#modal-udp-sector").modal("hide");
            toastr["success"](instructorSave.msj, "Registro eliminado.");
            setTimeout(recargar(), 5000);
            //abla.DataTable();
            //var tablaIns = $("#tableInstructores").DataTable();
            //tablaIns.ajax.reload(null, false);
            //$("#tableInstructores").DataTable({ destroy: true });
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede eliminar los datos del Instructor de tiro, consulte al administrador.", "Error");
        });
}

$("#modalNuevoInstructor").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoInstructor").modal("hide");
        buscaInstructor();
    }
});

$("#modal-instructor-encontrado").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-instructor-encontrado").modal("hide");
        guardarInstructor();
    }
});

/**** FUNCIONES DE CATALAGO DE JEFES DE CAMPO *********/
/******************************************************/

$("#modalNuevoJefeCampo").on('shown.bs.modal', function() {
    $("#numeroempleado-jefecampo").focus();
});

$("#modal-jefe-encontrado").on('shown.bs.modal', function() {
    $("#jefeCampo-observaciones").focus();
});

function agregaJefeCampo() {
    $("#numeroempleado-jefecampo").val("");
    $("#modalNuevoJefeCampo").modal("show");
}

function buscaJefeCampo() {
    $("#modalNuevoJefeCampo").modal("hide");
    var idJefeCampo = 0;
    var noempleado = $("#numeroempleado-jefecampo").val();
    var observaciones = "";
    var operacion = 1;

    if (noempleado == "") {
        toastr["error"]("El campo No. Empleado, no puede estar vacío.", "Error");
    } else {
        $.ajax({
                type: "POST",
                url: "procesaJefeCampo.php",
                dataType: "json",
                data: { idJefeCampo: idJefeCampo, numempleado: noempleado, observaciones: observaciones, operacion: operacion }
            })
            .done(function(jefeCampoDatos, txtStatus, jqXHR) {
                $("#modalNuevoJefeCampo").modal("hide");
                $("#contenido-datos").html("<div class='container'>" +
                    "<div class='row'><div class='col-md-4'><strong> GRADO: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='jefeCampo-grado' value='" + jefeCampoDatos.grado + "' readonly></div></div></div>" +
                    "<div class='row'><div class='col-md-4'><strong> NOMBRE: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='jefeCampo-nombre' value='" + jefeCampoDatos.nombre + "' readonly></div></div></div>" +
                    "<div class='row'><div class='col-md-4'><strong> NO EMPLEADO: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='jefeCampo-noempleado' value='" + jefeCampoDatos.noempleado + "' readonly></div></div></div>" +
                    "<div class='row'><div class='col-md-4'><strong> SECTOR: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='jefeCampo-sector' value='" + jefeCampoDatos.sector + "' readonly></div></div></div>" +
                    "<div class='row'><div class='col-md-4'><strong> OBSERVACIONES: </strong></div><div class='col-md-8'><div class='form-group'><input type='text' class='form-control' id='jefeCampo-observaciones' ></div></div></div></div>");
                $("#modal-jefe-encontrado").modal("show");

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                toastr["error"]("Este elemento no se encuentra como instructor de tiro.", "Error");
                $("#noempleadoresponsable").val("");
            });
    }
}

function regBusJefeCampo() {
    $("#numeroempleado-jefecampo").val("");
    $("#modal-jefe-encontrado").modal("hide");
    $("#modalNuevoJefeCampo").modal("show");
    $("#numeroempleado-jefecampo").focus();
}

function guardarJefeCampo() {
    var idJefeCampo = 0;
    var noempleado = $("#jefeCampo-noempleado").val();
    var observaciones = $("#jefeCampo-observaciones").val();
    var operacion = 2;

    $.ajax({
            type: "POST",
            url: "procesaJefeCampo.php",
            dataType: "json",
            data: { idJefeCampo: idJefeCampo, numempleado: noempleado, observaciones: observaciones, operacion: operacion }
        })
        .done(function(registroSave, txtStatus, jqXHR) {
            $("#modalNuevoJefeCampo").modal("hide");
            toastr["success"](registroSave.msj, "Correcto");
            setTimeout(recargar(), 5000);
            //abla.DataTable();
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("Este elemento no se encuentra dado de alta en el cat\u00E1logo de personal.", "Error");
        });
}

function eliminarJefeCampo(idJefeCampo) {
    var jefeCampo = {
        "idJefeCampo": idJefeCampo,
        "numempleado": "",
        "observaciones": "",
        "operacion": 3
    }

    $.ajax({
            type: "POST",
            url: "procesaJefeCampo.php",
            dataType: "json",
            data: jefeCampo
        })
        .done(function(registroSave, txtStatus, jqXHR) {
            $("#modal-udp-sector").modal("hide");
            toastr["success"](registroSave.msj, "Registro eliminado.");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede eliminar los datos del Instructor de tiro, consulte al administrador.", "Error");
        });
}

$("#modalNuevoJefeCampo").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoJefeCampo").modal("hide");
        buscaJefeCampo();
    }
});

$("#modal-jefe-encontrado").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-jefe-encontrado").modal("hide");
        guardarJefeCampo();
    }
});

/****** FUNCIONES DE CATALAGO DE SITUACIONES **********/
/******************************************************/

function agregarSituacion() {
    $("#situacion").val("");
    $("#observaciones").val("");
    $("#modalNuevoSituacion").modal("show");
}

function guardarSituacion() {
    var dessituacion = $("#situacion").val();
    var observaciones = $("#observaciones").val();

    var situacion = {
        "operacion": 1,
        "id": "",
        "dessituacion": dessituacion,
        "observaciones": observaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaSituacion.php",
            dataType: "json",
            data: situacion
        })
        .done(function(situcionSave, txtStatus, jqXHR) {
            $("#modalNuevoSituacion").modal("hide");
            toastr["success"](situcionSave.msj, "Correcto");
            setTimeout(recargar(), 5000);


        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se pueden guardar los datos de la situación, consulte con el administrador del sistema.", "Error");
        });
}

function udpSituacion() {
    var idsituacion = $("#udpsituacionid").val();
    var dessituacion = $("#udpdessituacion").val();
    var observaciones = $("#udpobservaciones").val();

    var situacion = {
        "operacion": 2, //operacion de actualizacion de datos
        "id": idsituacion,
        "dessituacion": dessituacion,
        "observaciones": observaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaSituacion.php",
            dataType: "json",
            data: situacion
        })
        .done(function(situacionSave, txtStatus, jqXHR) {
            $("#modalNuevoSituacion").modal("hide");
            toastr["success"](situacionSave.msj, "Correcto");
            setTimeout(recargar(), 5000);


        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede actualizar los datos de la situación, consulte con el administrador del sistema.", "Error");
        });
}

function consultaSituacion(idsituacion) {

    var situacion = {
        "operacion": 4,
        "id": idsituacion,
        "dessituacion": "",
        "observaciones": ""
    }

    $.ajax({
            type: "POST",
            url: "procesaSituacion.php",
            dataType: "json",
            data: situacion
        })
        .done(function(situacionRespuesta, txtStatus, jqXHR) {
            $("#udpsituacionid").val(situacionRespuesta.idcatsituacion);
            $("#udpdessituacion").val(situacionRespuesta.situacion);
            $("#udpobservaciones").val(situacionRespuesta.observaciones);
            $("#modal-udp-situacion").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede consultar la información de este registro.", "Error");
        });
}

function eliminarSituacion(idsituacion) {
    var situacion = {
        "operacion": 3,
        "id": idsituacion,
        "dessituacion": "",
        "observaciones": ""
    }

    $.ajax({
            type: "POST",
            url: "procesaSituacion.php",
            dataType: "json",
            data: situacion
        })
        .done(function(situacionRespuesta, txtStatus, jqXHR) {
            toastr["success"](situacionRespuesta.msj, "Correcto");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede borrar este registro.", "Error");
        });
}

$("#modal-udp-situacion").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-udp-situacion").modal("hide");
        udpSituacion();
    }
});

$("#modalNuevoSituacion").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoSituacion").modal("hide");
        guardarSituacion();
    }
});

/******** FUNCIONES  DE CATALAGO DE GRADOS ************/
/******************************************************/

function agregarGrado() {
    $("#grado").val("");
    $("#observaciones").val("");
    $("#modalNuevoGrado").modal("show");
}

function guardarGrado() {
    var desgrado = $("#grado").val();
    var observaciones = $("#observaciones").val();

    var grado = {
        "operacion": 1,
        "id": "",
        "desgrado": desgrado,
        "observaciones": observaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaGrado.php",
            dataType: "json",
            data: grado
        })
        .done(function(gradoSave, txtStatus, jqXHR) {
            $("#modalNuevoGrado").modal("hide");
            toastr["success"](gradoSave.msj, "Correcto");
            setTimeout(recargar(), 5000);


        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se pueden guardar los datos del grado, consulte con el administrador del sistema.", "Error");
        });
}

function udpGrado() {
    var idgrado = $("#udpgradoid").val();
    var desgrado = $("#udpgrado").val();
    var observaciones = $("#udpobservaciones").val();

    var grado = {
        "operacion": 2, //operacion de actualizacion de datos
        "id": idgrado,
        "desgrado": desgrado,
        "observaciones": observaciones
    }

    $.ajax({
            type: "POST",
            url: "procesaGrado.php",
            dataType: "json",
            data: grado
        })
        .done(function(gradoSave, txtStatus, jqXHR) {
            $("#modalNuevoSituacion").modal("hide");
            toastr["success"](gradoSave.msj, "Correcto");
            setTimeout(recargar(), 5000);


        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede actualizar los datos del grado, consulte con el administrador del sistema.", "Error");
        });
}

function consultaGrado(idgrado) {

    var grado = {
        "operacion": 4,
        "id": idgrado,
        "desgrado": "",
        "observaciones": ""
    }

    $.ajax({
            type: "POST",
            url: "procesaGrado.php",
            dataType: "json",
            data: grado
        })
        .done(function(gradoRespuesta, txtStatus, jqXHR) {
            $("#udpgradoid").val(gradoRespuesta.idcatgrados);
            $("#udpgrado").val(gradoRespuesta.nombre);
            $("#udpobservaciones").val(gradoRespuesta.observaciones);
            $("#modal-udp-grado").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede consultar la información de este registro.", "Error");
        });
}

function eliminarGrado(idgrado) {
    var grado = {
        "operacion": 3,
        "id": idgrado,
        "desgrado": "",
        "observaciones": ""
    }

    $.ajax({
            type: "POST",
            url: "procesaGrado.php",
            dataType: "json",
            data: grado
        })
        .done(function(gradoRespuesta, txtStatus, jqXHR) {
            toastr["success"](gradoRespuesta.msj, "Correcto");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede borrar este registro.", "Error");
        });
}

$("#modal-udp-grado").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-udp-grado").modal("hide");
        udpGrado();
    }
});

$("#modalNuevoGrado").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoGrado").modal("hide");
        guardarGrado();
    }
});

/***** FUNCIONES DE CATALAGO DE INSTRUCTORES **********/
/******************************************************/

function nuevoRol() {
    $("#nombrerol").css({ "border-color": "" });
    $("#nombrerol").css({ "border-width": "" });
    $("#observacionesrol").css({ "border-color": "" });
    $("#observacionesrol").css({ "border-width": "" });
    $("#nombrerol").val("");
    $("#observacionesrol").val("");
    $("#modalNuevoRol").modal("show");
}

function saveRol() {
    var nombrerol = $("#nombrerol").val();
    var observacionesrol = $("#observacionesrol").val();
    var rol = {
        "operacion": 1,
        "id": 0,
        "nombrerol": nombrerol,
        "observacionesrol": observacionesrol
    }

    if (nombrerol == "") {
        toastr["error"]("El campo 'Nombre del perfil de acceso al Sistema', no puede estar vac\u00EDo.", "Error");
        $("#nombrerol").css({ "border-color": "red" });
        $("#nombrerol").css({ "border-width": "3px" });
        $("#observacionesrol").css({ "border-color": "" });
        $("#observacionesrol").css({ "border-width": "" });
    } else if (observacionesrol == "") {
        $("#nombrerol").css({ "border-color": "" });
        $("#nombrerol").css({ "border-width": "" });
        toastr["error"]("El campo 'Nombre del perfil de acceso al Sistema', no puede estar vac\u00EDo.", "Error");
        $("#observacionesrol").css({ "border-color": "red" });
        $("#observacionesrol").css({ "border-width": "3px" });

    } else {
        $.ajax({
                type: "POST",
                url: "procesarRoles.php",
                dataType: "json",
                data: rol
            })
            .done(function(rolesRespuesta, txtStatus, jqXHR) {
                toastr["success"](rolesRespuesta.msj, "Correcto");
                setTimeout(recargar(), 5000);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                toastr["error"]("No se puede ingresar este perfil de acceso, consulte al administrador del sistema.", "Error");
            });
    }
}

function consultaRol(idrol) {

    var rol = {
        "operacion": 4,
        "id": idrol,
        "nombrerol": "",
        "observacionesrol": ""
    }

    $.ajax({
            type: "POST",
            url: "procesarRoles.php",
            dataType: "json",
            data: rol
        })
        .done(function(rolesRespuesta, txtStatus, jqXHR) {
            $("#udprolid").val(rolesRespuesta.idcatrol);
            $("#udpnombrerol").val(rolesRespuesta.rolnombre);
            $("#udpobservacionesrol").val(rolesRespuesta.observaciones);
            $("#modalUDPRol").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede consultar la información de este registro.", "Error");
        });
}

function udpRol() {
    var idrol = $("#udprolid").val();
    var nombrerol = $("#udpnombrerol").val();
    var observacionesrol = $("#udpobservacionesrol").val();

    var rol = {
        "operacion": 2,
        "id": idrol,
        "nombrerol": nombrerol,
        "observacionesrol": observacionesrol
    }
    if (nombrerol == "") {
        toastr["error"]("El campo 'Nombre del perfil de acceso al Sistema', no puede estar vac\u00EDo.", "Error");
        $("#udpnombrerol").css({ "border-color": "red" });
        $("#udpnombrerol").css({ "border-width": "3px" });
        $("#udpobservacionesrol").css({ "border-color": "" });
        $("#udpobservacionesrol").css({ "border-width": "" });
    } else if (observacionesrol == "") {
        $("#udpnombrerol").css({ "border-color": "" });
        $("#udpnombrerol").css({ "border-width": "" });
        toastr["error"]("El campo 'Observaciones del perfil de acceso al Sistema', no puede estar vac\u00EDo.", "Error");
        $("#udpobservacionesrol").css({ "border-color": "red" });
        $("#udpobservacionesrol").css({ "border-width": "3px" });

    } else {
        $.ajax({
                type: "POST",
                url: "procesarRoles.php",
                dataType: "json",
                data: rol
            })
            .done(function(rolesRespuesta, txtStatus, jqXHR) {
                toastr["success"](rolesRespuesta.msj, "Correcto");
                setTimeout(recargar(), 5000);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                toastr["error"]("No se puede actualizar los datos del perfil de acceso, consulte con el administrador del sistema.", "Error");
            });
    }
}

function eliminarRol(idrol) {
    var rol = {
        "operacion": 3,
        "id": idrol,
        "nombrerol": "",
        "observacionesrol": ""
    }

    $.ajax({
            type: "POST",
            url: "procesarRoles.php",
            dataType: "json",
            data: rol
        })
        .done(function(rolesRespuesta, txtStatus, jqXHR) {
            toastr["success"](rolesRespuesta.msj, "Correcto");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede borrar este registro.", "Error");
        });
}

$("#modalNuevoRol").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoRol").modal("hide");
        saveRol();
    }
});

$("#modalUDPRol").keypress(function(e) {
    if (e.which == 13) {
        $("#modalUDPRol").modal("hide");
        udpRol();
    }
});

/************** MÓDULO DE RESPALDOS *******************/
/******************************************************/

function respaldar() {
    //$("#modalRespaldo").modal("show");
    $.ajax({
            type: "POST",
            url: "procesarRespaldo.php",
            dataType: "json"
        })
        .done(function(respaldoRespuesta, txtStatus, jqXHR) {
            $("#modalRespaldo").modal("show");
            cargarBarProgress();
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[1], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "4000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[2], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[3], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "6000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[4], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "7000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[5], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "8000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[6], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "9000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[7], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[8], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "11000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[9], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "12000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[10], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "13000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[11], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "14000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[12], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "15000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[13], "Correcto");
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "16000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"](respaldoRespuesta[14], "Correcto");
            //setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede generar el respaldo de la base de datos, consulte al administrador del sistema.", "Error");
        });
}

function cargarBarProgress() {
    var current_progress = 0;
    var interval = setInterval(function() {
        current_progress += 5;
        $("#dynamic").css("width", current_progress + "%").attr("aria-valuenow", current_progress).text(current_progress + "% Completado.");
        if (current_progress >= 100)
            clearInterval(interval);
    }, 1000);
}

$("#modalRespaldo").keypress(function(e) {
    if (e.which == 13) {
        $("#modalRespaldo").modal("hide");
    }
});