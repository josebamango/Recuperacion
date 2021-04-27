<?php
define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "dwes_03_funicular");
function getConexionPDO() {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    return new PDO(
        'mysql:host='.HOST.';dbname='.DATABASE,
        USERNAME,
        PASSWORD,
        $opciones
    );
}