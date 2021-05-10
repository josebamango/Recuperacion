<?php

function getConexionP()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conexion = new PDO('mysql:host=localhost;dbname=dwes_examen_202105', 'root', '', $opciones);
    return $conexion;
}

