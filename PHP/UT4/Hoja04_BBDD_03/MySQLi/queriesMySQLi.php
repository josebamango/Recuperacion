<?php

require_once 'conexionMySQLi.php';


function llegarDestino()
{
    $correcto = true;
    $conexion = getConexion();
    $conexion->autocommit(false);
    $sql = "DELETE FROM pasajeros;";
    if ($conexion->query($sql) != true) {
        $correcto = false;
    }
    $sql = "UPDATE plazas SET reservada = 0;";
    if ($conexion->query($sql) != true) {
        $correcto = false;
    }
    if ($correcto) {
        $conexion->commit();
        $conexion->close();
        return true;
    } else {
        $conexion->rollback();
        $conexion->close();
        return false;
    }

}

function getPlazas()
{
    $conexion = getConexion();
    $resultado = $conexion->query('SELECT numero, precio FROM plazas WHERE reservada=0');
    $registro = $resultado->fetch_array();
    while ($registro != null) {
        $datos[] = array(
            "numero" => $registro["numero"],
            "precio" => $registro["precio"],
        );
        $registro = $resultado->fetch_array();
    }
    return $datos;

}

function addPasajero($dni, $nombre, $asiento)
{
    $correcto = true;
    $conexion = getConexion();
    $conexion->autocommit(false);
    $sql = "UPDATE plazas SET reservada = 1 WHERE numero = ?;";
    $reserva = $conexion->stmt_init();
    $reserva->prepare($sql);
    $reserva->bind_param("i", $asiento);
    if ($reserva->execute() != true) {
        $correcto = false;
    }
    $sql = "INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (?,?,'-',?);";
    $reserva = $conexion->stmt_init();
    $reserva->prepare($sql);
    $reserva->bind_param("ssi", $dni, $nombre, $asiento);
    if ($reserva->execute() != true) {
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


