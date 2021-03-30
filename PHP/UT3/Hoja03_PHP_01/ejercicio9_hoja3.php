<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
<?php

$distancia = 1000;
$dias = 8;
$precio = 2.5;
$total = $distancia * $precio;
if ($distancia > 800 && $dias > 7)
    $total = $total - ($total * 0.3);
echo "El precio final es: $total €";
?>
</body>
</html>