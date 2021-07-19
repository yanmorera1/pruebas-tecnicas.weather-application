<?php
include 'conection.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch($action) {
    case 'verTodas':
        header('Content-Type: application/json');
        print_r(json_encode(verTodas($fluent)));
        break;
    case 'ver':
        header('Content-Type: application/json');
        print_r(json_encode(ver($fluent, $_GET['id'])));
        break;
    case 'verPorPais':
        header('Content-Type: application/json');
        print_r(json_encode(verPorPais($fluent, $_GET['id'])));
        break;
}

function ver($fluent, $id)
{
    return $fluent->from('ciudades')->where('CiudadID', $id)->fetch();
}

function verPorPais($fluent, $id)
{
    return $fluent->from('ciudades')->where('PaisID', $id)->fetchAll();
}

function verTodas($fluent)
{
    return $fluent
         ->from('ciudades')
         ->select('ciudades.*')
         ->orderBy("CiudadID DESC")
         ->fetchAll();
}