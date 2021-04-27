<?php
require_once "../ConexionPDO.php";

function llegarADestino()
{
    try {
        $conexion = getConexionPDO();
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

function getPlazas()
{
    try {
        $conexion = getConexionPDO();
        $sql = "SELECT numero, precio FROM plazas";
        if ($resultado = $conexion->query($sql)) {
            while ($fila = $resultado->fetch()) {
                $datos[] = array("numero" => $fila["numero"], "precio" => $fila["precio"]);
            }
            unset($conexion);
            return $datos;
        } else {
            throw new Exception("Error al seleccionar las plazas");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        unset($conexion);
        return false;
    }
}

function getPlazasNoReservadas()
{

    $conexion = getConexionPDO();
    $sql = "SELECT numero, precio FROM plazas WHERE reservada = 0;";
    $resultado = $conexion->query($sql);;
    while ($fila = $resultado->fetch()) {
        $datos[] = array("numero" => $fila["numero"], "precio" => $fila["precio"]);
    }
    return $datos;
}

function reservarAsiento($nombre, $dni, $asiento)
{
    $todoOk = true;
    $conexion = getConexionPDO();
    $conexion->beginTransaction();
    $sql = "UPDATE plazas SET reservada = 1 WHERE numero = ?;";
    $reserva = $conexion->prepare($sql);
    $reserva->bindParam(1, $asiento);
    if ($reserva->execute() != true) {
        $todoOk = false;
    }
    $sql = "INSERT INTO pasajeros (dni, nombre, sexo, numero_plaza) VALUES (?,?,'-',?);";
    $reserva = $conexion->prepare($sql);
    $reserva->bindParam(1, $dni);
    $reserva->bindParam(2, $nombre);
    $reserva->bindParam(3, $asiento);
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

function setPrecios($arrayPlazas, $arrayPrecios)
{
    $nPlazas = count($arrayPlazas);
    $todoOk = true;
    $conexion = getConexionPDO();
    $conexion->beginTransaction();
    $sql = "UPDATE plazas SET precio = ? WHERE numero = ?;";
    for ($i = 0; $i < $nPlazas; $i++) {
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $arrayPrecios[$i]);
        $consulta->bindParam(2, $arrayPlazas[$i]);
        if ($consulta->execute() != true) {
            $todoOk = false;
            break;
        }
    }
    if ($todoOk) {
        $conexion->commit();
        unset($conexion);
        return true;
    } else {
        $conexion->rollBack();
        unset($conexion);
        return false;
    }
}

function usuarioCorrecto($usuario, $password)
{
    $conexion = getConexionPDO();
    $sql = "SELECT usuario, password from usuarios where usuario = ? AND password = MD5(?)";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(1, $usuario);
    $consulta->bindParam(2, $password);
    if ($consulta->execute()) {
        while ($fila = $consulta->fetch()) {
            $datos[] = array("usuario" => $fila['usuario'], "password" => $fila['password']);
        }
    }
    return count($datos);
}

function addUsuario($usuario, $password)
{
    $conexion = getConexionPDO();
    try {
        $sql = "INSERT INTO usuarios (usuario, password) VALUES (?,MD5(?));";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(1, $usuario);
        $consulta->bindParam(2, $password);
        if ($consulta->execute()) {
            unset($conexion);
            return true;
        } else{
            throw new Exception("Error al insertar usuario");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        unset($conexion);
        return false;
    }

}

;