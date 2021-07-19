WeatherApp.controller('UsuariosController', ['$scope', '$http', function ($scope, $http) {
    $scope.InitUsu = function () {
        $scope.ConsultarUsuarios();
    }

    $scope.ConsultarUsuarios = function () {
        $('#UsuariosTable').DataTable({
            "ajax": "http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php?action=consultarUsuarios",
            "processing": true,
            "select": {
                "style": 'single'
            },
            "columns": [
                { "data": "Nombres" },
                { "data": "Apellidos" },
                { "data": "NumeroDocumento" },
                { "data": "Email" },
                { "data": "Telefono" }
            ]
        });
    }

    $scope.ConsultarUsuario = function () {
        $scope.UsuarioID = gup('id', window.location.href);
        $http.get('http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php?action=consultarUsuario&id=' + $scope.UsuarioID).then(function (r) {
            $scope.Usuario = r.data;
            $scope.ConsultarTipoDocumento();
            $scope.ConsultarTipoUsuario(function () {
                setTimeout(() => {
                    $('#TipoDocumentoID').val($scope.Usuario.TipoDocumentoID);
                    $('#TipoUsuarioID').val($scope.Usuario.TipoUsuarioID);
                }, 100);
            });
        })
    }

    $scope.ConsultarTipoDocumento = function () {
        $http.get('http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php?action=consultarTipoDocumento').then(function (r) {
            $scope.TiposDocumento = r.data;
        })
    }

    $scope.ConsultarTipoUsuario = function (Callback) {
        $http.get('http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php?action=consultarTipoUsuario').then(function (r) {
            $scope.TiposUsuario = r.data;
            if (Callback) {
                Callback();
            }
        })
    }

    $scope.Editar = function () {
        var usuario = $('#UsuariosTable').DataTable().rows({ selected: true }).data()[0];
        if (usuario != null) {
            window.location.href = "#/editarUsuario?id=" + usuario.UsuarioID;
        }
    }

    $scope.EditarUsuario = function () {
        var model = {
            UsuarioID: $scope.UsuarioID,
            Nombres: $('#Nombres').val(),
            Apellidos: $('#Apellidos').val(),
            TipoDocumentoID: $('#TipoDocumentoID').val(),
            Email: $('#Email').val(),
            Telefono: $('#Telefono').val(),
            TipoUsuarioID: $('#TipoUsuarioID').val(),
            Contrasenia: $('#Contrasenia').val(),
        }
        $http.post('http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php?action=actualizarUsuario', model).then(function (r) {
            Swal.fire({
                type: 'success',
                title: 'Usuario Actualizado',
            });
        })
    }

    $scope.Nuevo = function () {
        var model = {
            Nombres: $('#Nombres').val(),
            Apellidos: $('#Apellidos').val(),
            TipoDocumentoID: $('#TipoDocumentoID').val(),
            NumeroDocumento: $('#NumeroDocumento').val(),
            Email: $('#Email').val(),
            Telefono: $('#Telefono').val(),
            TipoUsuarioID: $('#TipoUsuarioID').val(),
            Contrasenia: $('#Contrasenia').val(),
        }
        $http.post('http://localhost/pruebasTecnicas/NetGrid/API/usuarios.php?action=registrarUsuario', model).then(function (r) {
            Swal.fire({
                type: 'success',
                title: 'Usuario Registrado',
            });
        })
    }
}]);

function gup(name, url) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(url);
    return results == null ? null : results[1];
}