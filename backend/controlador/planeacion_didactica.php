<?php
    header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once("../conexion.php");
    require_once("../modelos/planeacion_didactica.php");
    
    $control = $_GET['control'];
    $plan = new Planeacion_didactica($conexion);

    switch ($control) {
        case 'consulta':
           $vec = $plan->consulta();
        break;
        case 'insertar':
              $json =file_get_contents('php://input');
              //$json = '{"tema":"producto","fo_usuario":"2"}';
              $params = json_decode($json);
              $vec = $plan->insertar($params);
        break;
        case 'eliminar':
            $id = $_GET['id'];
            $vec = $plan->eliminar($id);
        break;
        case 'editar':
            $json =file_get_contents('php://input');
            $params = json_decode($json);
            $id = $_GET['id'];
            $vec = $plan->editar($id, $params);
        break;
        case 'filtro':
            $dato = $_GET['dato'];
            $vec = $plan->filtro($dato);
        break;

    }
    $datosj = json_encode($vec);
    echo $datosj;
    header('Content-Type: application/json');

?>