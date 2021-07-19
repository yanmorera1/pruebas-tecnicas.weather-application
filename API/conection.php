<?php

// Cargamos Vendor
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . "/vendor/envms/fluentpdo/src/Query.php";


$pdo = new PDO('mysql:host=localhost;dbname=weatherapplication;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// $fluent = new FluentPDO($pdo);
$fluent = new \Envms\FluentPDO\Query($pdo);
