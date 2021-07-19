var app = angular.module('weather', [
    'ngRoute',
    'WeatherApp'
  ]);
  
  app.config(['$routeProvider',
    function($routeProvider) {
      $routeProvider.
        when('/', {
          templateUrl: 'partials/clima.html',
          controller: 'ClimaController'
        }).
        when('/clima', {
          templateUrl: 'partials/clima.html',
          controller: 'ClimaController'
        }).
        when('/usuarios', {
          templateUrl: 'partials/usuarios.html',
          controller: 'UsuariosController'
        }).
        when('/editarUsuario?:id', {
          templateUrl: 'partials/nuevoUsuario.html',
          controller: 'UsuariosController'
        }).
        when('/nuevoUsuario', {
          templateUrl: 'partials/nuevoUsuario.html',
          controller: 'UsuariosController'
        }).
        when('/mensajes', {
          templateUrl: 'partials/mensajes.html',
          controller: 'MensajesController'
        }).
        when('/nuevoMensaje', {
          templateUrl: 'partials/nuevoMensaje.html',
          controller: 'MensajesController'
        }).
        otherwise({
          redirectTo: '/'
        });
    }]);

    var WeatherApp = angular.module('WeatherApp', []);