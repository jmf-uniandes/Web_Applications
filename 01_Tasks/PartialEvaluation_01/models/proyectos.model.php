<?php
//TODO: Clase de Proyectos
require_once('../config/config.php');
class Proyectos
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from Proyectos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `proyectos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($proyecto_id) //select * from Proyectos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Proyectos` WHERE `proyecto_id`=$proyecto_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //insert into Proyectos (Nombre, Descripcion, Fecha_Inicio,Fecha_Fin) values ($Nombre, $Descripcion, $Fecha_Inicio, $Fecha_Fin)
    public function insertar($Nombre, $Descripcion, $Fecha_Inicio, $Fecha_Fin) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Proyectos` ( `Nombre`, `Descripcion`, `Fecha_Inicio`, `Fecha_Fin`) VALUES ('$Nombre','$Descripcion','$Fecha_Inicio','$Fecha_Fin')";
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
    public function actualizar($proyecto_id, $Nombre, $Descripcion, $Fecha_Inicio, $Fecha_Fin) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Proyectos` SET `Nombre`='$Nombre',`Descripcion`='$Descripcion',`Fecha_Inicio`='$Fecha_Inicio',`Fecha_Fin`='$Fecha_Fin' WHERE `proyecto_id` = $proyecto_id";
            if (mysqli_query($con, $cadena)) {
                return $proyecto_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($proyecto_id) //delete from Proyectos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Proyectos` WHERE `proyecto_id`= $proyecto_id";
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
?>