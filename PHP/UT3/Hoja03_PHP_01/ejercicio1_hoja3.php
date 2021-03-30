<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>


<?php

echo date("j-n-Y") . "<br>";
$dias = array("domingo", "lunes", "martes", "miércoles", "jueves", "viernes", "sábado");
$meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
echo "Buenos días, hoy es " . $dias[date("w")] . " " . date("j")  . " de " . $meses[date("n")] . " de " . date("Y");
''

?>

</body>

</html>