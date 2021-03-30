<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php

    $a = 0;
    $b = 1;
    $c = 0;
    $cantidad = 20;

    echo "$a, $b, ";
    for ($i = 0; $i < $cantidad; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
        echo $c . ", ";
    }
    echo "..."


    ?>
</body>

</html>