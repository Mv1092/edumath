<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/evaluacion.php");
    
    $control = $_GET['control'];
    $evaluacion = new evaluacion($conexion);

    switch ($control) {
        case 'consulta':
           $vec = $evaluacion->consulta();
        break;
        case 'insertar':
              $json =file_get_contents('php://input');
              //$json = '"Formulario":"potencia","fo_usuario":"5"';
              $params = json_decode($json);
              $vec = $evaluacion->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $evaluacion->eliminar($id);
        break;
        case 'editar':
            $json =file_get_contents('php://input');
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $evaluacion->editar($id, $params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $evaluacion->filtro($dato);
        break;

    }
    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');
?>