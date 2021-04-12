<?php

function getConexion()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conexion = new PDO('mysql:host=localhost;dbname=dwes_01_nba', 'root', '', $opciones);
    //unset($conexion);
    return $conexion;
}
