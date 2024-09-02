<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de proyectos

require_once('../models/proyectos.model.php');
//error_reporting(0);
$proyectos = new Proyectos;

switch ($_GET['op']) {
        //TODO: operaciones de proyectos

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los proyectos
        $result = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proyectos.model.php
        $datos = $proyectos->todos(); // Llamo al metodo todos de la clase proyectos.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $result[] = $row;
        }
        echo json_encode($result);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $proyecto_id = $_POST["proyecto_id"];
        $datos = array();
        $datos = $proyectos->uno($proyecto_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un proyecto en la base de datos
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Descripcion = $_POST["Descripcion"];
        $Fecha_Inicio = $_POST["Fecha_Inicio"];
        $Fecha_Fin = $_POST["Fecha_Fin"];

        $datos = array();
        $datos = $proyectos->insertar($Nombre, $Descripcion, $Fecha_Inicio, $Fecha_Fin);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un proyecto en la base de datos
    case 'actualizar':
        $proyecto_id = $_POST["proyecto_id"];
        $Nombre = $_POST["Nombre"];
        $Descripcion = $_POST["Descripcion"];
        $Fecha_Inicio = $_POST["Fecha_Inicio"];
        $Fecha_Fin = $_POST["Fecha_Fin"];
        
        $datos = array();
        $datos = $proyectos->actualizar($proyecto_id, $Nombre, $Descripcion, $Fecha_Inicio, $Fecha_Fin);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un proyecto en la base de datos
    case 'eliminar':
        $proyecto_id = $_POST["proyecto_id"];
        $datos = array();
        $datos = $proyectos->eliminar($proyecto_id);
        echo json_encode($datos);
        break;
}
?>
