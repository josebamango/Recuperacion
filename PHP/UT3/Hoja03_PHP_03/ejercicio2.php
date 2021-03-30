<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $monedas = array(500, 200, 100, 50, 20, 10, 5, 2, 1, 0.5, 0.2, 0.1, 0.05, 0.02, 0.01);
    $cantidad = 1109.69;
    for ($i = 0; $i < sizeof($monedas); $i++) {
        $numMonedas = floor($cantidad / $monedas[$i]);
        $aRestar = ($numMonedas * $monedas[$i]);
        $cantidad = round($cantidad - $aRestar, 2);
        if ($numMonedas > 0) {
            echo "el numero de " . $monedas[$i] . " es " . $numMonedas . "<br>";
        }
    }

    ?>
</body>

</html>