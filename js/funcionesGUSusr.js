function newUser() {
    $("#usrnombre").val("");
    $("#usrapellido").val("");
    $("#username").val("");
    $("#usrpassword1").val("");
    $("#usrpassword1").val("");
    $("#usrrol").val("");
    $("#usrfecha").val("");
    $("#modalNuevoUsuario").modal("show");
}
//Catalogo de Roles

function verRoles() {
    $("#catalogoRoles").modal("show");
}

function comparaPass() {
    var pass1 = $("#usrpassword1").val();
    var pass2 = $("#usrpassword2").val();

    if ((pass1 == pass2) && ((pass1 != "") && (pass2 != ""))) {
        $("#usrpassword1").css({ "border-color": "green" });
        $("#usrpassword2").css({ "border-color": "green" });
        toastr["success"]("Las contraseñas coinciden correctamente.", "Exitoso");
    } else {
        $("#usrpassword1").css({ "border-color": "red" });
        $("#usrpassword2").css({ "border-color": "red" });
        toastr["error"]("Las contrase\u00F1as no coinciden, o un campo de contrase\u00F1a est\u00E1 vac\u00EDo .", "Error");
    }
}

function guardarUsuario() {
    $("#modalNuevoUsuario").modal("hide");
    var username = $("#username").val();
    var password1 = $("#usrpassword1").val();
    var password2 = $("#usrpassword2").val();
    var rol = $("#usrrol").val();

    if (username == "") {
        toastr["error"]("Por favor introduzca un nombre de usuario correcto.", "Error");
        $("#username").css({ "border-color": "red" });
    } else {
        if (password1 == "" || password2 == "") {
            toastr["error"]("Debe de verficar los campos de contraseñas sean correctas.", "Error");
            $("#usrpassword1").css({ "border-color": "red" });
            $("#usrpassword2").css({ "border-color": "red" });
        } else {
            $("#usrpassword1").css({ "border-color": "green" });
            $("#usrpassword2").css({ "border-color": "green" });
            toastr["success"]("Las contraseñas coinciden correctamente.", "Exitoso");
        }
    }

    var datosUsuarios = {
        "operacion": 1,
        "id": "",
        "nombre": "",
        "apellido": "",
        "username": username,
        "rol": rol,
        "activado": 1,
        "password": password2,
        "sesionactiva": 0,
        "fechaalta": "HOY",
        "fechaultimamod": "HOY",
        "fechavencimiento": "2020-12-31"
    };

    $.ajax({
            type: "POST",
            url: "procesaUsr.php",
            dataType: "json",
            data: datosUsuarios
        })
        .done(function(datosUsuario, txtStatus, jqXHR) {
            toastr["success"](datosUsuario.msj, "Correcto");
            setTimeout(recargar(), 5000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede guardar los datos del usuario, consulte con el administrador del sistema.", "Error");
        });
}

function consultaUsuario(id) {
    var datosUsuarios = {
        "operacion": 4,
        "id": id,
        "nombre": "",
        "apellido": "",
        "username": "",
        "rol": "",
        "activado": 0,
        "password": "",
        "sesionactiva": 0,
        "fechaalta": "",
        "fechaultimamod": "",
        "fechavencimiento": ""
    };

    $.ajax({
            type: "POST",
            url: "procesaUsr.php",
            dataType: "json",
            data: datosUsuarios
        })
        .done(function(datosUsuario, txtStatus, jqXHR) {
            $("#udp-userid").val(datosUsuario.id);
            $("#udp-usrnombre").val(datosUsuario.nombre);
            $("#udp-usrapellido").val(datosUsuario.apellido);
            $("#udp-username").val(datosUsuario.username);
            $("#udp-usrrol").val(datosUsuario.idcatrol);
            $("#nomrol").val(datosUsuario.rolnombre);
            $("#modal-udp-usuario").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede guardar los datos del usuario, consulte con el administrador del sistema.", "Error");
        });
}

function actUsuario() {
    var id = $("#udp-userid").val();
    var username = $("#udp-username").val();
    var rol = $("#udp-usrrol").val();

    var datosUsuarios = {
        "operacion": 2,
        "id": id,
        "nombre": "",
        "apellido": "",
        "username": username,
        "rol": rol,
        "activado": 0,
        "password": "",
        "sesionactiva": 0,
        "fechaalta": "",
        "fechaultimamod": "",
        "fechavencimiento": ""
    };

    $.ajax({
            type: "POST",
            url: "procesaUsr.php",
            dataType: "json",
            data: datosUsuarios
        })
        .done(function(respuestaUsuario, txtStatus, jqXHR) {
            $("#modal-udp-usuario").modal("hide");
            toastr["success"](respuestaUsuario.msj, "Correcto");
            setTimeout(recargar(), 5000);

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se pueden actualizar los datos del usuario, consulte con el administrador del sistema.", "Error");
        });
}

function reestablecePass(id) {
    var datosUsuarios = {
        "operacion": 4,
        "id": id,
        "nombre": "",
        "apellido": "",
        "username": "",
        "rol": "",
        "activado": 0,
        "password": "",
        "sesionactiva": 0,
        "fechaalta": "",
        "fechaultimamod": "",
        "fechavencimiento": ""
    };
    $.ajax({
            type: "POST",
            url: "procesaUsr.php",
            dataType: "json",
            data: datosUsuarios
        })
        .done(function(datosUsuario, txtStatus, jqXHR) {
            $("#reset-userid").val(datosUsuario.id);
            $("#reset-username").val(datosUsuario.username);
            $("#reset-password1").val("");
            $("#reset-password2").val("");
            $("#modal-reestablecer-pass").modal("show");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede guardar los datos del usuario, consulte con el administrador del sistema.", "Error");
        });
}

function actPassword() {
    var id = $("#reset-userid").val();
    var pass1 = $("#reset-password1").val();
    var pass2 = $("#reset-password2").val();

    if ((pass1 == pass2) && ((pass1 != "") && (pass2 != ""))) {
        var datosUsuarios = {
            "operacion": 3,
            "id": id,
            "nombre": "",
            "apellido": "",
            "username": "",
            "rol": "",
            "activado": 0,
            "password": pass2,
            "sesionactiva": 0,
            "fechaalta": "",
            "fechaultimamod": "",
            "fechavencimiento": ""
        };

        $.ajax({
                type: "POST",
                url: "procesaUsr.php",
                dataType: "json",
                data: datosUsuarios
            })
            .done(function(respuestaUsuario, txtStatus, jqXHR) {
                $("#modal-reestablecer-pass").modal("hide");
                toastr["success"](respuestaUsuario.msj, "Correcto");

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                toastr["error"]("No se puede guardar los datos del usuario, consulte con el administrador del sistema.", "Error");
            });

    } else {
        $("#reset-password1").css({ "border-color": "red" });
        $("#reset-password1").css({ "border-width": "3px" });
        $("#reset-password2").css({ "border-color": "red" });
        $("#reset-password2").css({ "border-width": "3px" });
        $("#botonesResetPass").html("<button type='button' class='btn btn-danger' name='cancelar' id='cancelar' data-dismiss='modal'>" +
            "<i class='fas fa-times'></i>Cancelar</button>");
        toastr["error"]("Debe de verficar los campos de contraseñas sean correctas.", "Error");
    }


}

function verifPassUdp() {
    var pass1 = $("#reset-password1").val();
    var pass2 = $("#reset-password2").val();

    if ((pass1 == pass2) && ((pass1 != "") && (pass2 != ""))) {
        $("#reset-password1").css({ "border-color": "green" });
        $("#reset-password1").css({ "border-width": "3px" });
        $("#reset-password2").css({ "border-color": "green" });
        $("#reset-password2").css({ "border-width": "3px" });
        $("#botonesResetPass").html("<button type='button' class='btn btn-success' name='guardar' id='guardar' onclick='actPassword()'>" +
            "<i class='fas fa-save'></i>Guardar</button>&nbsp;<button type='button' class='btn btn-danger' name='cancelar' id='cancelar' data-dismiss='modal'>" +
            "<i class='fas fa-times'></i>Cancelar</button>");
        toastr["success"]("Las contraseñas coinciden correctamente.", "Exitoso");
    } else {
        $("#reset-password1").css({ "border-color": "red" });
        $("#reset-password1").css({ "border-width": "3px" });
        $("#reset-password2").css({ "border-color": "red" });
        $("#reset-password2").css({ "border-width": "3px" });
        $("#botonesResetPass").html("<button type='button' class='btn btn-danger' name='cancelar' id='cancelar' data-dismiss='modal'>" +
            "<i class='fas fa-times'></i>Cancelar</button>");
        toastr["error"]("Debe de verficar los campos de contraseñas sean correctas.", "Error");
    }
}

function desbloqueo(id) {
    var datosUsuarios = {
        "operacion": 5,
        "id": id,
        "nombre": "",
        "apellido": "",
        "username": "",
        "rol": "",
        "activado": 0,
        "password": "",
        "sesionactiva": 0,
        "fechaalta": "",
        "fechaultimamod": "",
        "fechavencimiento": ""
    };
    $.ajax({
            type: "POST",
            url: "procesaUsr.php",
            dataType: "json",
            data: datosUsuarios
        })
        .done(function(respuestaUsuario, txtStatus, jqXHR) {
            toastr["success"](respuestaUsuario.msj, "Correcto");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede desbloquear el usuario, consulte con el administrador del sistema.", "Error");
        });
}

function bloquearUSR(id) {
    var datosUsuarios = {
        "operacion": 6,
        "id": id,
        "nombre": "",
        "apellido": "",
        "username": "",
        "rol": "",
        "activado": 0,
        "password": "",
        "sesionactiva": 0,
        "fechaalta": "",
        "fechaultimamod": "",
        "fechavencimiento": ""
    };
    $.ajax({
            type: "POST",
            url: "procesaUsr.php",
            dataType: "json",
            data: datosUsuarios
        })
        .done(function(respuestaUsuario, txtStatus, jqXHR) {
            toastr["success"](respuestaUsuario.msj, "Correcto");

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede bloquear el usuario, consulte con el administrador del sistema.", "Error");
        });
}

function generarRespaldo() {

}

$("#modalNuevoUsuario").keypress(function(e) {
    if (e.which == 13) {
        $("#modalNuevoUsuario").modal("hide");
        guardarUsuario();
    }
});

$("#modal-udp-usuario").keypress(function(e) {
    if (e.which == 13) {
        actUsuario();
    }
});

$("#modal-reestablecer-pass").keypress(function(e) {
    if (e.which == 13) {
        actPassword();
    }
});

$("#modal-reestablecer-pass").on('hidden.bs.modal', function() {
    $("#reset-password2").css({ "border-color": "" });
    $("#reset-password1").css({ "border-color": "" });
});