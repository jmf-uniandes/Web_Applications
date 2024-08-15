<?php
//TODO: Clase de StatusProyectos
require_once('../config/config.php');
class StatusProyectos
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from StatusProyectos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `StatusProyectos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idStatusProyecto) //select * from StatusProyectos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `StatusProyectos` WHERE `idStatusProyecto`=$idStatusProyecto";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //insert into StatusProyectos (StatusProyecto) values ($StatusProyecto)
    public function insertar($StatusProyecto) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `StatusProyectos` ( `StatusProyecto`) VALUES ('$StatusProyecto')";
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
    public function actualizar($idStatusProyecto, $StatusProyecto) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `StatusProyectos` SET `StatusProyecto`='$StatusProyecto' WHERE `idStatusProyecto` = $idStatusProyecto";
            if (mysqli_query($con, $cadena)) {
                return $idStatusProyecto;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($idStatusProyecto) //delete from StatusProyectos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `StatusProyectos` WHERE `idStatusProyecto`= $idStatusProyecto";
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
