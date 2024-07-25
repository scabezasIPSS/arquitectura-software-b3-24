<?php
$_metodo = $_SERVER['REQUEST_METHOD'];
$_ubicacion = $_SERVER['HTTP_HOST'];
$_path = $_SERVER['REQUEST_URI'];
$_partes = explode('/', $_path);
$_version = $_partes[3];
$_mantenedor = $_partes[4];
$_parametros = [];
$_parametros = $_partes[5];

if (strlen($_parametros) > 0) {
    $_parametros = explode('?', $_parametros)[1];
    $_parametros = explode('&', $_parametros);
} else {
    $_parametros = [];
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Content-Type: application/json; charset=UTF-8");



//Autorización
$_header = null;
try {
    $_header = isset(getallheaders()['Authorization']) ?? null; //??: si viene con algo, entonces asigna el valor, sino asigna null
} catch (\Throwable $th) {
    //throw $th;
}

$_token_get = 'clave_get';
$_token_post = 'clave_post';