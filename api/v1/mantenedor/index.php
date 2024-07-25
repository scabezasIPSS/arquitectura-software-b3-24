<?php
//este archivo es nuestra vista
// echo 'estamos en el index del mantenedor | ';

// echo "este es el metodo utilizado: {$metodo} | ";

include_once '../configuracion.php';

$existeId = false;
$valorId = 0;

if (count($_parametros) > 0) {
    foreach ($_parametros as $p) {
        if (strpos($p, 'id') !== false) {
            $existeId = true;
            $valorId = explode('=', $p)[1];
        }
    }
}

if ($_version == 'v1') {
    if ($_mantenedor == 'mantenedor'){
        switch ($_metodo) {
            case 'GET':
                if($_header == $_token_get){
                    include_once 'mantenedorController.php';
                    $control = new Controlador();
                    $lista = $control->getAll();
                    http_response_code(200);
                    echo json_encode(['data' => $lista]);
                    //Tarea: Cómo retornamos un solo valor, cuando el parametro es de id=1 u otro que tengamos en la base de datos
                }else{
                    http_response_code(401);
                    echo json_encode(['Error' => 'Sin Autorización']);
                }
                break;
            case 'POST':
                echo 'es un post para agregar..';
                break;
    
            default:
                http_response_code(405);
                echo json_encode(['Error' => 'No implementado']);
                break;
        }

    }
}
