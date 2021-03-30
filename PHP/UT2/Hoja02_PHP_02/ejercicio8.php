<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
<?php

$dinero = ["billetes" => [10, 5], "monedas" => [1]];

$cantidad = 127;

foreach ($dinero as $importe => $valores) {
    foreach ($valores as $valor) {
        if ($cantidad >= $valor) {
            echo "$importe con valor de \$$valor: " . floor($cantidad / $valor) . "<br>";
            $cantidad = $cantidad % $valor;
            if (!$cantidad)
                break 2;
        }
    }
}

?>
</body>

</html>