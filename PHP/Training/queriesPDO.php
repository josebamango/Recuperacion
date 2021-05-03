<?php
require_once 'conexionPDO.php';

function checkUsuarioPass($nombre, $pass)
{
    $conexion = getConexion();
    $sql = ("SELECT id, nombre, password FROM clientes WHERE nombre=? AND password=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $nombre);
    $resultado->bindParam(2, $pass);
    if ($resultado->execute()) {
        return $nombre;
    } else {
        return 0;
    }
}

function getUsuario($nombre)
{
    $conexion = getConexion();
    $sql = ("SELECT id, nombre FROM clientes WHERE nombre=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $nombre);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos = array(
                "id" => $registro["id"],
                "nombre" => $registro["nombre"]
            );
        }
    }
    return $datos;
}

function getViajes()
{
    $conexion = getConexion();
    $sql = ("SELECT id, nombre, precio FROM viajes");
    $resultado = $conexion->prepare($sql);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "id" => $registro['id'],
                "nombre" => $registro['nombre'],
                "precio" => $registro['precio']
            );
        }
    }
    return $datos;
}

function addReserva($cliente, $viaje, $plazas)
{
    $conexion = getConexion();
    $conexion->beginTransaction();
    $correcto = true;
    $sql = ("INSERT INTO reservas (id_cliente, id_viaje, plazas_reservadas)  VALUES (?,?,?)");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $cliente);
    $resultado->bindParam(2, $viaje);
    $resultado->bindParam(3, $plazas);
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

function getReservasRealizadas()
{
    $conexion = getConexion();
    $sql = ("SELECT clientes.nombre as nombreC, viajes.nombre as nombreV, plazas_reservadas, precio*plazas_reservadas as total FROM reservas INNER JOIN clientes on id_cliente=clientes.id INNER JOIN viajes on id_viaje=viajes.id");
    $resultado = $conexion->prepare($sql);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "nombreC" => $registro['nombreC'],
                "nombreV" => $registro['nombreV'],
                "plazas" => $registro['plazas_reservadas'],
                "total" => $registro['total']
            );
        }
    }
    return $datos;

}


function getReservasUno($id)
{
    $conexion = getConexion();
    $sql = ("SELECT id_viaje, clientes.nombre as nombreC, viajes.nombre as nombreV, plazas_reservadas, precio*plazas_reservadas as total 
                FROM reservas INNER JOIN clientes on id_cliente=clientes.id INNER JOIN viajes on id_viaje=viajes.id WHERE clientes.id=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $id);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "id_viaje" => $registro['id_viaje'],
                "nombreC" => $registro['nombreC'],
                "nombreV" => $registro['nombreV'],
                "plazas" => $registro['plazas_reservadas'],
                "total" => $registro['total']
            );
        }
    }
    return $datos;
}

function deleteReserva($id_cliente, $id_viaje)
{

    $conexion = getConexion();
    $correcto = true;
    $conexion->beginTransaction();
    $sql = ("DELETE FROM reservas WHERE id_cliente=? AND id_viaje=?");
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $id_cliente);
    $resultado->bindParam(2, $id_viaje);
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


