<?php

require_once 'conexionPDO.php';

function llegarDestino()
{
    try {
        $conexion = getConexion();
        $conexion->beginTransaction();
        $sql = "DELETE FROM pasajeros;";
        if ($conexion->query($sql) != true) {
            throw new Exception("Error al borrar los pasajeros");
        }

        $sql = "UPDATE plazas SET reservada = 0;";
        if ($conexion->query($sql) != true) {
            throw new Exception("Error al actualizar las plazas");
        }

        $conexion->commit();
        unset($conexion);
        return true;
    } catch (Exception $e) {
        $conexion->rollback();
        echo $e->getMessage();
        unset($conexion);
        return false;
    }
}


function addPasajero($dni, $nombre, $asiento)
{
    $correcto = true;
    $conexion = getConexion();
    $conexion->beginTransaction();
    $resultado = $conexion->prepare("UPDATE plazas SET reservada=1 WHERE numero=?;");
    $resultado->bindParam(1, $asiento);
    if ($resultado->execute() != true) {
        $correcto = false;
    }
    $resultado = $conexion->prepare("INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (?,?,'-',?)");
    $resultado->bindParam(1, $dni);
    $resultado->bindParam(2, $nombre);
    $resultado->bindParam(3, $asiento);
    if ($resultado->execute() != true) {
        $correcto = false;
    }
    if ($correcto) {
        $conexion->commit();
        return true;
    } else {
        $conexion->rollback();
        return false;
    }
}

function getPlazas()
{

    $conexion = getConexion();
    $resultado = $conexion->query(
        "SELECT numero, precio FROM plazas WHERE reservada=0");
    while ($registro = $resultado->fetch()) {
        $datos[] = array(
            "numero" => $registro['numero'],
            "precio" => $registro['precio'],
        );
    }
    return $datos;
}

function setPrecios($arrayPrecios, $arrayPlazas)
{
    $nPlazas = count($arrayPlazas);
    $correcto = true;
    $conexion = getConexion();
    $conexion->beginTransaction();
    $sql = "UPDATE plazas SET precio = ? WHERE numero = ?;";
    for ($i = 0; $i < $nPlazas; $i++) {
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $arrayPrecios[$i]);
        $consulta->bindParam(2, $arrayPlazas[$i]);
        if ($consulta->execute() != true) {
            $correcto = false;
            break;
        }
    }
    if ($correcto) {
        $conexion->commit();
        unset($conexion);
        return true;
    } else {
        $conexion->rollBack();
        unset($conexion);
        return false;
    }
}