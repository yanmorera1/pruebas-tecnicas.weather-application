<?php
include 'conection.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch ($action) {
    case 'consultarMensajes':
        header('Content-Type: application/json');
        $mensajes['data'] = consultarMensajes($fluent);
        print_r(json_encode($mensajes));
        break;        
    case 'registrarMensaje':
        header('Content-Type: application/json');
        $data = json_decode(utf8_encode(file_get_contents("php://input")), true);
        print_r(json_encode(registrarMensaje($fluent, $data)));
        break;
}

function consultarMensajes($fluent)
{
    return $fluent->from('mensajes')
             ->leftJoin('usuarios ON usuarios.UsuarioID = mensajes.UsuarioID')
             ->select('mensajes.Mensaje, usuarios.Nombres, usuarios.Apellidos')
             ->fetchAll();
}

function registrarMensaje($fluent, $data)
{
    $fluent->insertInto('mensajes', $data)
        ->execute();

    return true;
}