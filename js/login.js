function IniciarSesion() {
    var documento = $.trim($("#documento").val());
    var contrasenia = $.trim($("#contrasenia").val());

    if (documento.length == "" || contrasenia == "") {
        Swal.fire({
            type: 'warning',
            title: 'Debe ingresar un documento y contraseña',
        });
        return false;
    } else {
        $.ajax({
            url: "http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php",
            type: "GET",
            datatype: "json",
            data: { action: 'iniciarSesion', documento: documento, contrasenia: contrasenia },
            success: function (data) {
                if (data == "null") {
                    Swal.fire({
                        type: 'error',
                        title: 'Documento o contraseña incorrecta',
                    });
                } else {
                    window.location.href = "src/";
                }
            }
        });
    }
}

function CerrarSesion() {
    Swal.fire({
        type: 'info',
        title: '¿Estas segudo de cerrar la sesión?',
        showCancelButton: true,
        confirmButtonText: `Si`,
        denyButtonText: `No`,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php",
                type: "GET",
                datatype: "json",
                data: { action: 'cerrarSesion' },
                success: function (data) {
                    if (data != "null") {
                        window.location.href = "../";
                    }
                }
            });
        } else if (result.isDenied) {
            Swal.close();
        }
    })
}