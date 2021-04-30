<?php
require_once 'conexionPDO.php';

function getEquipos()
{
    $conexion = getConexion();
    $resultado = $conexion->query("SELECT nombre FROM equipos");
    while ($registro = $resultado->fetch()) {
        $datos[] = $registro["nombre"];
    }
    return $datos;

}

function getJugadoresEquipo($equipo)
{
    $conexion = getConexion();
    $resultado = $conexion->prepare("SELECT nombre, peso FROM jugadores WHERE nombre_equipo=?");
    $resultado->bindParam(1, $equipo);
    if ($resultado->execute()) {
        while ($fila = $resultado->fetch()) {
            $datos[] = array("nombre" => $fila["nombre"], "peso" => $fila["peso"]);
        }
    }
    unset($conexion);
    return $datos;

}

function setTraspaso($jugadorBaja, $nombre, $procedencia, $altura, $peso, $posicion, $equipo)
{
    $conexion = getConexion();
    $correcto = true;
    $conexion->beginTransaction();
    $borrado = $conexion->prepare("DELETE FROM jugadores WHERE nombre=?");
    $borrado->bindParam(1, $jugadorBaja);
    if ($borrado->execute() != true) {
        $correcto = false;
    }
    $update = $conexion->prepare("INSERT INTO jugadores (codigo, nombre, procedencia,altura,peso,posicion ,nombre_equipo)VALUES ((SELECT (t.codigo+1) FROM jugadores AS t ORDER BY t.codigo DESC LIMIT 1),?,?,?,?,?,?)");
    $update->bindParam(1, $nombre);
    $update->bindParam(2, $procedencia);
    $update->bindParam(3, $altura);
    $update->bindParam(4, $peso);
    $update->bindParam(5, $posicion);
    $update->bindParam(6, $equipo);
    if ($update->execute() != true) {
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

;

function updatePeso($nombre, $peso)
{
    $conexion = getConexion();
    $correcto = true;
    $update = $conexion->prepare("UPDATE jugadores SET peso=? WHERE nombre=?");
    $update->bindParam(1, $peso);
    $update->bindParam(2, $nombre);
    if ($update->execute() != true) {
        $correcto = false;
    }
    return $correcto;
}


