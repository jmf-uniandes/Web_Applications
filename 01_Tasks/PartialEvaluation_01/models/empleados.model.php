<?php
//TODO: Clase de Empleados
require_once('../config/config.php');
class Empleados
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from Empleados
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Empleados`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($empleado_id) //select * from Empleados where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Empleados` WHERE `empleado_id`=$empleado_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //insert into Empleados (Nombre, Apellido, email,Posicion) values ($Nombre, $Apellido, $email, $Posicion)
    public function insertar($Nombre, $Apellido, $email, $Posicion) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Empleados` ( `Nombre`, `Apellido`, `email`, `Posicion`) VALUES ('$Nombre','$Apellido','$email','$Posicion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($empleado_id, $Nombre, $Apellido, $email, $Posicion) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Empleados` SET `Nombre`='$Nombre',`Apellido`='$Apellido',`email`='$email',`Posicion`='$Posicion' WHERE `empleado_id` = $empleado_id";
            if (mysqli_query($con, $cadena)) {
                return $empleado_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($empleado_id) //delete from Empleados where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Empleados` WHERE `empleado_id`= $empleado_id";
            // echo $cadena;
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
