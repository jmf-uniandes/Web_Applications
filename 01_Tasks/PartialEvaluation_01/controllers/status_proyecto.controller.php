<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
TODO: controlador de StatusProyectos

require_once('../models/status_proyectos.model.php');
error_reporting(0);
$StatusProyectos = new StatusProyectos;

switch ($_GET["op"]) {
        //TODO: operaciones de StatusProyectos

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los StatusProyectos
        $result = array(); // Defino un arreglo para almacenar los valores que vienen de la clase StatusProyectos.model.php
        $datos = $StatusProyectos->todos(); // Llamo al metodo todos de la clase StatusProyectos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $result[] = $row;
        }
        echo json_encode($result);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idStatusProyecto = $_POST["idStatusProyecto"];
        $datos = array();
        $datos = $StatusProyectos->uno($idStatusProyecto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un empleado en la base de datos
    case 'insertar':
        $StatusProyecto = $_POST["StatusProyecto"];
        
        $datos = array();
        $datos = $StatusProyectos->insertar($StatusProyecto);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un empleado en la base de datos
    case 'actualizar':
        $idStatusProyecto = $_POST["idStatusProyecto"];
        $StatusProyecto = $_POST["StatusProyecto"];
        
        $datos = array();
        $datos = $StatusProyectos->actualizar($idStatusProyecto, $StatusProyecto);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un empleado en la base de datos
    case 'eliminar':
        $idStatusProyecto = $_POST["idStatusProyecto"];
        $datos = array();
        $datos = $StatusProyectos->eliminar($idStatusProyecto);
        echo json_encode($datos);
        break;
}
