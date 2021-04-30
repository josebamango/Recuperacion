<?php
require_once 'conexionMySQLi.php';


function getViajes()
{
    $conexion = getConexion();
    $resultado = $conexion->query('SELECT nombre, precio FROM viajes ORDER BY precio asc');
    $registro = $resultado->fetch_array();
    while ($registro != null) {
        $datos[] = array(
            "nombre" => $registro["nombre"],
            "precio" => $registro["precio"],
        );
        $registro = $resultado->fetch_array();
    }
    return $datos;
}