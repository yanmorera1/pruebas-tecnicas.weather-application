WeatherApp.controller('MensajesController', ['$scope', '$http', function ($scope, $http) {
    $scope.InitMensajes = function () {
        $scope.ConsultarMensajes();
    }

    $scope.ConsultarMensajes = function () {
        $('#MensajesTable').DataTable({
            "ajax": "http://localhost/pruebasTecnicas/NetGrid/API/mensajes.php?action=consultarMensajes",
            "processing": true,
            "select": {
                "style": 'single'
            },
            "columns": [
                { "data": "Mensaje" },
                { "data": "Nombres" },
                { "data": "Apellidos" }
            ]
        });
    }

    $scope.NuevoMensaje = function () {
        window.location.href = "#/nuevoMensaje"
    }

    $scope.GuardarMensaje = function () {
        var model = {
            Mensaje: $('#Mensaje').val(),
            UsuarioID: $('#UsuarioID').val()
        }
        $http.post('http://localhost/pruebasTecnicas/NetGrid/API/mensajes.php?action=registrarMensaje', model).then(function (r) {
            Swal.fire({
                type: 'success',
                title: 'Mensaje Guardado',
            });
        });
    }
}]);