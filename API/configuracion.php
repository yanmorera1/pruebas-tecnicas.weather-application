<?php
include 'conection.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch($action) {
    case 'consultarConfiguracion':
        header('Content-Type: application/json');
        print_r(json_encode(consultarConfiguracion($fluent, $_GET['llave'])));
        break;
}

function consultarConfiguracion($fluent, $llave)
{
    return $fluent->from('configuracion')->where('Llave', $llave)->fetch();
}