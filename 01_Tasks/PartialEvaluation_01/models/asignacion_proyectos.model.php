<?php
//TODO: Clase de AsignacionProyectos
require_once('../config/config.php');
class AsignacionProyectos
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from AsignacionProyectos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `AsignacionProyectos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idProyectosCurso) //select * from AsignacionProyectos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `AsignacionProyectos` WHERE `idProyectosCurso`=$idProyectosCurso";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //insert into AsignacionProyectos (proyecto_id, empleado_id, idStatusProyecto) values ($proyecto_id, $empleado_id, $idStatusProyecto)
    public function insertar($proyecto_id, $empleado_id, $idStatusProyecto) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `AsignacionProyectos` ( `proyecto_id`, `empleado_id`, `idStatusProyecto`) VALUES ('$proyecto_id','$empleado_id','$idStatusProyecto')";
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
    public function actualizar($idProyectosCurso, $proyecto_id, $empleado_id, $idStatusProyecto) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `AsignacionProyectos` SET `proyecto_id`='$proyecto_id',`empleado_id`='$empleado_id',`idStatusProyecto`='$idStatusProyecto' WHERE `idProyectosCurso` = $idProyectosCurso";
            if (mysqli_query($con, $cadena)) {
                return $idProyectosCurso;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idProyectosCurso) //delete from AsignacionProyectos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `AsignacionProyectos` WHERE `idProyectosCurso`= $idProyectosCurso";
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
