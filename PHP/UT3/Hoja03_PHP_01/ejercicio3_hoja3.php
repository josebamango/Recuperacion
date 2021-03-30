<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>

    <?php

    $numero = 456654;
    $invertido = 0;
    $cociente = $numero;    
    while ($cociente != 0) {
        $resto = $cociente % 10;
        $invertido = $invertido * 10 + $resto;
        $cociente = floor($cociente / 10);
    }
    if ($numero == $invertido)
        print "El numero $numero Es capicua <br/>";
    else
        print "El numero $numero NO es capicua <br/>";

    ?>

</body>

</html>