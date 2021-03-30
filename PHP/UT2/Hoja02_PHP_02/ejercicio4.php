<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
<?php

$nombre = "Joseba";

echo "Información de la variable 'nombre': ";
var_dump($nombre);

echo "<br>Contenido de la variable: $nombre <br>";

$nombre = null;

echo "Después de asignarle un valor nulo: ";
var_dump($nombre);

?>
</body>

</html>