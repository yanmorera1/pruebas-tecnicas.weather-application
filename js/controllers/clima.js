WeatherApp.controller('ClimaController', ['$scope', '$http', function ($scope, $http) {
    $scope.APIKey = "076f57e142a853d321629630053ef37e";
    $scope.Init = function () {
        $scope.ConsultarPaises();
    }

    $scope.ConsultarClima = function () {
        var Ciudad = $('#CiudadID').val();
        $http.get('https://api.openweathermap.org/data/2.5/weather?q=' + Ciudad + '&appid=' + $scope.APIKey).then(function (r) {
            $scope.ClimaData = r.data;
            $('#icono').removeClass('fa fa-cloud');
            switch ($scope.ClimaData.weather[0].main) {
                case 'Rain':
                    $('#icono').addClass('fa fa-cloud-rain');
                    $('#clima').html('Lluvias');
                    break;
                case 'Clear':
                    $('#icono').addClass('fa fa-rainbow');
                    $('#clima').html('Despejado');
                    break;
                case 'Clouds':
                    $('#icono').addClass('fa fa-cloud');
                    $('#clima').html('Nubado');
                    break;
            }

        })
    }

    $scope.ConsultarPaises = function () {
        $http.get('http://localhost/pruebasTecnicas/NetGrid/API/paises.php?action=verTodos').then(function (r) {
            $scope.Paises = r.data;
        })
    }

    $scope.ConsultarCiudades = function () {
        var PaisID = $('#PaisID').val();
        $http.get('http://localhost/pruebasTecnicas/NetGrid/API/ciudades.php?action=verPorPais&id=' + PaisID).then(function (r) {
            $scope.Ciudades = r.data;
            $('#CiudadID').removeAttr('disabled');
        })
    }
}]);