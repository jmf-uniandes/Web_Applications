<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de empleados

require_once('../models/empleados.model.php');
//error_reporting(0);
$empleados = new Empleados;

switch ($_GET["op"]) {
        //TODO: operaciones de empleados

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los empleados
        $result = array(); // Defino un arreglo para almacenar los valores que vienen de la clase empleados.model.php
        $datos = $empleados->todos(); // Llamo al metodo todos de la clase empleados.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $result[] = $row;
        }
        echo json_encode($result);
        break;
        //TODO: Procedimiento para obtener un registro de la base de datos
    case 'uno':
        $empleado_id = $_POST["empleado_id"];
        $datos = array();
        $datos = $empleados->uno($empleado_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimiento para insertar un empleado en la base de datos
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $email = $_POST["email"];
        $Posicion = $_POST["Posicion"];

        $datos = array();
        $datos = $empleados->insertar($Nombre, $Apellido, $email, $Posicion);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para actualizar un empleado en la base de datos
    case 'actualizar':
        $empleado_id = $_POST["empleado_id"];
        $Nombre = $_POST["Nombre"];
        $Apellido = $_POST["Apellido"];
        $email = $_POST["email"];
        $Posicion = $_POST["Posicion"];
        
        $datos = array();
        $datos = $empleados->actualizar($empleado_id, $Nombre, $Apellido, $email, $Posicion);
        echo json_encode($datos);
        break;
        //TODO: Procedimiento para eliminar un empleado en la base de datos
    case 'eliminar':
        $empleado_id = $_POST["empleado_id"];
        $datos = array();
        $datos = $empleados->eliminar($empleado_id);
        echo json_encode($datos);
        break;
}
