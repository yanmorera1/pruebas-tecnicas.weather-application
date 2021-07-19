<?php
include 'conection.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

switch($action) {
    case 'verTodos':
        header('Content-Type: application/json');
        print_r(json_encode(verTodos($fluent)));
        break;
    case 'ver':
        header('Content-Type: application/json');
        print_r(json_encode(ver($fluent, $_GET['id'])));
        break;
}

function ver($fluent, $id)
{
    return $fluent->from('paises')->where('PaisID', $id)->fetch();
}

function verTodos($fluent)
{
    return $fluent
         ->from('paises')
         ->orderBy("PaisID DESC")
         ->fetchAll();
}