<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
<?php

$primero = "Juanan";
$segundo = "Dani";
$aux = "";

echo "El primero es $primero y el segundo es $segundo <br>";

$aux = $primero;
$primero = $segundo;
$segundo = $aux;

echo "Ahora el primero es $primero y el segundo es $segundo";

?>
</body>

</html>