<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de AsignacionProyectos

require_once('../models/asignacion_proyectos.model.php');
error_reporting(0);
$AsignacionProyectos = new AsignacionProyectos;

switch ($_GET["op"]) {
        //TODO: operaciones de AsignacionProyectos

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los AsignacionProyectos
        $result = array(); // Defino un arreglo para almacenar los valores que vienen de la clase AsignacionProyectos.model.php
        $datos = $AsignacionProyectos->todos(); // Llamo al metodo todos de la clase AsignacionProyectos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $result[] = $row;
        }
        echo json_encode($result);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $idProyectosCurso = $_POST["idProyectosCurso"];
        $datos = array();
        $datos = $AsignacionProyectos->uno($idProyectosCurso);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un proyecto en la base de datos
    case 'insertar':
        $proyecto_id = $_POST["proyecto_id"];
        $empleado_id = $_POST["empleado_id"];
        $idStatusProyecto = $_POST["idStatusProyecto"];

        $datos = array();
        $datos = $AsignacionProyectos->insertar($proyecto_id, $empleado_id, $idStatusProyecto);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un proyecto en la base de datos
    case 'actualizar':
        $idProyectosCurso = $_POST["idProyectosCurso"];
        $proyecto_id = $_POST["proyecto_id"];
        $empleado_id = $_POST["empleado_id"];
        $idStatusProyecto = $_POST["idStatusProyecto"];
                
        $datos = array();
        $datos = $AsignacionProyectos->actualizar($idProyectosCurso, $proyecto_id, $empleado_id, $idStatusProyecto);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un proyecto en la base de datos
    case 'eliminar':
        $idProyectosCurso = $_POST["idProyectosCurso"];
        $datos = array();
        $datos = $AsignacionProyectos->eliminar($idProyectosCurso);
        echo json_encode($datos);
        break;
}
