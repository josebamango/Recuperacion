<?php
require_once "../ConexionMySQLi.php";

function llegarADestino()
{
    $todoOk = true;
    $conexion = getConexionSQLi();
    $conexion->autocommit(false);
    $sql = "DELETE FROM pasajeros;";
    if ($conexion->query($sql) != true) {
        $todoOk = false;
    }
    $sql = "UPDATE plazas SET reservada = 0;";
    if ($conexion->query($sql) != true) {
        $todoOk = false;
    }
    if ($todoOk) {
        $conexion->commit();
        $conexion->close();
        return true;
    } else {
        $conexion->rollback();
        $conexion->close();
        return false;
    }
}

function getPlazasNoReservadas()
{
    $conexion = getConexionSQLi();
    $sql = "SELECT numero, precio FROM plazas WHERE reservada = 0;";
    $resultado = $conexion->query($sql);
    $fila = $resultado->fetch_array();
    while ($fila != null) {
        $datos[] = array("numero" => $fila["numero"], "precio" => $fila["precio"]);
        $fila = $resultado->fetch_array();
    }
    return $datos;
}

function reservarAsiento($nombre, $dni, $asiento)
{
    $todoOk = true;
    $conexion = getConexionSQLi();
    $conexion->autocommit(false);
    $sql = "UPDATE plazas SET reservada = 1 WHERE numero = ?;";
    $reserva = $conexion->stmt_init();
    $reserva->prepare($sql);
    $reserva->bind_param("i", $asiento);
    if ($reserva->execute() != true) {
        $todoOk = false;
    }
    $sql = "INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (?,?,'-',?);";
    $reserva = $conexion->stmt_init();
    $reserva->prepare($sql);
    $reserva->bind_param("ssi", $dni, $nombre, $asiento);
    if ($reserva->execute() != true) {
        $todoOk = false;
    }

    if ($todoOk) {
        $conexion->commit();
        return true;
    } else {
        $conexion->rollback();
        return false;
    }
}



function usuarioCorrecto($usuario, $password)
{
    $conexion = getConexionSQLi();
    $consulta  = $conexion->stmt_init();
    $sql = "SELECT usuario, password from usuarios where usuario = ? AND password = MD5(?)";
    $consulta->prepare($sql);
    $consulta->bind_param("ss", $usuario, $password);
    $consulta->execute();
    $consulta->bind_result($user, $pass);
    while ($consulta->fetch()) {
        $datos[] = array($user, $pass);
    }
    return count($datos);
}