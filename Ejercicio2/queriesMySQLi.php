<?php
require_once 'conexionMySQLi.php';

/*function checkDNI($dni)
{

    $conexion = getConexionM();
    $resultado = $conexion->stmt_init();
    $resultado->prepare('SELECT dni, nombre FROM usuarios WHERE dni=?');
    $resultado->execute();
    $resultado->bind_param("i", $dni);
    $resultado->bind_param("s", $nombre);
    if ($resultado->execute()) {
        return $nombre;
    } else {
        return 0;
    }

}*/

function getCartegorias()
{
    $conexion = getConexionM();
    $sql = ("SELECT id,nombre FROM categorias");
    $resultado = $conexion->query($sql);
    $registro = $resultado->fetch_array();
    while ($registro != null) {
        $datos[] = array(
            "id" => $registro["id"],
            "nombre" => $registro["nombre"],
        );
        $registro = $resultado->fetch_array();
    }
    return $datos;
}