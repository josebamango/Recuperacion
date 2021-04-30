<?php
require_once 'conexionPDO.php';

function getUsuario($nombre)
{
    $conexion = getConexion();
    $sql = "SELECT id, nombre from clientes where nombre = ? ";
    $resultado = $conexion->prepare($sql);
    $resultado->bindParam(1, $nombre);
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            /* SI SOLO SACO UNA FILA DEJO DATOS SIN []*/
            $datos = array(
                "id" => $registro["id"],
                "nombre" => $registro["nombre"]);
        }
    }
    return $datos;
}

function checkUsuarioPass($usuario, $pass)
{
    $conexion = getConexion();
    $sql = 'SELECT id, nombre, password FROM clientes WHERE nombre=? AND password =?';
    $resulado = $conexion->prepare($sql);
    $resulado->bindValue(1, $usuario);
    $resulado->bindValue(2, $pass);
    if ($resulado->execute()) {
        return $usuario;
    }
    return 0;
}

function getViajes()
{
    $conexion = getConexion();
    $resultado = $conexion->query("SELECT id, nombre, precio from viajes");
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "id" => $registro["id"],
                "nombre" => $registro["nombre"],
                "precio" => $registro["precio"]);
        }
    }
    return $datos;
}

function addReserva($id_cliente, $id_viaje, $plazas_reservadas)
{
    $conexion = getConexion();
    $conexion->beginTransaction();
    $correcto = true;
    $resultado = $conexion->prepare('INSERT INTO reservas (id_cliente, id_viaje, plazas_reservadas) VALUES (?,?,?)');
    $resultado->bindParam(1, $id_cliente);
    $resultado->bindParam(2, $id_viaje);
    $resultado->bindParam(3, $plazas_reservadas);
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
    $resultado = $conexion->query("SELECT clientes.nombre as nombreC, viajes.nombre as nombreV, plazas_reservadas, precio*plazas_reservadas as total FROM reservas 
    INNER JOIN viajes ON id_viaje=viajes.id INNER JOIN clientes ON id_cliente=clientes.id");
    if ($resultado->execute()) {
        while ($registro = $resultado->fetch()) {
            $datos[] = array(
                "cliente" => $registro["nombreC"],
                "viaje" => $registro["nombreV"],
                "personas" => $registro["plazas_reservadas"],
                "precioTotal" => $registro["total"]);
        }
    }
    return $datos;
}