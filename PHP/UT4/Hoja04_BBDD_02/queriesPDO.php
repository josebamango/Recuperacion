<?php
require_once "conexionPDO.php";

function guardarLibro($anio, $titulo, $precio, $adquisicion)
{
    $conexion = getConexion();
    $correcto = true;
    $conexion->beginTransaction();
    $resultado = $conexion->prepare("INSERT INTO libros (anio_edicion, titulo,precio, fecha_adquisicion) VALUES (?,?,?,?)");
    $resultado->bindParam(1, $anio);
    $resultado->bindParam(2, $titulo);
    $resultado->bindParam(3, $precio);
    $resultado->bindParam(4, $adquisicion);
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

function getLibros()
{
    $conexion = getConexion();
    $resultado = $conexion->query('SELECT numero_ejemplar, anio_edicion, titulo, precio, fecha_adquisicion FROM libros');
    while ($registro = $resultado->fetch()) {
        $datos[] = array(
            "numero" => $registro["numero_ejemplar"],
            "anio" => $registro["anio_edicion"],
            "titulo" => $registro["titulo"],
            "precio" => $registro["precio"],
            "fecha" => $registro["fecha_adquisicion"]);
    }
    return $datos;

}

function deleteLibro($numero)
{
    $conexion = getConexion();
    $resultado = $conexion->prepare('DELETE FROM libros WHERE numero_ejemplar=?');
    $resultado->bindParam(1, $numero);
    if ($resultado->execute()) {
        return true;
    } else {
        return false;
    }

}