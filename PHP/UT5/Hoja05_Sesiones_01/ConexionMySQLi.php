<?php
define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "dwes_03_funicular");
function getConexionSQLi() {
    $conexion = new mysqli(HOST, USERNAME, PASSWORD, DATABASE, 3306);
    $conexion->set_charset("utf8");
    $error = $conexion->connect_errno;
    if ($error != null) {
        print"<p>Se ha producido el error: $conexion->connect_error.</p>";
        exit();
    }
    return $conexion;
}
