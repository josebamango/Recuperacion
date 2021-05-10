<?php
function getConexionM()
{
    $conexion = new mysqli("localhost", "root", "", "dwes_examen_202105", 3306);
    $conexion->set_charset("utf8");
    $error = $conexion->connect_errno;
    if ($error != null) {
        print "<p>Se ha producido el error: $conexion->connect_error.</p>";
        exit();
    } else {
        return $conexion;
    }
}



