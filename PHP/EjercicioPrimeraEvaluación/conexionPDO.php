<?php

function getConexion()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conexion = new PDO('mysql:host=localhost;dbname=agencia_viajes', 'root', '', $opciones);
    //unset($conexion);
    return $conexion;
}

