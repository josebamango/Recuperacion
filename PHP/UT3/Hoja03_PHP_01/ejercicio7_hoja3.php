<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $denominador = 2;
    $cantidad = 10;
    for ($numerador = 1; $numerador <= $cantidad; $numerador++) {
        echo $numerador . "/" . $denominador . "<br>";
        $denominador = $denominador * 2;
    }

    ?>

</body>

</html>