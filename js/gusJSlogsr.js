//Para inicio de sesión

function iniciarSesion() {
    var username = $("#username").val();
    var password = $("#password").val();
    if (username == "") {
        $("#username").css({ "background": "red" });
        $("#username").attr("placeholder", "Este campo no puede estar vac\u00EDo");
        $("#password").css({ "background": "rgba(0, 0, 0, .3)" });
        toastr["error"]("Por favor indique su nombre de usuario.", "Error");


    } else if (password == "") {
        $("#password").css({ "background": "red" });
        $("#password").attr("placeholder", "Este campo no puede estar vac\u00EDo");
        $("#username").css({ "background": "rgba(0, 0, 0, .3)" });
        toastr["error"]("Por favor indique su contrase\u00F1a.", "Error");
    } else {
        $("#username").css({ "background": "rgba(0, 0, 0, .3)" });
        $("#password").css({ "background": "rgba(0, 0, 0, .3)" });
        var datUsuario = {
            "username": username,
            "password": password
        }
        $.ajax({
                type: "POST",
                url: "procesaUsuario.php",
                dataType: "json",
                data: datUsuario
            })
            .done(function(respuestaUsuario, txtStatus, jqXHR) {
                if (respuestaUsuario.password == false) {
                    toastr["error"]("La contrase\u00F1a introducida es incorrecta, verifique por favor.", "Error");
                    $("#password").css({ "background": "red" });
                    $("#password").focus();
                } else if (respuestaUsuario.useractivado != 1) {
                    toastr["error"]("Este usuario no se encuentra activo, verifique por favor.", "Error");
                    $("#username").val("");
                    $("#password").val("");
                } else if (respuestaUsuario.sesionactiva == 1) {
                    toastr["error"]("Este usuario tiene sesi\u00F3n activa, verifique con el administrador del sistema.", "Error");
                    $("#username").val("");
                    $("#password").val("");
                } else if (respuestaUsuario.dfechavencimiento == "vencido") {
                    $("#username").val("");
                    $("#password").val("");
                    $("#txt-titulo").html("<i class='fas fa-exclamation-circle'></i>&nbsp;&nbsp;&nbsp;Alerta");
                    $("#txt-message").html("La licencia de este usuario ha vencido, consulte al administrador del sistema. Presione un tecla" +
                        " para continuar.");
                    $("#modal-usuario").modal("show");
                } else {
                    $("#username").val("");
                    $("#password").val("");
                    window.location = "principal";
                }

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                toastr["error"]("El usuario ingresado no est\u00E1 registrado en el sistema.", "Error");
            });
        // console.clear();
    }
    //alert("mensaje de prueba");
}

function cerrarSesion() {
    $.ajax({
            type: "POST",
            url: "logout.php",
            dataType: "json",
        })
        .done(function(respuestaUsuario, txtStatus, jqXHR) {
            if (respuestaUsuario.resp == true) {
                window.location = "index";
                toastr["success"]("Cierre de sesi\u00F3n satisfactorio.", "Correcto.");
                $("#txt-titulo").html("Alerta");
                $("#txt-message").html("Se cerr\u00F3 correctamente la sesi\u00F3n, presione la tecla enter para continuar.");
                $("#modal-usuario").modal("show");

            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            toastr["error"]("No se puede completar el cierre de sesi\u00F3n, verifique con el administrador del sistema.", "Error");
        });
}

$("#modal-usuario").keypress(function(e) {
    if (e.which == 13) {
        $("#modal-usuario").modal("hide");
    }
});

$("#enter").keypress(function(e) {
    if (e.which == 13) {
        iniciarSesion();
    }
});