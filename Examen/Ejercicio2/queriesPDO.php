<?php
require_once 'conexionPDO.php';


function checkDNI($dni)
{
    $conexion = getConexionP();
    $sql = ("SELECT dni, nombre FROM usuarios WHERE dni=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $dni);
    if ($resultado->execute()) {
        return $dni;
    } else {
        return 0;
    }
}

function getUsuario($dni)
{
    $conexion = getConexionP();
    $sql = ("SELECT dni, nombre FROM usuarios WHERE dni=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $dni);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos = array(
                "dni" => $registro["dni"],
                "nombre" => $registro["nombre"]
            );
        }
    }
    return $datos;
}


function getActividades($id_categoria)
{
    $conexion = getConexionP();
    $sql = ("SELECT horario, nombre, plazas FROM actividades WHERE id=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $id_categoria);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "horario" => $registro['horario'],
                "nombre" => $registro['nombre'],
                "plazas" => $registro['plazas'],
            );
        }
    }
    return $datos;
}

function getAtividadesInscritas($dni)
{
    $conexion = getConexionP();
    $sql = ("SELECT clientes.id as id_c, actividades.id as id_act, idACtividad, inscripciones.dni as dni_i, horario, nombre, plazas
                FROM actividades INNER JOIN inscripciones on idActividad=id_act INNER JOIN usuarios on dni=dni_i WHERE id_c=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $dni);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "horario" => $registro['horario'],
                "nombre" => $registro['nombre'],
                "plazas" => $registro['plazas'],
            );
        }
    }
    return $datos;
}

function addInscripcion($actividad, $dni)
{
    $conexion = getConexionP();
    $correcto = true;
    $conexion->beginTransaction();
    $resultado = $conexion->prepare("UPDATE actividades SET plazas=(plazas-1) WHERE id=?;");
    $resultado->bindParam(1, $actividad);
    if ($resultado->execute() != true) {
        $correcto = false;
    }
    $sql = ("INSERT INTO inscipciones (idActividad, dni)  VALUES (?,?)");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $actividad);
    $resultado->bindParam(2, $dni);
    if ($resultado->execute() != true) {
        $correcto = false;
    }
    if ($correcto) {
        $conexion->commit();
        return true;
    } else {
        $conexion->rollBack();
        return false;
    }
}
