<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>

    <?php

    $numero = 1273;
    $aux = $numero;
    $suma = 0;
    $producto = 1;
    while ($aux > 0) {
        $digito = $aux % 10;
        $aux = floor($aux / 10);
        $suma += $digito;
        $producto *= $digito;
    }
    if ($suma == $producto) {
        echo "el numero: $numero es válido";
    } else {
        echo "el numero: $numero no es válido";
    }

    ?>

</body>

</html>