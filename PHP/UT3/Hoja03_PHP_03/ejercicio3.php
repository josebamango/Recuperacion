<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $arrayLetras = array(
        "T", "R", "W", "A", "G", "M", "Y", "F",
        "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "H", "L", "C", "K", "E");
    $dni = "12345678";
    $resto=$dni % 23;
    echo "La letra correspondiente al DNI $dni es: " . $arrayLetras[$resto];
    ?>
</body>

</html>