<?php
include 'conection.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'consultarUsuarioLogin':
        header('Content-Type: application/json');
        print_r(json_encode(consultarUsuarioLogin($fluent, $_GET['documento'], $_GET['contrasenia'])));
        break;
    case 'consultarUsuario':
        header('Content-Type: application/json');
        print_r(json_encode(consultarUsuario($fluent, $_GET['id'])));
        break;
    case 'consultarUsuarios':
        header('Content-Type: application/json');
        $usuarios['data'] = consultarUsuarios($fluent);
        print_r(json_encode($usuarios));
        break;
    case 'iniciarSesion':
        header('Content-Type: application/json');
        print_r(json_encode(iniciarSesion($fluent, $_GET['documento'], $_GET['contrasenia'])));
        break;
    case 'consultarTipoUsuario':
        header('Content-Type: application/json');
        print_r(json_encode(consultarTipoUsuario($fluent)));
        break;
    case 'consultarTipoDocumento':
        header('Content-Type: application/json');
        print_r(json_encode(consultarTipoDocumento($fluent)));
        break;
    case 'cerrarSesion':
        header('Content-Type: application/json');
        print_r(json_encode(cerrarSesion()));
        break;
    case 'registrarUsuario':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(registrarUsuario($fluent, $data)));
        break;
    case 'actualizarUsuario':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(actualizarUsuario($fluent, $data)));
        break;
    case 'eliminarUsuario':
        header('Content-Type: application/json');
        print_r(json_encode(eliminarUsuario($fluent, $_GET['id'])));
        break;
}

function consultarUsuarioLogin($fluent, $documento, $contrasenia)
{
    return $fluent->from('usuarios')->where('NumeroDocumento', $documento)->where('Contrasenia', $contrasenia)->fetch();
}

function iniciarSesion($fluent, $documento, $contrasenia)
{
    session_start();
    $usuario = consultarUsuarioLogin($fluent, $documento, $contrasenia);
    $tipoUsuarioAdmin = $fluent->from('configuracion')->where('Llave', 'UsuarioAdministrador')->fetch();
    if ($usuario != null) {
        $_SESSION["usuario"] = json_encode($usuario);
        $_SESSION["tipoUsuarioAdmin"] = json_encode($tipoUsuarioAdmin);
        return $usuario;
    } else {
        return null;
    }
}

function cerrarSesion()
{
    session_start();
    unset($_SESSION["usuario"]);
    session_destroy();
}

function consultarUsuario($fluent, $id)
{
    return $fluent->from('usuarios')->where('UsuarioID', $id)->fetch();
}

function consultarUsuarios($fluent)
{
    return $fluent
        ->from('usuarios')
        ->orderBy("UsuarioID DESC")
        ->fetchAll();
}

function consultarTipoDocumento($fluent)
{
    return $fluent
        ->from('tipodocumento')
        ->orderBy("TipoDocumentoID DESC")
        ->fetchAll();
}

function consultarTipoUsuario($fluent)
{
    return $fluent
        ->from('tiposusuarios')
        ->orderBy("TipoUsuarioID DESC")
        ->fetchAll();
}

function registrarUsuario($fluent, $data)
{
    $fluent->insertInto('usuarios', $data)
        ->execute();

    return true;
}

function actualizarUsuario($fluent, $data)
{
    $fluent->update('usuarios')->set($data)->where('UsuarioID', $data['UsuarioID'])->execute();

    return true;
}

function eliminarUsuario($fluent, $id)
{
    $fluent->deleteFrom('usuarios')->where('UsuarioID', $id)->execute();
    return true;
}
