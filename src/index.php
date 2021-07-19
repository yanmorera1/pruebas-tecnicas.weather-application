<?php
session_start();

if ($_SESSION["usuario"] === null) {
  header("Location: ../index.html");
}
$usuario = json_decode($_SESSION["usuario"]);
$tipoUsuarioAdmin = json_decode($_SESSION["tipoUsuarioAdmin"]);
?>

<!DOCTYPE html>
<html lang="en" ng-app="weather">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather Application</title>

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="../src/resources/img/1200px-Cloud_font_awesome.svg.png" sizes="180x180">
  <link rel="icon" href="../src/resources/img/1200px-Cloud_font_awesome.svg.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../src/resources/img/1200px-Cloud_font_awesome.svg.png" sizes="16x16" type="image/png">
  <link rel="mask-icon" href="../src/resources/img/1200px-Cloud_font_awesome.svg.png" color="#7952b3">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../src/resources/fontawesome/css/all.css">
  <link rel="stylesheet" href="../src/resources/css/sweetalert2.min.css">
  <link rel="stylesheet" href="../src/resources/DataTables/datatables.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Weather</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#/clima">Clima</a>
          </li>
          <?php if($usuario->TipoUsuarioID == $tipoUsuarioAdmin->Valor) {?>
          <li class="nav-item">
            <a class="nav-link" href="#/usuarios">Usuarios</a>
          </li>
          <?php } ?>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="align-items-center d-flex nav-item text-light">
            <?php echo $usuario->Nombres . ' ' . $usuario->Apellidos ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="CerrarSesion()" style="cursor: pointer;"><i class="fa fa-sign-out-alt"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <!-- Content body -->
        <ng-view />
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="resources/js/jquery-3.6.0.min.js"></script>
  <script src="resources/js/angular.min.js"></script>
  <script src="resources/js/angular-route.min.js"></script>
  <script src="../src/resources/js/sweetalert2.all.min.js"></script>

  <script src="../src/resources/DataTables/datatables.min.js"></script>
  <script src="../src/resources/fontawesome/js/all.js"></script>

  <script src="../js/login.js"></script>
  <script src="../js/app.js"></script>

  <script src="../js/controllers/usuarios.js"></script>
  <script src="../js/controllers/clima.js"></script>
</body>

</html>