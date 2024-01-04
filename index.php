<?php

require_once('./vendor/autoload.php');

use App\OperacionesDatos;
use LionDatabase\Driver;
use LionDatabase\Drivers\MySQL\MySQL as DB;

Driver::run([
    'default' => 'data_connection',
    'connections' => [
        'data_connection' => [
            'type' => 'mysql',
            'host' => 'db',
            'port' => 3306,
            'dbname' => 'users',
            'user' => 'root',
            'password' => 'lion'
        ],
    ]
]);

if (!isset($_GET['process'])) {
    die('No existe process');
}

// Crear una instancia de la clase
$operaciones = new OperacionesDatos();

if ($_GET['process'] === 'create') {
    $nuevosDatosInsert = [
    'user_name' => 'sergio',
    'user_lastname' => 'leon'];
    $responses = $operaciones->insertarDatos($nuevosDatosInsert);
    var_dump($responses);
    die;
}

if ($_GET['process'] === 'read') {
    $datos = $operaciones->obtenerDatos();
    var_dump($datos);
    die;
}

if ($_GET['process'] === 'update') {
    $idActualizar = 3;
    $nuevosDatosUpdate = [
        'user_name' => 'sergio',
        'user_lastname' => 'loco'
    ];
    $response = $operaciones->actualizarDatos($idActualizar, $nuevosDatosUpdate);
    var_dump($response);
    die;
    // var_dump($operaciones->getLastOperationResult());
}

if ($_GET['process'] === 'delete') {
    $iddelete = 3;
    $response = $operaciones->delete($iddelete);
    var_dump($response);
    die;
}

die('el process no es valido');

?>