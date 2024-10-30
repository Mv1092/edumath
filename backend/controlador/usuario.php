<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/usuario.php");
    
    $control = $_GET['control'];
    $use = new usuario($conexion);

    switch ($control) {
        case 'consulta':
           $vec = $use->consulta();
        break;
        case 'insertar':
              $json =file_get_contents('php://input');
              //$json = '{"nombre":"pruebas12"},{"apellidos":"preuba12} ,{email":"nnnnnn"},{"clave":"aaaaaa"}';
              $params = json_decode($json);
              $vec = $use->insertar( $params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $use->eliminar($id);
        break;
        case 'editar':
            $json =file_get_contents('php://input');
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $use->editar($id, $params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $use->filtro($dato);
        break;

    }
    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

?>